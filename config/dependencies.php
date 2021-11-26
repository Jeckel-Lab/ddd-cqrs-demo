<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

use DI\ContainerBuilder;
use JeckelLab\CommandBus\CommandBus\CommandDispatcher;
use JeckelLab\CommandBus\CommandBus\CommandHandlerResolver;
use JeckelLab\CommandBus\CommandBus\CommandHandlerResolverInterface;
use JeckelLab\CommandBus\CommandBus\Decorator\LoggerDecorator;
use JeckelLab\Contract\Kernel\CommandBus\CommandBus;
use JeckelLab\Demo\Application\UserManagement\CommandHandler;
use JeckelLab\Demo\Kernel\Logger;
use Psr\Log\LoggerInterface;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions(
        [
            'command-handlers' => [
                CommandHandler\ActivateUserHandler::class,
                CommandHandler\CreateUserHandler::class,
            ],
            CommandHandlerResolverInterface::class => DI\create(CommandHandlerResolver::class)
                ->constructor(DI\get('command-handlers')),
            LoggerInterface::class => DI\autowire(Logger::class),
            CommandBus::class => DI\autowire(LoggerDecorator::class)
                ->method('decorate', DI\get(CommandDispatcher::class))
                ->method('setLogger', DI\get(LoggerInterface::class))
        ]
    );
};
