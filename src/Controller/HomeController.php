<?php

namespace App\Controller;

use App\Entity\Society;
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

}
