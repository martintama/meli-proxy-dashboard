<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Quota;
use \Unirest\Request;
use Unirest\Request\Body;

class QuotaRepository {

    private $apiurl;
    /**
     * QuotaRepository constructor.
     */
    public function __construct($apiurl) {
        $this->apiurl = rtrim($apiurl, '/');
    }

    public function GetAll(){
        $quotas = array();

        $headers = array('Accept' => 'application/json');

        $response = \Unirest\Request::get($this->apiurl . '/quotas', $headers);

        $resultList = json_decode($response->raw_body, true);

        foreach ($resultList as $item){
            $quota = new Quota();
            $quota->loadFromArray($item);
            $quotas[] = $quota;

        }

        return $quotas;
    }

    public function Get($id){

        $headers = array('Accept' => 'application/json');

        $response = \Unirest\Request::get($this->apiurl . '/quotas/' . $id, $headers);

        $result = json_decode($response->raw_body, true);

        $quota = new Quota();
        $quota->loadFromArray($result);

        return $quota;
    }

    public function Create(Quota $quota){
        $headers = array('Accept' => 'application/json');

        $data = $quota->convertToArray();
        $body = \Unirest\Request\Body::json($data);

        $url = $this->apiurl . '/quotas';

        $response = \Unirest\Request::post($url, $headers, $body);

        $result = json_decode($response->raw_body, true);

        $quota = new Quota();
        $quota->loadFromArray($result);

        return $quota;
    }


    public function Update(Quota $quota){
        $headers = array('Accept' => 'application/json');

        $data = $quota->convertToArray();

        $body = \Unirest\Request\Body::json($data);

        $id = $quota->getId();

        $response = Request::patch($this->apiurl . '/quotas/' . $id, $headers, $body);

        $result = json_decode($response->raw_body, true);

        $quota = new Quota();
        $quota->loadFromArray($result);

        return $quota;
    }

    public function Delete($quota){
        $headers = array('Accept' => 'application/json');

        $id = $quota->getId();

        $response = \Unirest\Request::delete($this->apiurl . '/quotas/' . $id, $headers);

    }

}
