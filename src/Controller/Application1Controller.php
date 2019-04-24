<?php

namespace App\Controller;

use App\Entity\Application1Task;
use App\Entity\Application1Objectif;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/application1")
 */
class Application1Controller extends AbstractController
{
    /**
     * @Route("/", name="application1")
     */
    public function index()
    {
        $myObjectifs = $this->getDoctrine()->getRepository(Application1Objectif::class)->findAll();

        return $this->render('application1/index.html.twig', [
            'controller_name' => 'Application1Controller',
            'objectifs' => $myObjectifs
        ]);
    }
}
