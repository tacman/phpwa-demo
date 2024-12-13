<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class PictureInPictureController extends AbstractController
{
    #[Route('/picture-in-picture', name: 'app_feature_picture_in_picture', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/picture_in_picture.html.twig');
    }
}
