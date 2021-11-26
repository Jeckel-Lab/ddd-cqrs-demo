<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

namespace JeckelLab\Demo\Application\UserManagement\Command;

use JeckelLab\Contract\Application\Command\Command;

/**
 * Class CreateUser
 * @package JeckelLab\Demo\Application\UserManagement\Command
 * @psalm-immutable
 */
final class CreateUser implements Command
{
    public function __construct(
        public readonly string $login,
        public readonly string $email
    ) {
    }
}
