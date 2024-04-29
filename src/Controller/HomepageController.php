<?php

namespace App\Controller;

use App\Form\ItemHandler;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class HomepageController extends AbstractController
{
    public function __construct(
        private readonly ItemHandler $itemHandler,
        private readonly ItemRepository $itemRepository,
    ){}

    #[Route('/', name: 'app_homepage', methods: [Request::METHOD_GET])]
    public function homepage(): Response
    {
        $form = $this->itemHandler->prepare();

        $response = $this->render('homepage/index.html.twig', [
            'form' => $form,
            'items' => $this->itemRepository->findBy([], ['id' => 'DESC'], 50),
        ]);
        //Used to test the Broacast system
        $response->headers->set('X-App-Cache', random_int(0,5) === 0 ? 'foo' : 'bar');

        return $response;
    }
}
