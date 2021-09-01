<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:59
 */

declare(strict_types=1);

namespace App\Domain\DTO;

interface TodoDto
{
    public function updateFromDomain(string $title, bool $isDone): void;

    public function getTitle(): string;

    public function isDone(): bool;

    public function getIdentifier(): string;
}
