<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerInterface;
use App\Exception\Container\ContainerException;
use ReflectionClass;

class Container implements ContainerInterface
{

    private array $entries = [];



    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];
            if (is_callable($entry)) {
                return $entry->this;
            }

            $id = $entry;
        }

        return $this->resolve($id);
    }



    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete): void
    {
        $this->entries[$id] = $concrete;
    }



    public function resolve(string $id)
    {
        $reflectionClass = new \ReflectionClass($id);

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException('Class "' . $id . ' " Is not instanciable ');
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if (! $parameters) {
            return new $id;
        }

        $dependencies = array_map(function (\ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if (! $type) {
                throw new ContainerException('Failed to resolve class "' . $id . '" Because Param "' . $param . '" is missing');
            }

            if ($type instanceof \ReflectionUnionType) {
                throw new ContainerException('Failed to resolve class "' . $id . '" Because of union type for param "' . $param . '" is missing');
            }

            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new ContainerException('Failed to resolve Class "' . $id . '" Because invalid param "' . $param . '" is missing');
        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}
