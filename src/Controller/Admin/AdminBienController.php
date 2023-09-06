<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use App\Entity\Ville;
use App\Form\BienType;
use App\Form\VilleType;
use App\Repository\BienRepository;
use App\Repository\VilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/admin/bien', name: 'app_admin_bien')]
class AdminBienController extends AbstractController
{
    #[Route('/', name: '_liste')]
    public function index(BienRepository $bienRepository): Response
    {
        $biens = $bienRepository->findAll();


        return $this->render('admin/admin_bien/index.html.twig', [
            'controller_name' => 'AdminBienController',
            'biens'=>$biens
        ]);
    }
    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function ajouter(Request $request,EntityManagerInterface $entityManager,int $id=null, BienRepository $bienRepository):Response{
        if($id==null){
            $bien = new Bien();


        }else{
            $bien = $bienRepository->find($id);
            $this->addFlash(
                'notice',
                'Modification reussi!'
            );
        }

        $form = $this->createForm(BienType::class,$bien);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($bien);
            $entityManager->flush();
            $this->addFlash(
                'ajout',
                'ajout reussi!'
            );
            return $this->redirectToRoute('app_admin_bien_liste');

        }
        return $this->render('admin/admin_bien/editer.html.twig',[
            'form'=>$form,
            "coucou"=>"coucou"
            ]
        );
    }
    #[Route('/supprimer/{id}', name: '_supprimer')]
    public function supprimer( entityManagerInterface $entityManager,BienRepository $bienRepository,int $id=null):Response{
        if($id==null){
            $bien = new Bien();
        }else{
            $bien = $bienRepository->find($id);
        }

        $entityManager->remove($bien);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin_bien_liste');
    }
    #[Route('/ville','_ville_liste')]
    public function villeList(VilleRepository $ville):Response{
        $villes =$ville->findAll();
        return $this->render('admin/admin_bien/list.html.twig',[
            'ville'=>$villes
        ]);
    }
    #[Route('/ajouterVille',name:'_ville' )]
    #[Route('/modifierVille/{id}', name: '_modifierVille')]
    public function ajouterVille(Request $request,VilleRepository $ville, entityManagerInterface $entityManager,int $id=null):Response{
        if($id==null){
            $ville = new Ville();
        }else{
            $ville->find($id);
        }

        $form = $this->createForm(VilleType::class,$ville);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($ville);
            $entityManager->flush();
            return $this->redirectToRoute('_ville_liste');
        }
        return $this->render('admin/admin_bien/ajouterVille.html.twig',[
            'form'=>$form
        ]);
    }

}
