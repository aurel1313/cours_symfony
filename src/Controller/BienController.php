<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Repository\BienRepository;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienController extends AbstractController
{
    #[Route('/bien', name: 'app_bien')]
    public function index(BienRepository $bienRepository): Response
    {
        $bien = $bienRepository->findAll();
        return $this->render('bien/index.html.twig', [
            'bien'=>$bien
        ]);

    }
    #[Route('/bien/{id}',name:'app_bien_voir' ,requirements: ['id'=>'\d+'])]
    public function voir(BienRepository $bienRepository,int $id ){

            $bien = $bienRepository->find($id);

        return $this->render('bien/voir.html.twig',[
            'bien'=>$bien
        ]);
    }

}
