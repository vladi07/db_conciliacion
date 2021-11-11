<?php

namespace App\Controller;

use App\Entity\Departamento;
use App\Entity\Localidad;
use App\Form\DepartamentoType;
use App\Form\LocalidadType;
use App\Repository\DepartamentoRepository;
use App\Repository\LocalidadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dpto")
 */
class DepartamentoController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'departamento_index', methods: ['GET'])]
    public function index(DepartamentoRepository $departamentoRepository): Response
    {
        return $this->render('departamento/index.html.twig', [
            'departamentos' => $departamentoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'departamento_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $departamento = new Departamento();
        $form = $this->createForm(DepartamentoType::class, $departamento);
        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($departamento);
            $entityManager->flush();

            $this->addFlash('success', 'Se ha registrado exitosamente el Departamento');

            return $this->redirectToRoute('departamento_index');
        }

        return $this->renderForm('departamento/new.html.twig', [
            'departamento' => $departamento,
            'form' => $form,
        ]);
    }

    #[Route("/{id}", name: 'departamento_show', methods: ["GET","POST"])]
    public function show(Request $request, Departamento $departamento, LocalidadRepository $localidadRepository): Response
    {
        /*
        $localidad = new Localidad();
        $formulario = $this->createForm(LocalidadType::class, $localidad);
        */

        /* Usamos el HANDLEREQUEST para asignar los valores de los datos */
        /*
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $localidad->setDpto($departamento);

            $this->entityManager->persist($localidad);
            $this->entityManager->flush();

            return $this->redirectToRoute('departamento_show', ['id' => $departamento->getId()]);
        }

        $offset = max(0, $request->query->getInt('offset',0));

        $paginator = $localidadRepository->getLocalidadPaginator($departamento, $offset);
        */

        return $this->render('departamento/show.html.twig', [
            'departamento' => $departamento,
            /*
            'localidad' => $paginator,
            'anterior' => $offset - LocalidadRepository::PAGINATOR_PER_PAGE,
            'siguiente' => min(count($paginator), $offset + LocalidadRepository::PAGINATOR_PER_PAGE),

            'localidad_form' => $formulario->createView()
            */
        ]);
    }

    #[Route('/{id}/edit', name: 'departamento_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Departamento $departamento): Response
    {
        $form = $this->createForm(DepartamentoType::class, $departamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('departamento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('departamento/edit.html.twig', [
            'departamento' => $departamento,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'departamento_delete', methods: ['POST'])]
    public function delete(Request $request, Departamento $departamento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$departamento->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($departamento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('departamento_index', [], Response::HTTP_SEE_OTHER);
    }
}
