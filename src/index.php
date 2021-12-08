<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use JeckelLab\Contract\Core\CommandDispatcher\CommandBus\CommandBus;
use JeckelLab\Demo\Application\Shared\Identity\UserId;
use JeckelLab\Demo\Application\UserManagement\Command\ActivateUser;
use JeckelLab\Demo\Application\UserManagement\Command\CreateUser;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);
(require_once __DIR__ . '/../config/dependencies.php')($containerBuilder);

$container = $containerBuilder->build();

/** @var CommandBus $commandBus */
$commandBus = $container->get(CommandBus::class);

$commandBus->dispatch(
    new CreateUser('Bob', 'bobby@example.com')
);
$commandBus->dispatch(
    new ActivateUser(UserId::new(), new DateTimeImmutable())
);
