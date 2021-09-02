<?php
/**
 * @copyright Macintoshplus (c) 2021
 * Added by : Macintoshplus at 02/09/2021 22:00
 */

declare(strict_types=1);

namespace App\Infra\Symfony\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

final class HomeController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function __invoke(Environment $twig): Response
    {
        return new Response($twig->render('home.html.twig'));
    }
}
