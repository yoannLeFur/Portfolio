<?php


namespace App\Controller;


use App\Entity\PortfolioHome;
use App\Form\HomeType;
use App\Repository\PortfolioHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @var PortfolioHomeRepository
     */
    private $portfolioHomeRepository;

    public function __construct(PortfolioHomeRepository $portfolioHomeRepository )
    {
        $this->portfolioHomeRepository = $portfolioHomeRepository;
    }

    /**
 * @Route(name="admin.index",path="/administration")
 * @return Response
 */
    public function index(): Response
    {
        $homes = $this->portfolioHomeRepository->findAll();
        return $this->render('page/admin.html.twig', [
            "homes" => $homes
        ]);
    }

    /**
     * @Route(name="admin.home.create",path="/administration/home-create")
     * @param Request $request
     * @return Response
     */
    public function createHome(Request $request): Response
    {
        $home = new PortfolioHome();
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($home);
            $em->flush();
            $this->addFlash('success', 'Une nouvelle création dans la catégorie "Home" s\'est effectuée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('home/new.html.twig', [
            'home' => $home,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/home/{id}", name="admin.home.edit", methods="GET|POST")
     * @param PortfolioHome $home
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PortfolioHome $home, Request $request)
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'Les informations ont bien étées modifier avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('home/edit.html.twig', [
            'home' => $home,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/home/{id}", name="admin.home.delete", methods="DELETE")
     * @param PortfolioHome $home
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function delete(PortfolioHome $home, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $home->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($home);
            $entityManager->flush();
            $this->addFlash('success', 'Les informations ont bien étées supprimer');
            return $this->redirectToRoute('admin.index');
        }

    }

}
