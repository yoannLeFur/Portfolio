<?php


namespace App\Controller;


use App\Repository\PortfolioProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{

    /**
     * @var PortfolioProjetRepository
     */
    private $portfolioProjetRepository;

    public function __construct(PortfolioProjetRepository $portfolioProjetRepository)
    {
        $this->portfolioProjetRepository = $portfolioProjetRepository;
    }

    /**
     * @Route(name="projet.index",path="/projets")
     * @return Response
     */
    public function projetIndex(): Response
    {
        $projets = $this->portfolioProjetRepository->findAll();
        return $this->render('page/projet.html.twig', [
            "projets" => $projets
        ]);
    }


}
