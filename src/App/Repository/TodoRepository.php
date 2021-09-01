<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:52
 */

declare(strict_types=1);

use App\Domain\Exception\NotFoundAgregateException;
use App\Domain\Model\Todo;
use App\Domain\Repository\TodoRepositoryInterface;
use App\Infra\Entity\DoctrineTodo;

final class TodoRepository implements TodoRepositoryInterface
{
    private DoctrineTodoRepository $doctrineTodoRepository;

    public function __construct(DoctrineTodoRepository $doctrineTodoRepository)
    {
        $this->doctrineTodoRepository = $doctrineTodoRepository;
    }

    public function load(string $identifier): Todo
    {
        $doctrineTodo = $this->doctrineTodoRepository->find($identifier);
        if ($doctrineTodo instanceof DoctrineTodo) {
            return Todo::initFromDto(DoctrineTodo);
        }
        throw new NotFoundAgregateException("Unable to load TODO with ID " . $identifier);
    }

    public function save(Todo $agregate): void
    {
        $doctrineTodo = $this->doctrineTodoRepository->find($agregate->identifier());
        if ($doctrineTodo instanceof DoctrineTodo === false) {
            $doctrineTodo = new DoctrineTodo($agregate->identifier());
        }

        $agregate->toDto($doctrineTodo);
    }
}
