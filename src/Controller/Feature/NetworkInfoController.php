<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class NetworkInfoController extends AbstractController
{
    #[Route('/network-info', name: 'app_feature_network_info', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/network_info.html.twig');
    }
}
