<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 01/09/2021 22:52
 */

declare(strict_types=1);

namespace App\App\Repository;

use App\Domain\Exception\NotFoundAgregateException;
use App\Domain\Model\Todo;
use App\Domain\Repository\TodoRepositoryInterface;
use App\Infra\Entity\DoctrineTodo;
use App\Infra\Repository\DoctrineTodoRepository;

final class TodoRepository implements TodoRepositoryInterface
{
    private DoctrineTodoRepository $doctrineTodoRepository;

    public function __construct(DoctrineTodoRepository $doctrineTodoRepository)
    {
        $this->doctrineTodoRepository = $doctrineTodoRepository;
    }

    public function load(string $identifier): Todo
    {
        //Cahrge l'aggregat depuis l'entité Doctrine
        $doctrineTodo = $this->doctrineTodoRepository->find($identifier);
        if ($doctrineTodo instanceof DoctrineTodo) {
            return Todo::initFromDto($doctrineTodo);
        }
        throw new NotFoundAgregateException("Unable to load TODO with ID " . $identifier);
    }

    public function save(Todo $agregate): void
    {
        //Converti l'aggregat en entité doctrine puis la sauvegarde en base
        $doctrineTodo = $this->doctrineTodoRepository->find($agregate->identifier());
        if ($doctrineTodo instanceof DoctrineTodo === false) {
            $doctrineTodo = new DoctrineTodo($agregate->identifier());
        }

        $agregate->toDto($doctrineTodo);
        $this->doctrineTodoRepository->save($doctrineTodo);
    }
}
