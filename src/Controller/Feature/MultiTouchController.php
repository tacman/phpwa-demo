<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class MultiTouchController extends AbstractController
{
    #[Route('/multi-touch', name: 'app_feature_multi_touch', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/multi_touch.html.twig');
    }
}
