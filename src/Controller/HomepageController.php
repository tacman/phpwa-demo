<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class HomepageController extends AbstractController
{
    #[Route('', name: 'app_homepage', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('homepage/index.html.twig');
    }
}
