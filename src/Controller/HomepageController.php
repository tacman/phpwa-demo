<?php

namespace App\Controller;

use App\Form\ItemHandler;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    public function __construct(
        private readonly ItemHandler $itemHandler,
        private readonly ItemRepository $itemRepository,
    ){}

    #[Route('/', name: 'app_homepage', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function homepage(Request $request): Response
    {
        $form = $this->itemHandler->prepare();
        $isValid = $this->itemHandler->handle($form, $request);
        if ($isValid) {
            $this->addFlash('success', 'Item added');

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('homepage/index.html.twig', [
            'form' => $form,
            'items' => $this->itemRepository->findBy([], ['id' => 'DESC'], 50),
        ]);
    }

    #[Route('/{id}/toggle', name: 'app_toggle', methods: [Request::METHOD_POST])]
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

    #[Route('/{id}/remove', name: 'app_remove', methods: [Request::METHOD_POST])]
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
