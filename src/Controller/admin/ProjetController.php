<?php


namespace App\Controller\admin;


use App\Entity\PortfolioProjet;
use App\Form\AboutType;
use App\Form\ProjetType;
use App\Repository\PortfolioProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{

    /**
     * @var PortfolioProjetRepository
     */
    private $portfolioProjetRepository;

    public function __construct(PortfolioProjetRepository $portfolioProjetRepository )
    {
        $this->portfolioProjetRepository = $portfolioProjetRepository;
    }

    /**
     * @Route(name="admin.projet.create",path="/administration/projet-create")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $projet = new PortfolioProjet();
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();
            $this->addFlash('success', 'Un nouveau projet s\'est crée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('projet/new.html.twig', [
            'projet' => $projet,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/projet/{id}", name="admin.projet.edit", methods="GET|POST")
     * @param PortfolioProjet $projet
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PortfolioProjet $projet, Request $request)
    {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('primary', 'Le projet a été modifié avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('projet/edit.html.twig', [
            'projet' => $projet,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/projet/{id}", name="admin.projet.delete", methods="DELETE")
     * @param PortfolioProjet $projet
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioProjet $projet, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $projet->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projet);
            $entityManager->flush();
            $this->addFlash('danger', 'Le projet a bien été supprimé');
            return $this->redirectToRoute('admin.index');
        }

    }

}
