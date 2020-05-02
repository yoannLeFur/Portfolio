<?php


namespace App\Controller\admin;


use App\Repository\PortfolioAboutRepository;
use App\Repository\PortfolioAdminRepository;
use App\Repository\PortfolioFormationRepository;
use App\Repository\PortfolioHomeRepository;
use App\Repository\PortfolioProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    /**
     * @var PortfolioProjetRepository
     */
    private $portfolioProjetRepository;

    /**
     * @var PortfolioFormationRepository
     */
    private $portfolioFormationRepository;

    public function __construct(PortfolioAdminRepository $portfolioAdminRepository,
                                PortfolioHomeRepository $portfolioHomeRepository,
                                PortfolioAboutRepository $portfolioAboutRepository,
                                PortfolioProjetRepository $portfolioProjetRepository,
                                PortfolioFormationRepository $portfolioFormationRepository)
    {
        $this->portfolioAdminRepository = $portfolioAdminRepository;
        $this->portfolioHomeRepository = $portfolioHomeRepository;
        $this->portfolioAboutRepository = $portfolioAboutRepository;
        $this->portfolioProjetRepository = $portfolioProjetRepository;
        $this->portfolioFormationRepository = $portfolioFormationRepository;
    }

    /**
 * @Route(name="admin.index",path="/administration")
 * @return Response
 */
    public function index(): Response
    {
        $homes = $this->portfolioHomeRepository->findAll();
        $abouts = $this->portfolioAboutRepository->findAll();
        $formations = $this->portfolioFormationRepository->findAll();
        $projets = $this->portfolioProjetRepository->findAll();
        return $this->render('page/admin.html.twig', [
            "homes" => $homes,
            "abouts" => $abouts,
            "formations" => $formations,
            "projets" => $projets,
        ]);
    }

}
