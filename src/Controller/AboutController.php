<?php


namespace App\Controller;


use App\Repository\PortfolioAboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{

    /**
     * @var PortfolioAboutRepository
     */
    private $portfolioAboutRepository;


    public function __construct(PortfolioAboutRepository $portfolioAboutRepository)
    {
        $this->portfolioAboutRepository = $portfolioAboutRepository;
    }

    /**
     * @Route(name="about.index",path="/présentation")
     * @return Response
     */
    public function aboutIndex(): Response
    {
        $abouts = $this->portfolioAboutRepository->findAll();
        return $this->render('page/about.html.twig', [
            "abouts" => $abouts
        ]);
    }

}
