<?php namespace App\Libraries {
    class utils {
        private $hostname = '104.192.6.248';
        private $token = 'CNy571WAgrPrbrNi3TTT5ipuN7Z0pVYfIs1bgTXS';
        private $reg_exp = '/(?!https:\/\/104\.192\.6\.248\/(.*).png)(https:\/\/104\.192\.6\.248)/';

        public function get_data($api, $view) {
            $url = "https://" . $this->hostname . "/" . $api . "?view=" . $view;
            $headers = array(
                            'api-custom-token: ' . $this->token
                       );
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);
            curl_close($ch);
            return preg_replace($this->reg_exp, "", $data);        
        }
    }
}
?>
