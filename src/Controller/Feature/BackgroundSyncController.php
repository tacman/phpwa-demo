<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class BackgroundSyncController extends AbstractController
{
    #[Route('/background-sync', name: 'app_feature_background_sync', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/background_sync.html.twig');
    }
}
