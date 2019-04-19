<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\DeveloperTechnologicalMonitoring;
use App\SenapiClass\CurlClass;
use App\SenapiClass\ConsoleClass;

class ScrapRedditCommand extends Command
{
    protected static $defaultName = 'app:scrap-reddit';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $container = $this->getApplication()->getKernel()->getContainer();
        $manager = $container->get('doctrine')->getEntityManager();
        $repository = $container->get('doctrine')->getRepository(DeveloperTechnologicalMonitoring::class);

        $extractionWord = "New in Symfony ";
        $curl = new CurlClass('https://www.reddit.com/r/symfony/.json?limit=100');
        $json = json_decode($curl->cURL_download_page(), true);

        $counter = 0;


        foreach ($json['data']['children'] as $value) {
            $subreddit = $value['data']['subreddit_id'];
            $externalId = "reddit_${subreddit}";
            $title = $value['data']['title'];
            $created = $value['data']['created'];
            $selftext = $value['data']['selftext'];
            $image = "./assets/img/symfony.svg";
            $url = $value['data']['url'];

            if (strpos($title, $extractionWord) !== false) {
                if (!$repository->findByExternalId($externalId)) {
                    $post = new DeveloperTechnologicalMonitoring();
                    $date = new \DateTime();
                    $date->setTimestamp($created);

                    $post->setTitle($title);
                    $post->setLink($url);
                    $post->setCreatedAt($date);
                    $post->setCategory('symfony');
                    $post->setExternalId($externalId);
                    $manager->persist($post);
                    $counter++;
                }
            }
        }

        $manager->flush();

        $io = new ConsoleClass($input, $output);
        $io->section('Scrap reddit');
        $io->text(date('d/m/y h:i:s'), time());
        $io->text("${counter} added !", $io);
    }
}
