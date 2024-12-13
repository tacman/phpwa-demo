<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class AudioSessionController extends AbstractController
{
    #[Route('/audio-session', name: 'app_feature_audio_session', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/audio_session.html.twig');
    }
}
