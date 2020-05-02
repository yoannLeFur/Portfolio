<?php


namespace App\Controller\admin;


use App\Entity\PortfolioFormation;
use App\Form\FormationType;
use App\Repository\PortfolioFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{

    /**
     * @var PortfolioFormationRepository
     */
    private $portfolioFormationRepository;

    public function __construct(PortfolioFormationRepository $portfolioFormationRepository )
    {
        $this->portfolioFormationRepository = $portfolioFormationRepository;
    }

    /**
     * @Route(name="admin.formation.create",path="/administration/formation-create")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $formation = new PortfolioFormation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
            $this->addFlash('success', 'Une nouvelle formation s\'est crée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('formation/new.html.twig', [
            'formation' => $formation,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/formation/{id}", name="admin.formation.edit", methods="GET|POST")
     * @param PortfolioFormation $formation
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PortfolioFormation $formation, Request $request)
    {
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'La formation a été modifiée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('formation/edit.html.twig', [
            'formation' => $formation,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/formation/{id}", name="admin.formation.delete", methods="DELETE")
     * @param PortfolioFormation $formation
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioFormation $formation, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $formation->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formation);
            $entityManager->flush();
            $this->addFlash('success', 'La formation a bien été supprimée');
            return $this->redirectToRoute('admin.index');
        }

    }

}
