<?php


namespace App\Controller\admin;


use App\Entity\PortfolioAbout;
use App\Entity\PortfolioHome;
use App\Form\HomeType;
use App\Repository\PortfolioAboutRepository;
use App\Repository\PortfolioAdminRepository;
use App\Repository\PortfolioHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @var PortfolioAdminRepository
     */
    private $portfolioAdminRepository;

    /**
     * @var PortfolioHomeRepository
     */
    private $portfolioHomeRepository;

    /**
     * @var PortfolioAboutRepository
     */
    private $portfolioAboutRepository;

    public function __construct(PortfolioAdminRepository $portfolioAdminRepository, PortfolioHomeRepository $portfolioHomeRepository, PortfolioAboutRepository $portfolioAboutRepository )
    {
        $this->portfolioAdminRepository = $portfolioAdminRepository;
        $this->portfolioHomeRepository = $portfolioHomeRepository;
        $this->portfolioAboutRepository = $portfolioAboutRepository;
    }

    /**
 * @Route(name="admin.index",path="/administration")
 * @return Response
 */
    public function index(): Response
    {
        $homes = $this->portfolioHomeRepository->findAll();
        $abouts = $this->portfolioAboutRepository->findAll();
        return $this->render('page/admin.html.twig', [
            "homes" => $homes,
            "abouts" => $abouts
        ]);
    }

}
