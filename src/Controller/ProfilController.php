<?php

namespace App\Controller;

use App\Services\MailService;
use App\Services\UploadService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(UploadService $uploadService,MailService $mailerService): Response
    {
        $mailerService->sendmailNoreplyNoTemplate("test", "aurelienfabre439@gmail.com", "test",$fichiers = null);

        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }
}
