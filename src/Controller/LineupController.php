<?php

namespace App\Controller;

use App\Repository\LineupRepository;
use App\Repository\PlaceRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LineupController extends AbstractController
{
    private array $data;
    private array $artistLineup;
    private array $days = ['Pátek', 'Sobota', 'Neděle'];
    private bool $isLineupPublic;
    public function __construct(
        LineupRepository $lineupRepository,
        YearRepository $yearRepository,
        PlaceRepository $placeRepository)
    {
        $lastYear = $yearRepository->getLastYear();
        $this->data = $lineupRepository->findByLastYear($lastYear['lastYearId']);

        foreach ($this->data as $lineup) {
            $lineup->artist_start = $lineup->getTimeFrom()->format('H:i:s');
        }

        foreach ($yearRepository->findLastYearData() as $year) {
            $this->isLineupPublic = $year->isLineupPublic();
        }

        foreach ($this->days as $day) {
            foreach ($placeRepository->findAll() as $place) {
                $this->artistLineup[$day][$place->getName()] =
                    array_merge($lineupRepository->findLineupByDay($lastYear['lastYearId'], $day, $place->getName()),
                    $lineupRepository->findLineupByDayNight($lastYear['lastYearId'], $day, $place->getName()));

                if(empty($this->artistLineup[$day][$place->getName()])) {
                    unset($this->artistLineup[$day][$place->getName()]);
                }
            }
            if(empty($this->artistLineup[$day])) {
                unset($this->artistLineup[$day]);
            }
        }
    }
    public function artistOrder(): Response
    {
        return $this->render('lineup/index.html.twig', [
            'artists' => $this->data,
        ]);
    }

    public function lineup(): Response
    {
        return $this->render('lineup/lineup.html.twig', [
            'lineup' => $this->artistLineup,
            'lineup_public' => $this->isLineupPublic,
        ]);
    }
}
