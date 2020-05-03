<?php


namespace App\Controller;


use App\Repository\PortfolioSkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillController extends AbstractController
{

    /**
     * @var PortfolioSkillRepository
     */
    private $portfolioSkillRepository;

    public function __construct(PortfolioSkillRepository $portfolioSkillRepository)
    {
        $this->portfolioSkillRepository = $portfolioSkillRepository;
    }

    /**
     * @Route(name="skill.index",path="/compétences")
     * @return Response
     */
    public function skillIndex(): Response
    {
        $skills = $this->portfolioSkillRepository->findAll();
        return $this->render('page/skill.html.twig', [
            "skills" => $skills
        ]);
    }

}
