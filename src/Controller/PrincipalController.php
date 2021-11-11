<?php

namespace App\Controller;

use App\Repository\CentroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    /**
     * @Route ("/", name="inicio", methods={"GET"})
     */
    public function index(CentroRepository $centroRepository): Response
    {
        $centro = $centroRepository->findAll();

        return $this -> render('principal/index.html.twig', [
            'centros' => $centro,
        ]);
    }
}