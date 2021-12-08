<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

use DI\ContainerBuilder;
use JeckelLab\CommandDispatcher\CommandBus\Decorator\LoggerDecorator;
use JeckelLab\CommandDispatcher\CommandBusBuilder;
use JeckelLab\Contract\Core\CommandDispatcher\Command\Command;
use JeckelLab\Contract\Core\CommandDispatcher\CommandBus\CommandBus;
use JeckelLab\Contract\Core\CommandDispatcher\CommandHandler\CommandHandler;
use JeckelLab\Demo\Application\UserManagement\CommandHandler\ActivateUserHandler;
use JeckelLab\Demo\Application\UserManagement\CommandHandler\CreateUserHandler;
use JeckelLab\Demo\Kernel\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions(
        [
            'command-handlers' => [
                ActivateUserHandler::class,
                CreateUserHandler::class,
            ],
            LoggerInterface::class => DI\autowire(Logger::class),
            CommandBus::class => function(ContainerInterface $container) {
                /** @var array<class-string<CommandHandler<Command>>> $handlers */
                $handlers = $container->get('command-handlers');
                return (new CommandBusBuilder($container))
                    ->addCommandHandler(...$handlers)
                    ->addDecorator(LoggerDecorator::class)
                    ->build();
            },
        ]
    );
};
