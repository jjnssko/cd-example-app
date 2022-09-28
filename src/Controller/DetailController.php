<?php

namespace App\Controller;

use App\Entity\StoreCDs;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Form\CDFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cd/', name: 'cd_')]
class DetailController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private ManagerRegistry $doctrine
    ) {}

    #[Route('detail/{id}', name: 'detail')]
    public function detailCD(Request $request, int $id): Response
    {
        $cdDetail = $this->doctrine->getRepository(StoreCDs::class)->find($id);
        dump($cdDetail);
        return $this->render('cd/detail.html.twig', [
            'controller_name' => 'DetailController',
        ]);
    }

    #[Route('detail/{id}/edit', name: 'edit')]
    public function editCD(): Response
    {
        return $this->render('cd/edit.html.twig', [
            'controller_name' => 'DetailController',
        ]);
    }

    #[Route('new', name: 'new')]
    public function newCD(Request $request, FileUploader $fileUploader): Response
    {
        $cd = new StoreCDs();

		$form = $this->createForm(CDFormType::class, $cd, [
		])->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile);
                $cd->setImage($imageFileName);
            }

            $this->em->persist($cd);
            $this->em->flush();

            return $this->redirectToRoute('dashboard');
		}
        return $this->render('cd/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('detail/{id}/delete', name: 'delete')]
    public function deleteCD(int $id): RedirectResponse
    {
        $cd = $this->doctrine->getManager()->getRepository(StoreCDs::class)
            ->find($id)
        ;
        $this->em->remove($cd);
        $this->em->flush();

        return $this->redirectToRoute('dashboard');
    }
}
