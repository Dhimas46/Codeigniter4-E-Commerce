<?php

namespace App\Controllers;

class Cart extends BaseController
{
  private $url = "https://api.rajaongkir.com/starter/";
  private $apiKey = "4c9442ec9729701e926f326376856f9f";
    public function index()
    {
      $builder = $this->db->table('product');
      $builder->select('*');
      $query   = $builder->get();
      $provinsi = $this->rajaongkir('province');

      return view('themes/store/product/cart', [
        'cart' => \Config\Services::cart(),
        'product' => $query->getResultArray(),
        'provinsi' => json_decode($provinsi)->rajaongkir->results,
      ]);
    }
    public function getCity()
    {
      if ($this->request->isAJAX()) {
        $id_province = $this->request->getGet('id_province');
        $data = $this->rajaongkir('city', $id_province);
        return $this->response->setJSON($data);
      }
    }
    public function getCost()
    {
        if ($this->request->isAJAX()) {
          $origin = $this->request->getGet('origin');
          $destination = $this->request->getGet('destination');
          $weight = $this->request->getGet('weight');
          $courier = $this->request->getGet('courier');
          $data = $this->rajaongkircost($origin, $destination, $weight, $courier);
          return $this->response->setJSON($data);
        }
    }
    private function rajaongkircost($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination
                              ."&weight=".$weight."&courier=".$courier,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".$this->apiKey,
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        return $response;
    }

    private function rajaongkir($method, $id_province=null)
    {
      $endPoint = $this->url.$method;

      if ($id_province!=null) {
        $endPoint = $endPoint."?province=".$id_province;
      }
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $endPoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: ".$this->apiKey
        ),
      ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }
}
