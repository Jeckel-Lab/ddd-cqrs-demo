<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

namespace JeckelLab\Demo\Application\UserManagement\CommandHandler;

use JeckelLab\CommandDispatcher\CommandHandler\CommandHandlerTrait;
use JeckelLab\CommandDispatcher\CommandResponse\CommandResponseSuccess;
use JeckelLab\Contract\Core\CommandDispatcher\Command\Command;
use JeckelLab\Contract\Core\CommandDispatcher\CommandHandler\CommandHandler;
use JeckelLab\Contract\Core\CommandDispatcher\CommandResponse\CommandResponse;
use JeckelLab\Contract\Core\CommandDispatcher\Exception\InvalidCommandException;
use JeckelLab\Demo\Application\UserManagement\Command\CreateUser;
use Psr\Log\LoggerInterface;

/**
 * Class ActivateUserHandler
 * @package JeckelLab\Demo\Application\UserManagement\CommandHandler
 * @implements CommandHandler<CreateUser>
 */
class CreateUserHandler implements CommandHandler
{
    /**
     * @use CommandHandlerTrait<CreateUser>
     */
    use CommandHandlerTrait;

    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * @return list<class-string<Command>>
     * @psalm-mutation-free
     */
    public static function getHandledCommands(): array
    {
        return [ CreateUser::class ];
    }

    /**
     * @param CreateUser $command
     * @return CommandResponse
     * @psalm-suppress RedundantConditionGivenDocblockType
     */
    public function __invoke(Command $command): CommandResponse
    {
        $this->validateCommand($command, self::getHandledCommands());
        $this->logger->info(
            sprintf('In CreateUserHandler for %s <%s>', $command->login, $command->email)
        );

        return new CommandResponseSuccess();
    }
}
