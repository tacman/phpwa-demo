<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class BarcodeDetectionController extends AbstractController
{
    #[Route('/barcode-detection', name: 'app_feature_barcode_detection', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/barcode_detection.html.twig');
    }
}
