<?php

namespace App\Controller;

use App\Entity\Year;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HeaderController extends AbstractController
{
    public function index(YearRepository $yearRepository): Response
    {
        $d = $yearRepository->findLastYearData();

        $params = [];
        foreach ($d as $year) {
            $params['grade'] = $year->getGrade();
        }

        return $this->render('header/index.html.twig', $params);
    }

    public function description(YearRepository $yearRepository): Response
    {

        $d = $yearRepository->findLastYearData();

        $params = [];
        foreach ($d as $year) {
            $params['start'] = $year->getStart();
            $params['end'] = $year->getEnd();
            $params['fest_desc1'] = $year->getFestDescription1();
            $params['fest_desc2'] = $year->getFestDescription2();
            $params['ticket_link'] = $year->getTicketLink();
        }

        return $this->render('description/index.html.twig', $params);
    }
}
