<?php

namespace App\Controller;

use App\Form\ItemHandler;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use SpomkyLabs\PwaBundle\Attribute\PreloadUrl;

class HomepageController extends AbstractController
{
    public function __construct(
        private readonly ItemHandler $itemHandler,
        private readonly ItemRepository $itemRepository,
    ){}

    #[PreloadUrl(alias: 'homepage', params: ['_locale' => 'fr'])]
    #[PreloadUrl(alias: 'homepage', params: ['_locale' => 'en'])]
    #[PreloadUrl(alias: 'homepage', params: ['_locale' => 'it'])]
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

    #[Route('/add', name: 'app_add_item', methods: [Request::METHOD_POST])]
    public function addItem(Request $request): Response
    {
        $form = $this->itemHandler->prepare();
        $item = $this->itemHandler->handle($form, $request);
        if ($item !== null) {
            $this->addFlash('success', 'Item added');
            return $this->redirectToRoute('app_homepage');
        }
        $this->addFlash('error', 'Item not added');
        return $this->redirectToRoute('app_homepage');
    }

    #[Route('/items/{id}/toggle', name: 'app_toggle', methods: [Request::METHOD_POST])]
    public function toggle(string $id): Response
    {
        $item = $this->itemRepository->findOneById($id);
        if ($item !== null) {
            $item->toggle();
            $this->itemRepository->save($item);
        }
        $this->addFlash('success', 'Item state changed');

        return $this->redirectToRoute('app_homepage');
    }

    #[Route('/items/{id}/remove', name: 'app_remove', methods: [Request::METHOD_POST])]
    public function remove(string $id): Response
    {
        $item = $this->itemRepository->findOneById($id);
        if ($item !== null) {
            $this->itemRepository->remove($item);
        }
        $this->addFlash('success', 'Item removed');

        return $this->redirectToRoute('app_homepage');
    }
}
