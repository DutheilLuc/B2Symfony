<?php

namespace App\Controller;

use App\Entity\Society;
use App\Form\SocietyType;
use App\Repository\SocietyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/society')]
class SocietyController extends AbstractController
{
    #[Route('/', name: 'society_index', methods: ['GET'])]
    public function index(SocietyRepository $societyRepository): Response
    {
        return $this->render('society/index.html.twig', [
            'societies' => $societyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'society_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $society = new Society();
        $form = $this->createForm(SocietyType::class, $society);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form["image"]->getData();

            if ($imageFile) {
                $originalFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFileName = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; lower()', $originalFileName);
                $newFileName = $safeFileName . "-" . uniqid() . "." . $imageFile->guessExtension();


                try {
                    $move = $imageFile->move(
                        $this->getParameter('images'),
                        $newFileName
                    );

                    $society->setImage("images/" . $newFileName);

                    if ($move) {
                        throw new FileException("Error while loading image");
                    }
                } catch (FileException $e) {
                    echo 'Error received : ' . $e->getMessage();
                }
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($society);
            $entityManager->flush();

            return $this->redirectToRoute('society_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('society/new.html.twig', [
            'society' => $society,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'society_show', methods: ['GET'])]
    public function show(Society $society): Response
    {
        return $this->render('society/show.html.twig', [
            'society' => $society,
        ]);
    }

    #[Route('/{id}/edit', name: 'society_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Society $society): Response
    {
        $form = $this->createForm(SocietyType::class, $society);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form["image"]->getData();

            if ($imageFile) {
                $originalFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFileName = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; lower()', $originalFileName);
                $newFileName = $safeFileName . "-" . uniqid() . "." . $imageFile->guessExtension();


                try {
                    $move = $imageFile->move(
                        $this->getParameter('images'),
                        $newFileName
                    );

                    $society->setImage("images/" . $newFileName);

                    if ($move) {
                        throw new FileException("Error while loading image");
                    }
                } catch (FileException $e) {
                    echo 'Error received : ' . $e->getMessage();
                }
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('society_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('society/edit.html.twig', [
            'society' => $society,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'society_delete', methods: ['POST'])]
    public function delete(Request $request, Society $society): Response
    {
        if ($this->isCsrfTokenValid('delete'.$society->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($society);
            $entityManager->flush();
        }

        return $this->redirectToRoute('society_index', [], Response::HTTP_SEE_OTHER);
    }

}

