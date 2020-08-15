<?php


namespace App\Controller\admin;


use App\Repository\PortfolioAboutRepository;
use App\Repository\PortfolioAdminRepository;
use App\Repository\PortfolioContactRepository;
use App\Repository\PortfolioEmailRepository;
use App\Repository\PortfolioExperienceRepository;
use App\Repository\PortfolioFormationRepository;
use App\Repository\PortfolioHomeRepository;
use App\Repository\PortfolioProjetRepository;
use App\Repository\PortfolioSkillRepository;
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

    /**
     * @var PortfolioExperienceRepository
     */
    private $portfolioExperienceRepository;

    /**
     * @var PortfolioSkillRepository
     */
    private $portfolioSkillRepository;

    /**
     * @var PortfolioContactRepository
     */
    private $portfolioContactRepository;

    /**
     * @var PortfolioEmailRepository
     */
    private $portfolioEmailRepository;

    public function __construct(PortfolioAdminRepository $portfolioAdminRepository,
                                PortfolioHomeRepository $portfolioHomeRepository,
                                PortfolioAboutRepository $portfolioAboutRepository,
                                PortfolioProjetRepository $portfolioProjetRepository,
                                PortfolioFormationRepository $portfolioFormationRepository,
                                PortfolioExperienceRepository $portfolioExperienceRepository,
                                PortfolioSkillRepository $portfolioSkillRepository,
                                PortfolioContactRepository $portfolioContactRepository,
                                PortfolioEmailRepository $portfolioEmailRepository)
    {
        $this->portfolioAdminRepository = $portfolioAdminRepository;
        $this->portfolioHomeRepository = $portfolioHomeRepository;
        $this->portfolioAboutRepository = $portfolioAboutRepository;
        $this->portfolioProjetRepository = $portfolioProjetRepository;
        $this->portfolioFormationRepository = $portfolioFormationRepository;
        $this->portfolioExperienceRepository = $portfolioExperienceRepository;
        $this->portfolioSkillRepository = $portfolioSkillRepository;
        $this->portfolioContactRepository = $portfolioContactRepository;
        $this->portfolioEmailRepository = $portfolioEmailRepository;
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
        $expriences = $this->portfolioExperienceRepository->findAll();
        $skills = $this->portfolioSkillRepository->findAll();
        $contacts = $this->portfolioContactRepository->findAll();
        $emails = $this->portfolioEmailRepository->findAll();
        return $this->render('page/admin.html.twig', [
            "homes" => $homes,
            "abouts" => $abouts,
            "formations" => $formations,
            "projets" => $projets,
            "experiences" => $expriences,
            "skills" => $skills,
            "contacts" => $contacts,
            "emails" => $emails,
        ]);
    }

//    /**
//     * @Route(name="admin.email",path="/administration/email")
//     * @return Response
//     */
//    public function adminEmail(): Response
//    {
//        $emails = $this->portfolioEmailRepository->findAll();
//        return $this->render('emails/adminEmail.html.twig', [
//            "emails" => $emails,
//        ]);
//    }

}
