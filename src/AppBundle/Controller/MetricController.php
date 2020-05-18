<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RequestMetric;
use AppBundle\Repository\MetricRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MetricController extends Controller
{
    /**
     * @Route("/metrics_api", name="metrics_get_api")
     */
    public function indexAction(Request $request)
    {

        $data = array();
        /** @var MetricRepository $metricRepository */
        $metricRepository = $this->get('AppBundle\Repository\MetricRepository');

        $metrics = $metricRepository->GetLatestMetrics();

        $metrics = array_reverse($metrics);
        /** @var RequestMetric $item */
        foreach($metrics as $item){
            $date = $item->getEventdate();
            $data['totals']['labels'][] = $date->format("H:i");
            $data['totals']['values'][] = $item->getSuccess() + $item->getRejects();
            $data['rejects']['labels'][] = $date->format("H:i");
            $data['rejects']['values'][] = $item->getRejects();
        }

        $response = new JsonResponse();
        $response->setData($data);
        return $response;

    }


}
