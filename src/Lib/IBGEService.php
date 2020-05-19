<?php namespace AnselmoJacyntho\Carrier\Lib;

use AnselmoJacyntho\Carrier\Lib\Curl;

class IBGEService {

    protected $endpoint;

    public function __construct()
    {
        $this->endpoint = 'https://servicodados.ibge.gov.br/api/v1/localidades/';
    }

    public function getRegions()
    {
        $response = Curl::get("$this->endpoint/regioes");

        return json_decode($response);
    }

    public function getStatesByRegion($region_id)
    {
        $response = Curl::get("$this->endpoint/regioes/$region_id/estados");

        return json_decode($response);
    }

    public function getStates()
    {
        $response = Curl::get("$this->endpoint/estados");

        return json_decode($response);
    }

    public function getCities()
    {
        $response = Curl::get("$this->endpoint/municipios");

        return json_decode($response);
    }

    public function getCitiesByState($state_id)
    {
        $response = Curl::get("$this->endpoint/estados/$state_id/municipios");

        return json_decode($response);
    }

    public function getDistrictsByCity($city_id)
    {
        $response = Curl::get("$this->endpoint/municipios/$city_id/distritos");

        return json_decode($response);
    }
}
