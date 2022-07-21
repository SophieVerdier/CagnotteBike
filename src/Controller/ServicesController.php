<?php

namespace App\Controller;

use App\form\ServicesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TypeDeServiceRepository;

#[Route('/services', name: 'app_services_')]
class ServicesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(TypeDeServiceRepository $typeDeServiceRepository): Response
    {
       
        //$typeDeService = $typeDeServiceRepository->findAll();
        return $this->render('services/index.html.twig', [
            'services' => $services,
        ]);
    }

    #[Route('/show/{id}', name: 'show')]
    public function show(int $id, ServicesRepository $servicesRepository):Response
    {   
        $services = $servicesRepository->findOneBy(['id' => $id]);
    
    
        return $this->render('services/show.html.twig', [
            'services' => $services,
        ]);
    }



    #[Route('/new', name: 'app_services_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ServicesRepository $servicesRepository): Response
    {
        $services = new Services();
        $form = $this->createForm(ServicesType::class, $services);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $servicesRepository->add($services, true);

            return $this->redirectToRoute('app_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('services/new.html.twig', [
            'services' => $services,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_services_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Services $services, ServicesRepository $servicesRepository): Response
    {
        $form = $this->createForm(ServicesType::class, $services);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $servicesRepository->add($services, true);

            return $this->redirectToRoute('app_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('services/edit.html.twig', [
            'services' => $services,
            'form' => $form,
        ]);
    }

    
    #[Route('/{id}', name: 'app_services_delete', methods: ['DELETE'])]
    public function delete(Request $request, Services $services, ServicesRepository $servicesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $services->getId(), $request->request->get('_token'))) {
            $servicesRepository->remove($services, true);
        }

        return $this->redirectToRoute('app_services_index', [], Response::HTTP_SEE_OTHER);
    }


}

