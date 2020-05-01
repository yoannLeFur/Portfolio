<?php


namespace App\Controller;


use App\Repository\PortfolioAdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @var PortfolioAdminRepository
     */
    private $portfolioAdminRepository;

    public function __construct(PortfolioAdminRepository $portfolioAdminRepository)
    {
        $this->portfolioAdminRepository = $portfolioAdminRepository;
    }

    /**
     * @Route(name="admin",path="/administration")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('page/admin.html.twig');
    }
}
