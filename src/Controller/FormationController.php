<?php


namespace App\Controller;


use App\Repository\PortfolioFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{

    /**
     * @var PortfolioFormationRepository
     */
    private $portfolioFormationRepository;

    public function __construct(PortfolioFormationRepository $portfolioFormationRepository)
    {
        $this->portfolioFormationRepository = $portfolioFormationRepository;
    }

    /**
     * @Route(name="formation.index",path="/formations")
     * @return Response
     */
    public function formationIndex(): Response
    {
        $formations = $this->portfolioFormationRepository->findAll();
        return $this->render('page/formation.html.twig', [
            "formations" => $formations
        ]);
    }


}
