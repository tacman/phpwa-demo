<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class DeviceMotionController extends AbstractController
{
    #[Route('/device-motion', name: 'app_feature_device_motion', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/device_motion.html.twig');
    }
}
