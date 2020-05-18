<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Quota;
use AppBundle\Entity\RequestMetric;
use \Unirest\Request;
use Unirest\Request\Body;

class MetricRepository {

    private $apiurl;
    /**
     * QuotaRepository constructor.
     */
    public function __construct($apiurl) {
        $this->apiurl = rtrim($apiurl, '/');
    }

    public function GetLatestMetrics(){
        $metrics = array();

        $headers = array('Accept' => 'application/json');

        $response = \Unirest\Request::get($this->apiurl . '/metrics', $headers);

        $resultList = json_decode($response->raw_body, true);

        foreach ($resultList as $item){
            $metric = new RequestMetric();
            $metric->loadFromArray($item);
            $metrics[] = $metric;
        }

        //Now we have an array
        return $metrics;
    }


}
