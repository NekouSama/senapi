<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DeveloperTechnologicalMonitoring;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/", name="home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $list = $this->getDoctrine()->getRepository(DeveloperTechnologicalMonitoring::Class)->findAll();

        return $this->render('home/index.html.twig', [
            'list' => $list
        ]);
    }
}
