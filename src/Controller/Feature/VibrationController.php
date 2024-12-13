<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class VibrationController extends AbstractController
{
    #[Route('/vibration', name: 'app_feature_vibration', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/vibration.html.twig');
    }
}
