<?php

namespace App\Controller;

use App\Entity\Society;
use App\Repository\CategoryRepository;
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
    public function home(Request $request)
    {
        $search = $request->query->get('search');

        if ($search) {
            $societe = $this->getDoctrine()->getRepository(Society::class)->findByNameField($search);
            return $this->render("manage/list.html.twig",['societies' =>$societe]);
        }

        $society = $this->getDoctrine()->getRepository(Society::class)->findAll();
        return $this->render("manage/list.html.twig",['societies' =>$society]);
    }

    /**
     * @Route("/show/{id}", name="voir_show")
     */
    public function show($id, SocietyRepository $societyRepository)
    {
        $society = $societyRepository->find($id);
        return $this->render("manage/readlist.html.twig", ['society' => $society,]);
    }

    /**
     * @Route("/cateshow/show/{id}", name="voir_show2")
     */
    public function show2($id, SocietyRepository $societyRepository)
    {
        $society = $societyRepository->find($id);
        return $this->render("manage/readlistforcat.html.twig", ['society' => $society,]);
    }

    /**
     * @Route("/cateshow/{id}", name="cate_show")
     */
    public function cateShow($id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($id);
        return $this->render("manage/showcategory.html.twig", ['cat' => $category]);
    }

}
