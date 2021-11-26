<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

namespace JeckelLab\Demo\Application\UserManagement\CommandHandler;

use JeckelLab\CommandBus\CommandResponse\CommandResponseSuccess;
use JeckelLab\Contract\Application\Command\Command;
use JeckelLab\Contract\Application\Command\CommandHandler;
use JeckelLab\Contract\Application\Command\CommandResponse;
use JeckelLab\Demo\Application\UserManagement\Command\ActivateUser;
use Psr\Log\LoggerInterface;

/**
 * Class ActivateUserHandler
 * @package JeckelLab\Demo\Application\UserManagement\CommandHandler
 * @implements CommandHandler<ActivateUser>
 */
class ActivateUserHandler implements CommandHandler
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public static function accept(Command $command): bool
    {
        return $command instanceof ActivateUser;
    }

    /**
     * @param ActivateUser $command
     * @return CommandResponse
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function handle(Command $command): CommandResponse
    {
        $this->logger->info("In ActivateUserHandler");

        return new CommandResponseSuccess();
    }
}
