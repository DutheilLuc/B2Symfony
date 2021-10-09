<?php

namespace App\Controller;

use App\Repository\SocietyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SocietyController extends AbstractController
{

    /**
     * @Route("/article/{id}", name="society")
     */
    public function blogOneArticle($id,SocietyRepository $articleRepository)
    {
        // récupérer un article selon l'ID en wildcard
        $society = $articleRepository->find($id);

        if(is_null($society)){
            return $this->redirectToRoute('');
        }

        return $this->render('society/readlist.html.twig',[
            'article' => $society
        ]);

    }

}
