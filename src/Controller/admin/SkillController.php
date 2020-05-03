<?php


namespace App\Controller\admin;


use App\Entity\PortfolioSkill;
use App\Form\SkillType;
use App\Repository\PortfolioSkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillController extends AbstractController
{

    /**
     * @var PortfolioSkillRepository
     */
    private $portfolioSkillRepository;

    public function __construct(PortfolioSkillRepository $portfolioSkillRepository )
    {
        $this->portfolioSkillRepository = $portfolioSkillRepository;
    }

    /**
     * @Route(name="admin.skill.create",path="/administration/skill-create")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $skill = new PortfolioSkill();
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();
            $this->addFlash('success', 'Une nouvelle compètence s\'est crée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('skill/new.html.twig', [
            'skill' => $skill,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/skill/{id}", name="admin.skill.edit", methods="GET|POST")
     * @param PortfolioSkill $skill
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PortfolioSkill $skill, Request $request)
    {
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('priamry', 'La compètence a été modifié avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('skill/edit.html.twig', [
            'skill' => $skill,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/skill/{id}", name="admin.skill.delete", methods="DELETE")
     * @param PortfolioSkill $skill
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioSkill $skill, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $skill->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($skill);
            $entityManager->flush();
            $this->addFlash('danger', 'La compètence a bien été supprimé');
            return $this->redirectToRoute('admin.index');
        }

    }

}
