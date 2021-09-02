<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 02/09/2021 22:19
 */

declare(strict_types=1);

namespace App\Infra\Symfony\Controller;


use App\App\Repository\TodoRepository;
use App\Domain\Model\Todo;
use App\Infra\Symfony\Form\TodoType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

final class TodoAddController
{
    /**
     * @Route("/todo/add", name="todo_add", methods={"GET", "POST"})
     */
    public function __invoke(Request $request, FormFactoryInterface $formFactory, Environment $twig, TodoRepository $appTodoRepository)
    {
        $form = $formFactory->create(TodoType::class);
        $form->add('submit', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Initialisation de l'aggregat
            $todo = Todo::newFromDto($form->getData());
            //Sauvegarde !
            $appTodoRepository->save($todo);
            //Ajouter le flash bag...
            return new RedirectResponse('/');
        }

        return new Response($twig->render('todo/add.html.twig', ['form'=>$form->createView()]));
    }

}
