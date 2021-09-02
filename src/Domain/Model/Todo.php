<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:45
 */

declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\DTO\TodoDto;

final class Todo
{
    private string $identifier;

    private string $title;

    private bool $isDone = false;

    private function __construct(string $identifier, string $title)
    {
        $this->title = $title;
        $this->identifier = $identifier;
    }

    public static function initFromDto(TodoDto $dto): self
    {
        $todo = new self($dto->getIdentifier(), $dto->getTitle());
        $todo->isDone = $dto->isDone();
        return $todo;
    }

    public static function newFromDto(TodoDto $dto): self
    {
        $todo = new self(uniqid(), $dto->getTitle());
        $todo->isDone = $dto->isDone();
        return $todo;
    }

    public function identifier(): string
    {
        return $this->identifier;
    }

    public function toDto(TodoDto $todoDto): void
    {
        $todoDto->updateFromDomain($this->title, $this->isDone);
    }
}
