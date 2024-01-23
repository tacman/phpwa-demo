<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/widget', name: 'app_widget_data')]
class WidgetController extends AbstractController
{
    public function __construct(
        private readonly HttpClientInterface $client
    ){
    }

    #[Route('/data', name: 'app_widget_data')]
    public function data(): Response
    {
        $url = sprintf(
            'https://api.openweathermap.org/data/2.5/weather?units=Metric&lat=%.2f&lon=%.2f&appid=%s&lang=fr',
            44.34,
            10.99,
            'da7de3ae2c1cf5c882086ddf44a97cee'
        );
        $data = $this->client->request(
            'GET',
            $url
        );

        return new JsonResponse($data->getContent(),json: true);
    }
    #[Route('/template', name: 'app_widget_template')]
    public function template(): Response
    {
        return new JsonResponse($this->renderView('widget_template/index.json.twig'),json: true);
    }
}
