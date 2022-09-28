<?php

namespace App\Controller;

use App\Entity\StoreCDs;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/', name: 'dashboard')]
    public function index(Request $request): Response
    {
        return $this->render('homepage/homepage.html.twig', [
        ]);
    }
}
