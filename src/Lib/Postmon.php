<?php namespace AnselmoJacyntho\Carrier\Lib;

use AnselmoJacyntho\Carrier\Lib\Curl;

class Postmon {

    protected $endpoint;

    public function __construct()
    {
        $this->endpoint = 'https://api.postmon.com.br/v1/cep/';
    }

    public function find($cep)
    {
        $cep = preg_replace('/[^a-z0-9\.]/i', '', $cep);

        $response = Curl::get("$this->endpoint/$cep");

        return $this->format($response);
    }

    protected function format ($data)
    {
        $decode = json_decode($data, true);

        $response = [
            'complement' => isset($decode['complemento']) ? $decode['complemento'] : null,
            'district' => isset($decode['bairro']) ? $decode['bairro'] : null,
            'city' => isset($decode['cidade']) ? $decode['cidade'] : null,
            'street' => isset($decode['logradouro']) ? $decode['logradouro'] : null,
            'state_data' => (object) [
                'area_km2' => isset($decode['estado_info']['area_km2']) ? $decode['estado_info']['area_km2'] : null,
                'ibge_code' => isset($decode['estado_info']['codigo_ibge']) ? $decode['estado_info']['codigo_ibge'] : null,
                "name" => isset($decode['estado_info']['nome']) ? $decode['estado_info']['nome'] : null
            ],
            'cep' => isset($decode['cep']) ? $decode['cep'] : null,
            'city_data' => (object) [
                "area_km2" => isset($decode['cidade_info']['area_km2']) ? $decode['cidade_info']['area_km2']: null,
                "ibge_code" => isset($decode['cidade_info']['codigo_ibge']) ? $decode['cidade_info']['codigo_ibge'] : null
            ],
            'state' => isset($decode['estado']) ? $decode['estado'] : null
        ];

        return (object) $response;
    }
}
