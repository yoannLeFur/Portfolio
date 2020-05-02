<?php

namespace App\Controller;

use App\Repository\PortfolioAboutRepository;
use App\Repository\PortfolioHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @var PortfolioHomeRepository
     */
    private $portfolioHomeRepository;

    /**
     * @var PortfolioAboutRepository
     */
    private $portfolioAboutRepository;

    public function __construct(PortfolioHomeRepository $portfolioHomeRepository, PortfolioAboutRepository $portfolioAboutRepository)
    {
        $this->portfolioHomeRepository = $portfolioHomeRepository;
        $this->portfolioAboutRepository = $portfolioAboutRepository;
    }

    /**
     * @Route(name="home.index",path="/")
     * @return Response
     */
    public function index(): Response
    {
        $homes = $this->portfolioHomeRepository->findAll();
        $abouts = $this->portfolioAboutRepository->findAll();
        return $this->render('page/home.html.twig', [
            "homes" => $homes,
            "abouts" => $abouts
        ]);
    }

    /**
     * @Route("/download", name="download.file")
     **/
    public function downloadFileAction(){
        $response = new BinaryFileResponse('../public/download/CV-Yoann Le Fur.pdf');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,'CV-Yoann Le Fur.pdf');
        return $response;
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
