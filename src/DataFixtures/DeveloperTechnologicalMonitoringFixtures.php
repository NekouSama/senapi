<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\DeveloperTechnologicalMonitoring;

class DeveloperTechnologicalMonitoringFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $post = new DeveloperTechnologicalMonitoring();
            $post->setTitle($faker->text(75));
            $post->setLink($faker->url);
            $post->setCreatedAt($faker->dateTime());
            $post->setCategory('symfony');
            $post->setVersion('4.3');
            $manager->persist($post);
        }

        $manager->flush();
    }
}
