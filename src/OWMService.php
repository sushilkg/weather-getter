<?php

    namespace WeatherGetter;

    use Cmfcmf\OpenWeatherMap;

    class OWMService implements WeatherServiceInterface {

        CONST OWM_LANG = "en";
        CONST OWM_UNIT = "metric";

        private $api_key;
        private $owm;

        public function __construct() {
            $this->api_key = getenv('OWM_API_KEY');
            $this->owm = new OpenWeatherMap($this->api_key);
        }

        public function getWeather($city) {
            $response = $this->owm->getWeather($city, self::OWM_UNIT, self::OWM_LANG);

            $result = new \stdClass();
            $result->city = $city;
            $result->temperature = $response->temperature->now->getValue() . " " . html_entity_decode($response->temperature->now->getUnit());
            $result->wind_speed = $response->wind->speed->getValue() . " " . $response->wind->speed->getUnit();;

            return $result;
        }
    }