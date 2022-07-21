<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Form\ClientType;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request): Response
    {
        $client= new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

        }
        
        return $this->render('home/index.html.twig', [
        'form' => $form->createView(),
    ]);
    }
}
