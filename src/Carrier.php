<?php

namespace AnselmoJacyntho\Carrier;

use AnselmoJacyntho\Carrier\Postmon;
use AnselmoJacyntho\Carrier\IBGEService;

class Carrier
{
    protected $postmon;
    protected $ibge;

    public function __construct()
    {
        $this->postmon = new Postmon();
        $this->ibge = new IBGEService();
    }
    public function findByCep($cep)
    {
        return $this->postmon->find($cep);
    }

    public function getRegions()
    {
        return $this->ibge->getRegions();
    }

    public function getStatesByRegion($region_id)
    {
        return $this->ibge->getStatesByRegion($region_id);
    }

    public function getStates()
    {
        return $this->ibge->getStates();
    }

    public function getCities()
    {
        return $this->ibge->getCities();
    }

    public function getCitiesByState($state_id)
    {
        return $this->ibge->getCitiesByState($state_id);
    }

    public function getDistrictsByCity($city_id)
    {
        return $this->ibge->getDistrictsByCity($city_id);
    }
}
