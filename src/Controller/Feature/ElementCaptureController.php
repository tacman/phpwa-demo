<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class ElementCaptureController extends AbstractController
{
    #[Route('/element-capture', name: 'app_feature_element_capture', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/element_capture.html.twig');
    }
}
