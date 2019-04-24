<?php

namespace App\Controller;

use App\Entity\Application1Objectif;
use App\Form\Application1ObjectifType;
use App\Repository\Application1ObjectifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/application1/objectif")
 */
class Application1ObjectifController extends AbstractController
{
    /**
     * @Route("/", name="application1_objectif_index", methods={"GET"})
     */
    public function index(Application1ObjectifRepository $application1ObjectifRepository): Response
    {
        return $this->render('application1_objectif/index.html.twig', [
            'application1_objectifs' => $application1ObjectifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="application1_objectif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $application1Objectif = new Application1Objectif();
        $form = $this->createForm(Application1ObjectifType::class, $application1Objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($application1Objectif);
            $entityManager->flush();

            return $this->redirectToRoute('application1_objectif_index');
        }

        return $this->render('application1_objectif/new.html.twig', [
            'application1_objectif' => $application1Objectif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="application1_objectif_show", methods={"GET"})
     */
    public function show(Application1Objectif $application1Objectif): Response
    {
        return $this->render('application1_objectif/show.html.twig', [
            'application1_objectif' => $application1Objectif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="application1_objectif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Application1Objectif $application1Objectif): Response
    {
        $form = $this->createForm(Application1ObjectifType::class, $application1Objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('application1_objectif_index', [
                'id' => $application1Objectif->getId(),
            ]);
        }

        return $this->render('application1_objectif/edit.html.twig', [
            'application1_objectif' => $application1Objectif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="application1_objectif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Application1Objectif $application1Objectif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$application1Objectif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($application1Objectif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('application1_objectif_index');
    }
}
