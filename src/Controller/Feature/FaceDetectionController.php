<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class FaceDetectionController extends AbstractController
{
    #[Route('/face-detection', name: 'app_feature_face_detection', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/face_detection.html.twig');
    }
}
