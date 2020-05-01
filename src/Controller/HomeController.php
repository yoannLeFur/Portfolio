<?php

namespace App\Controller;

use App\Repository\PortfolioHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @var PortfolioHomeRepository
     */
    private $portfolioHomeRepository;

    public function __construct(PortfolioHomeRepository $portfolioHomeRepository)
    {
        $this->portfolioHomeRepository = $portfolioHomeRepository;
    }

    /**
     * @Route(name="home.index",path="/")
     * @return Response
     */
    public function index(): Response
    {
        $homes = $this->portfolioHomeRepository->findAll();
        return $this->render('page/home.html.twig', [
            "homes" => $homes,
        ]);
    }

}
