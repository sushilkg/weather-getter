<?php

    namespace WeatherGetter;

    use Cmfcmf\OpenWeatherMap;
    use Cmfcmf\OpenWeatherMap\Exception as OWMException;

    class WeatherGetter {

        private $lang;
        private $api_key;
        private $unit;

        public function __construct() {
            $this->lang = "en";
            $this->api_key = "8be328e413bbcc0193759fb4b450d816";
            $this->unit = "metric";

            try {
                $this->owm = new OpenWeatherMap($this->api_key);
            } catch (\Exception $e) {
                die('Something went wrong: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').');
            }
        }


        public function get($city = false) {
            $response = $this->owm->getWeather('Kathmandu', $this->unit, $this->lang);
            
            echo '<pre>';
            print_r($response);
            exit;

            $result = new \stdClass();
            $result->city = $city ?: " current city";
            $result->temperature = "28 C";
            $result->wind_speed = "5 KM/H";

            return $result;
        }
    }