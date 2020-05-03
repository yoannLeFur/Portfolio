<?php


namespace App\Controller;


use App\Repository\PortfolioContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @var PortfolioContactRepository
     */
    private $portfolioContactRepository;

    public function __construct(PortfolioContactRepository $portfolioContactRepository)
    {
        $this->portfolioContactRepository = $portfolioContactRepository;
    }

    /**
     * @Route(name="contact.index",path="/contact")
     * @return Response
     */
    public function contactIndex(): Response
    {
        return $this->render('page/contact.html.twig');
    }

}
