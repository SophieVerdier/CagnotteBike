<?php

namespace App\Controller;

use App\Entity\TypeDeService;
use App\Form\TypeDeServiceType;
use App\Repository\TypeDeServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/de/service')]
class TypeDeServiceController extends AbstractController
{
    #[Route('/', name: 'app_type_de_service_index', methods: ['GET'])]
    public function index(TypeDeServiceRepository $typeDeServiceRepository): Response
    {
        return $this->render('type_de_service/index.html.twig', [
            'type_de_services' => $typeDeServiceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_de_service_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeDeServiceRepository $typeDeServiceRepository): Response
    {
        $typeDeService = new TypeDeService();
        $form = $this->createForm(TypeDeServiceType::class, $typeDeService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeDeServiceRepository->add($typeDeService, true);

            return $this->redirectToRoute('app_type_de_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_de_service/new.html.twig', [
            'type_de_service' => $typeDeService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_de_service_show', methods: ['GET'])]
    public function show(TypeDeService $typeDeService): Response
    {
        return $this->render('type_de_service/show.html.twig', [
            'type_de_service' => $typeDeService,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_de_service_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeDeService $typeDeService, TypeDeServiceRepository $typeDeServiceRepository): Response
    {
        $form = $this->createForm(TypeDeServiceType::class, $typeDeService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeDeServiceRepository->add($typeDeService, true);

            return $this->redirectToRoute('app_type_de_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_de_service/edit.html.twig', [
            'type_de_service' => $typeDeService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_de_service_delete', methods: ['POST'])]
    public function delete(Request $request, TypeDeService $typeDeService, TypeDeServiceRepository $typeDeServiceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDeService->getId(), $request->request->get('_token'))) {
            $typeDeServiceRepository->remove($typeDeService, true);
        }

        return $this->redirectToRoute('app_type_de_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
