<?php

namespace App\Controller;

use App\Form\ItemHandler;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/download')]
class DownloadController extends AbstractController
{
    #[Route('/success', name: 'download_success', methods: [Request::METHOD_GET])]
    public function success(): Response
    {
        return new JsonResponse(['message' => 'Download successful']);
    }
    #[Route('/progress', name: 'download_progress', methods: [Request::METHOD_GET])]
    public function progress(): Response
    {
        return new JsonResponse(['message' => 'Download in progress']);
    }
    #[Route('/{filename}', name: 'download_file', methods: [Request::METHOD_GET])]
    public function filename(string $filename): Response
    {
        $finder = new Finder();
        $finder->files()->in(__DIR__.'/../../public/')->name($filename);
        if (!$finder->hasResults()) {
            throw $this->createNotFoundException('File not found');
        }
        $files = iterator_to_array($finder->getIterator());
        if (count($files) > 1) {
            throw $this->createNotFoundException('Multiple files found');
        }
        $file = current($files);

        return new BinaryFileResponse($file);
    }
}
