<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

namespace JeckelLab\Demo\Application\UserManagement\Command;

use DateTimeImmutable;
use JeckelLab\Contract\Core\CommandDispatcher\Command\Command;
use JeckelLab\Demo\Application\Shared\Identity\UserId;

/**
 * Class ActivateUser
 * @package JeckelLab\Demo\Application\UserManagement\Command
 * @psalm-immutable
 */
final class ActivateUser implements Command
{
    public function __construct(
        public readonly UserId $id,
        public readonly DateTimeImmutable $activateAt
    ) {
    }
}
