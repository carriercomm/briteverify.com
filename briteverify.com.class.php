<?php 

/*

  Example of use:
  ---------------

  include 'briteverify.com.class.php';

  $brite = new Brite_Verify($_email, 'YOU-API-KEY');
  $result = $brite->verify();
  var_dump($result);

*/

class Brite_Verify{

  var $apikey = '';
  var $email = '';
  var $api = 'http://api.briteverify.com/emails/verify.js?apikey=#apikey&email[address]=#email';

  public function __construct($email, $apikey){
    $this->email = $email;
    $this->apikey = $apikey;
  }

  public function verify(){

        $endpoint = $this->api;
        $endpoint = str_replace('#apikey', $this->apikey, $endpoint);
        $endpoint = str_replace('#email', urlencode($this->email), $endpoint);

        $data = json_decode($this->get_contents($endpoint));

        return $data;
    }

    function get_contents($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $results = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return $results;
    }


  
}