<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 02/09/2021 22:11
 */

declare(strict_types=1);

namespace App\Infra\Symfony\Controller;


use App\Infra\Repository\DoctrineTodoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

final class TodoIndexController
{
    /**
     * @Route("/todos", name="todo_index", methods={"GET"})
     */
    public function __invoke(Environment $twig, DoctrineTodoRepository $todoRepository)
    {
        //Pour l'affichage, il n'est pas nécessaire d'initialiser l'aggregat, on affiche les données directement.
        return new Response($twig->render('todo/index.html.twig', ['todos' => $todoRepository->findAll()]));
    }
}
