<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuteurFixtures extends Fixture
{
    public const JEAN_ROBA = 'jean-roba';
    public const BELL_HOOKS = 'bell-hooks';
    
    public function load(ObjectManager $manager): void
    {
        $auteur = new Auteur();
        $auteur->setNom("Roba");
        $auteur->setPrenom("Jean");
        $auteur->setBiographie("Jean Roba est un auteur de bande dessinée né le 28 juillet 1930 à Schaerbeek, dans la région de Bruxelles-Capitale, et mort dans la même ville le 14 juin 2006. Il est surtout connu comme l'auteur de la série Boule et Bill, bien qu'il ait réalisé beaucoup d'autres travaux.");
        $auteur->setSlug("jean-roba");
        $auteur->setImageName("jean-roba.jpg");
        $manager->persist($auteur);
        //On associe l'instance de l'auteur à une référance pour pouvoir récupérer
        //l'auteur dans une autre fixture
        $this->addReference(self::JEAN_ROBA, $auteur);


        $auteur = new Auteur();
        $auteur->setPseudo("bell hooks");
        $auteur->setBiographie("Gloria Jean Watkins, connue sous son nom de plume bell hooks, née le 25 septembre 1952 à Hopkinsville et morte le 15 décembre 2021 à Berea, est une intellectuelle, universitaire et militante américaine, théoricienne du black feminism.");
        $auteur->setSlug("bell-hooks");
        $auteur->setImageName("bell-hooks.jpg");
        $manager->persist($auteur);
        $this->addReference(self::BELL_HOOKS, $auteur);

        $manager->flush();
    }
}
