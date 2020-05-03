<?php


namespace App\Controller;


use App\Repository\PortfolioExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{

    /**
     * @var PortfolioExperienceRepository
     */
    private $portfolioExperienceRepository;

    public function __construct(PortfolioExperienceRepository $portfolioExperienceRepository)
    {
        $this->portfolioExperienceRepository = $portfolioExperienceRepository;
    }

    /**
     * @Route(name="experience.index",path="/expériences")
     * @return Response
     */
    public function formationIndex(): Response
    {
        $experiences = $this->portfolioExperienceRepository->findAll();
        return $this->render('page/experience.html.twig', [
            "experiences" => $experiences
        ]);
    }

}
