<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository; 
use App\Entity\Client;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(ClientRepository $clientRepository): Response
    {

        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, ClientRepository $clientRepository): Response
    {   
        $client= new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handlRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

        }
        
        return $this->render('home/index.html.twig', [
        'form' => $form->createView(),
    ]);
    }
}
