<?php

namespace App\Controller;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {

        $file = file_get_contents('https://symfony.com/blog/new-in-symfony-4-3-better-html5-parser-for-domcrawler?utm_source=Symfony%20Blog%20Feed&amp;amp;utm_medium=feed');
        $crawler = new Crawler($file);
        $tag = $crawler->filter('main > section > div')->text();

        return $this->render('test/index.html.twig', [
            'tag' => $tag,
        ]);
    }
}
