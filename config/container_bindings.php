<?php

declare(strict_types=1);

use App\Config;
use Slim\Views\Twig;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Twig\Extra\Intl\IntlExtension;

return [
    Config::class => fn() => new Config($_ENV),
    EntityManager::class => fn(Config $config) => new EntityManager(DriverManager::getConnection($config->db), ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../app/Entity'], isDevMode: true)),

    Twig::class => function (Config $config) {

        $twig = Twig::create(VIEW_PATH, [
            'cache' => STORAGE_PATH .  '/cache',
            'auto_reload' => $config->environment === 'development',
        ]);

        $twig->addExtension(new IntlExtension());

        return $twig;
    }

];
