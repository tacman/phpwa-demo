<?php

namespace App\Controller\Feature;

use SpomkyLabs\PwaBundle\Attribute\PreloadUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class ProtocolHandlingController extends AbstractController
{
    #[PreloadUrl('pages', ['_locale' => 'en_US'])]
    #[PreloadUrl('pages', ['_locale' => 'fr_FR'])]
    #[Route('/protocol-handling', name: 'app_feature_protocol_handling', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/protocol_handling.html.twig');
    }
}
