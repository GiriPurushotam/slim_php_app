<?php

namespace App;

use App\DB;
use Exception;
use Dotenv\Dotenv;
use Twig\Environment;
use Illuminate\Events\Dispatcher;
use Twig\Loader\FilesystemLoader;
use Illuminate\Container\Container;
use App\Exception\RouteNotFoundException;
use Illuminate\Database\Capsule\Manager as Capsule;
use Twig\Extra\Intl\IntlExtension;

class Load
{

    private Config $config;

    public function __construct(
        protected Routing $routing,
        protected array $request,
        protected Container $container,

    ) {}

    public function initDb(array $config)
    {

        $capsule = new Capsule();

        $capsule->addConnection($config);
        $capsule->setEventDispatcher(new Dispatcher($this->container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);

        $this->initDb($this->config->db);

        $loader = new FilesystemLoader(VIEW_PATH);
        $twig = new Environment($loader, [
            'cache' => STORAGE_PATH .  '/cache',
            'auto_reload' => true,
        ]);

        $twig->addExtension(new IntlExtension());
        $this->container->singleton(Environment::class, fn() => $twig);

        return $this;
    }


    public function run()
    {
        try {
            echo $this->routing->resolve(
                $this->request['uri'],
                strtolower($this->request['method']),
            );
        } catch (Exception $e) {
            http_response_code(404);
            echo $e->getMessage();
        }
    }
}
