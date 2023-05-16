<?php
class RandomUserAPI {
    private $url = "https://randomuser.me/api/?results=10";
    
    public function getUsers() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);
        return json_decode($data, true);
    }
}

?>
