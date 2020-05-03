<?php


namespace App\Controller\admin;


use App\Entity\PortfolioExperience;
use App\Form\ExperienceType;
use App\Repository\PortfolioExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{

    /**
     * @var PortfolioExperienceRepository
     */
    private $portfolioExperienceRepository;

    public function __construct(PortfolioExperienceRepository $portfolioExperienceRepository )
    {
        $this->portfolioExperienceRepository = $portfolioExperienceRepository;
    }

    /**
     * @Route(name="admin.experience.create",path="/administration/experience-create")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $experience = new PortfolioExperience();
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($experience);
            $em->flush();
            $this->addFlash('success', 'Une nouvelle experience s\'est crée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('experience/new.html.twig', [
            'experience' => $experience,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/experience/{id}", name="admin.experience.edit", methods="GET|POST")
     * @param PortfolioExperience $experience
     * @param Request $request
     * @return Response
     */
    public function edit(PortfolioExperience $experience, Request $request)
    {
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('primary', 'L\'experience a été modifiée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('experience/edit.html.twig', [
            'experience' => $experience,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/experience/{id}", name="admin.experience.delete", methods="DELETE")
     * @param PortfolioExperience $experience
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioExperience $experience, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $experience->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($experience);
            $entityManager->flush();
            $this->addFlash('danger', 'L\'experience a bien été supprimée');
            return $this->redirectToRoute('admin.index');
        }

    }

}
