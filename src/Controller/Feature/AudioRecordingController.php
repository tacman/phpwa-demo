<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class AudioRecordingController extends AbstractController
{
    #[Route('/audio-recording', name: 'app_feature_audio_recording', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/audio_recording.html.twig');
    }
}
