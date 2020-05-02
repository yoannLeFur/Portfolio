<?php


namespace App\Controller\admin;


use App\Entity\PortfolioHome;
use App\Form\HomeType;
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

    public function __construct(PortfolioAdminRepository $portfolioAdminRepository, PortfolioHomeRepository $portfolioHomeRepository )
    {
        $this->portfolioAdminRepository = $portfolioAdminRepository;
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

}
