<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class OfflineSupportController extends AbstractController
{
    #[Route('/offline-support', name: 'app_feature_offline_support', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/offline_support.html.twig');
    }
}
