<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:45
 */

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Exception\NotFoundAgregateException;
use App\Domain\Model\Todo;

interface TodoRepositoryInterface
{
    /**
     * @throws NotFoundAgregateException when the identifier is not found
     */
    public function load(string $identifier): Todo ;

    public function save(Todo $agregate): void;
}
