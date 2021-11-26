<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

namespace JeckelLab\Demo\Application\Shared\Identity;

use JeckelLab\IdentityContract\AbstractUuidIdentity;

/**
 * Class UserId
 * @package JeckelLab\Demo\Application\Shared\Identity
 * @psalm-immutable
 */
final class UserId extends AbstractUuidIdentity
{

}
