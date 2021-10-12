<?php

namespace App\Controller;

use App\Entity\Society;
use App\Repository\SocietyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $society = $this->getDoctrine()->getRepository(Society::class)->findAll();
        return $this->render("manage/list.html.twig",['societies' =>$society]);
    }

    /**
     * @Route("/voir/{id}", name="voir_show")
     */
    public function show($id, SocietyRepository $societyRepository)
    {
        $society = $societyRepository->find($id);
        return $this->render("manage/readlist.html.twig", ['society' => $society,]);
    }

}
