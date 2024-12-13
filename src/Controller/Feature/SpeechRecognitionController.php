<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class SpeechRecognitionController extends AbstractController
{
    #[Route('/speech-recognition', name: 'app_feature_speech_recognition', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/speech_recognition.html.twig');
    }
}
