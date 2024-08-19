<?php

namespace App\Controller;

use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HeaderController extends AbstractController
{
    private array $data;
    private array $params;

    public function __construct(private readonly YearRepository $yearRepository) {
        $this->data = $this->yearRepository->findLastYearData();
    }

    public function index(): Response
    {
        foreach ($this->data as $year) {
            $this->params['grade'] = $year->getGrade();
            $this->params['lineup_public'] = $year->isLineupPublic();
        }

        return $this->render('header/index.html.twig', $this->params);
    }

    public function description(): Response
    {
        foreach ($this->data as $year) {
            $this->params['start'] = $year->getStart();
            $this->params['end'] = $year->getEnd();
            $this->params['fest_desc1'] = $year->getFestDescription1();
            $this->params['fest_desc2'] = $year->getFestDescription2();
            $this->params['ticket_link'] = $year->getTicketLink();
        }

        return $this->render('description/index.html.twig', $this->params);
    }

    public function priceList(): Response
    {
        foreach ($this->data as $year) {
            $this->params['fest_price_friday'] = $year->getFestPriceFriday();
            $this->params['fest_price_saturday'] = $year->getFestPriceSaturday();
            $this->params['fest_price_all'] = $year->getFestPriceAll();
            $this->params['fest_price_friday_student'] = $year->getFestPriceFridayStudent();
            $this->params['fest_price_saturday_student'] = $year->getFestPriceSaturdayStudent();
            $this->params['fest_price_all_student'] = $year->getFestPriceAllStudent();
        }

        return $this->render('priceList/index.html.twig', $this->params);

    }

    public function footer(): Response
    {
        foreach ($this->data as $year) {
            $this->params['spotify_link'] = $year->getSpotifyLink();
        }

        return $this->render('footer/index.html.twig', $this->params);
    }
}
