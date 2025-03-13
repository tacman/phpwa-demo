<?php

namespace App\Controller;

use App\Form\ItemHandler;
use App\Repository\ItemRepository;
use SpomkyLabs\PwaBundle\Service\CacheStrategy;
use SpomkyLabs\PwaBundle\Attribute\PreloadUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale<%app.supported_locales_regex%>}')]
class HomepageController extends AbstractController
{
    #[PreloadUrl('pages', ['_locale' => 'en_US'])]
    #[PreloadUrl('pages', ['_locale' => 'fr_FR'])]
    #[Route('', name: 'app_homepage', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return $this->render('homepage/index.html.twig');
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

    #[Route('/about', name: 'app_about', methods: [Request::METHOD_GET])]
    public function about(Request $request): Response
    {
        return $this->render('app/about.html.twig');
    }

}
