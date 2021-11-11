<?php

namespace App\Controller;

use App\Entity\Idioma;
use App\Entity\Reporte;
use App\Form\IdiomaType;
use App\Form\Reporte1Type;
use App\Repository\IdiomaRepository;
use App\Repository\ReporteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reporte')]
class ReporteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'reporte_index', methods: ['GET'])]
    public function index(ReporteRepository $reporteRepository): Response
    {
        return $this->render('reporte/index.html.twig', [
            'reportes' => $reporteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'reporte_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $reporte = new Reporte();
        $form = $this->createForm(Reporte1Type::class, $reporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reporte);
            $entityManager->flush();

            $this->addFlash('success', 'Se ha registrdo el REPORTE exitosamente');

            return $this->redirectToRoute('reporte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reporte/new.html.twig', [
            'reporte' => $reporte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reporte_show', methods: ['GET','POST'])]
    public function show(Request $request, Reporte $reporte, IdiomaRepository $idiomaRepository): Response
    {
        $idioma = new Idioma();
        $formulario = $this->createForm(IdiomaType::class, $idioma);
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()){
            $idioma->setReporte($reporte);

            //$em = $this->getDoctrine()->getManager();
            //$em->persist($idioma);
            //$em->flush();

            $this->entityManager->persist($idioma);
            $this->entityManager->flush();

            return $this->redirectToRoute('reporte_show', ['id'=>$reporte->getId()]);
        }

        $offset = max(0, $request->query->getInt('offset', 0));

        $paginator = $idiomaRepository->getIdiomaPaginator($reporte, $offset);

        return $this->render('reporte/show.html.twig', [
            'reporte' => $reporte,
            'idioma' => $paginator,
            'anterior' => $offset - IdiomaRepository::PAGINATOR_PER_PAGE,
            'siguiente' => min(count($paginator), $offset + IdiomaRepository::PAGINATOR_PER_PAGE),

            'idioma_form' => $formulario->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'reporte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reporte $reporte): Response
    {
        $form = $this->createForm(Reporte1Type::class, $reporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reporte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reporte/edit.html.twig', [
            'reporte' => $reporte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reporte_delete', methods: ['POST'])]
    public function delete(Request $request, Reporte $reporte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reporte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reporte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reporte_index', [], Response::HTTP_SEE_OTHER);
    }
}
