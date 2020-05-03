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

    public function __construct(PortfolioHomeRepository $portfolioHomeRepository, PortfolioAboutRepository $portfolioAboutRepository)
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

    /**
     * @Route("/download", name="download.file")
     **/
    public function downloadFileAction(){
        $response = new BinaryFileResponse('../public/download/CV-Yoann Le Fur.pdf');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,'CV-Yoann Le Fur.pdf');
        return $response;
    }

}
