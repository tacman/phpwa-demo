<?php

namespace App\Controller\Feature;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class PaymentController extends AbstractController
{
    #[Route('/payment', name: 'app_feature_payment', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('features/payment.html.twig');
    }
}
