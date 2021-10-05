<?php

namespace App\Controller;

use App\Entity\Centro;
use App\Entity\Reporte;
use App\Form\ReporteType;
use App\Repository\CentroRepository;
use App\Repository\ReporteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/centro")
 */
class CentrosController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="centros_index", methods={"GET"})
     */
    public function index(CentroRepository $centroRepository): Response
    {
        $centro = $centroRepository -> findAll();

        return $this->render('centros/index.html.twig', [
            /**'centros' => $centroRepository->findAll(), */
            'centros' => $centro,
        ]);
    }

    /**
     * @Route("/new", name="centros_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $centro = new Centro();
        return $this->render('centros/index.html.twig');
    }

    /**
     * @Route("/{id}", name="centros_show", methods={"GET","POST"})
     */
    public function show(Request $request, Centro $centro, ReporteRepository $reporteRepository): Response
    {
        $reporte = new Reporte();
        $formulario = $this->createForm(ReporteType::class, $reporte);

        $formulario->handleRequest($request);

        if($formulario->isSubmitted() && $formulario->isValid()){

            $reporte->setCentro($centro);

            $this->entityManager->persist($reporte);
            $this->entityManager->flush();
            /* Ruta clave */
            return $this->redirectToRoute('centros_show', ['id' => $centro->getId()]);
        }
        /*Valores Iniciales en 0 para la paginación*/
        $offset = max(0, $request->query->getInt('offset', 0));

        $paginator = $reporteRepository->getReportePaginator($centro, $offset);
        /* $reporte = $reporteRepository->findBy(
            ['centro' => $centro],
            ['gestion' => 'DESC']
        );*/
        return $this->render('centros/show.html.twig', [
            'centro' => $centro,
            'reporte' => $paginator,
            'anterior' => $offset - ReporteRepository::PAGINATOR_PER_PAGE,
            'siguiente' => min(count($paginator), $offset + ReporteRepository::PAGINATOR_PER_PAGE),

            'reporte_form' => $formulario->createView()
        ]);
    }
}
