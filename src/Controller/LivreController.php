<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
    #[Route('/livre', name: 'app_livre')]
    //Ingection LivreRepository $livreRepository
    public function index(LivreRepository $livreRepository): Response 
    {
        // On récupère tous les livres
        $livres = $livreRepository->findAll();
        //On rend la page en lui passant la liste des livres
        return $this->render('livre/index.html.twig', [
            'livres' =>$livres,
        ]);
    }
    #[Route('/livre/{slug}', name: 'app_livre_show')]
    public function showBook($slug, LivreRepository $livreRepository): Response
    {
        //Jn récupère le livre correspondant au slug
        $livre = $livreRepository->findOneBy(['slug' => $slug]);
        // On rend la page en lui passant le livre
        return $this->render('livre/show.html.twig', [
            'livre' =>$livre,
        ]);}
}
