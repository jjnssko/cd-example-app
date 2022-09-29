<?php

namespace App\Controller;

use App\Entity\StoreCDs;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\KernelInterface;
use Mpdf\Mpdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/', name: 'dashboard')]
    public function index(
        Request $request,
        PaginatorInterface $paginator
    ): Response
    {
        $page = $request->query->getInt('page', 1);

        $cdsOverview = $this->doctrine->getRepository(StoreCDs::class)->findAll();
        
        $paginator = $paginator->paginate(
            $cdsOverview,
            $page,
            5,
            ['wrap-queries' => true],
        );
        return $this->render('homepage/homepage.html.twig', [
            'cds' => $paginator,
        ]);
    }

    #[Route('/pdf/preview/', name: 'print_preview_dashboard')]
    public function previewPdfAction(): Response
    {
        $cds = $this->doctrine->getRepository(StoreCDs::class)->findAll();

        return $this->render('homepage/pdf-preview.html.twig', [
            'cds' => $cds,
        ]);
    }
}
