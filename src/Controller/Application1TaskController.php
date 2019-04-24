<?php

namespace App\Controller;

use App\Entity\Application1Task;
use App\Form\Application1TaskType;
use App\Repository\Application1TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/application1/task")
 */
class Application1TaskController extends AbstractController
{
    /**
     * @Route("/", name="application1_task_index", methods={"GET"})
     */
    public function index(Application1TaskRepository $application1TaskRepository): Response
    {
        return $this->render('application1_task/index.html.twig', [
            'application1_tasks' => $application1TaskRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="application1_task_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $application1Task = new Application1Task();
        $form = $this->createForm(Application1TaskType::class, $application1Task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($application1Task);
            $entityManager->flush();

            return $this->redirectToRoute('application1_task_index');
        }

        return $this->render('application1_task/new.html.twig', [
            'application1_task' => $application1Task,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="application1_task_show", methods={"GET"})
     */
    public function show(Application1Task $application1Task): Response
    {
        return $this->render('application1_task/show.html.twig', [
            'application1_task' => $application1Task,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="application1_task_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Application1Task $application1Task): Response
    {
        $form = $this->createForm(Application1TaskType::class, $application1Task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('application1_task_index', [
                'id' => $application1Task->getId(),
            ]);
        }

        return $this->render('application1_task/edit.html.twig', [
            'application1_task' => $application1Task,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="application1_task_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Application1Task $application1Task): Response
    {
        if ($this->isCsrfTokenValid('delete'.$application1Task->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($application1Task);
            $entityManager->flush();
        }

        return $this->redirectToRoute('application1_task_index');
    }
}
