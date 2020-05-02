<?php


namespace App\Controller\admin;


use App\Entity\PortfolioAbout;
use App\Form\AboutType;
use App\Repository\PortfolioAboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{

    /**
     * @var PortfolioAboutRepository
     */
    private $portfolioAboutRepository;

    public function __construct(PortfolioAboutRepository $portfolioAboutRepository )
    {
        $this->portfolioAboutRepository = $portfolioAboutRepository;
    }

    /**
     * @Route(name="admin.about.create",path="/administration/about-create")
     * @param Request $request
     * @return Response
     */
    public function createHome(Request $request): Response
    {
        $about = new PortfolioAbout();
        $form = $this->createForm(AboutType::class, $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($about);
            $em->flush();
            $this->addFlash('success', 'Une nouvelle création dans la catégorie " Présentation" s\'est effectuée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('about/new.html.twig', [
            'about' => $about,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/about/{id}", name="admin.about.edit", methods="GET|POST")
     * @param PortfolioAbout $about
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PortfolioAbout $about, Request $request)
    {
        $form = $this->createForm(AboutType::class, $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'Les informations ont bien étées modifier avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('about/edit.html.twig', [
            'about' => $about,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/about/{id}", name="admin.about.delete", methods="DELETE")
     * @param PortfolioAbout $about
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioAbout $about, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $about->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($about);
            $entityManager->flush();
            $this->addFlash('success', 'Les informations ont bien étées supprimer');
            return $this->redirectToRoute('admin.index');
        }

    }

}
