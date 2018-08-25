<?php

    namespace WeatherGetter;

    use Cmfcmf\OpenWeatherMap;
    use IPStack\PHP\GeoLookup;

    class WeatherGetter {

        CONST OWM_UNIT = "metric";
        CONST OWM_LANG = "en";
        private $owm_api_key;
        private $ipstack_api_key;


        public function __construct() {
            $this->owm_api_key = getenv('OWM_API_KEY');
            $this->ipstack_api_key = getenv('IPSTACK_API_KEY');

            try {
                $this->owm = new OpenWeatherMap($this->owm_api_key);
            } catch (\Exception $exception) {
                echo $exception->getMessage();
                die;
            }
        }

        public function get($city = false) {

            try {
                if (!$city) {
                    $city = $this->get_current_city();
                }

                $response = $this->owm->getWeather($city, self::OWM_UNIT, self::OWM_LANG);

                $result = new \stdClass();
                $result->city = $city;
                $result->temperature = $response->temperature->now->getValue() . " " . $response->temperature->now->getUnit();
                $result->wind_speed = $response->wind->speed->getValue() . " " . $response->wind->speed->getUnit();;

                return $result;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
                die;
            }
        }

        private function get_current_city() {
            $geoLookup = new GeoLookup($this->ipstack_api_key, false, 10);
            $my_ip = $this->get_my_ip();
            try {
                $location = $geoLookup->getLocationFor($my_ip);

                return $location->city;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
                die;
            }
        }

        private function get_my_ip() {
            try {
                $ch = curl_init("http://icanhazip.com/");
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $result = curl_exec($ch);
                curl_close($ch);

                if ($result === FALSE) {
                    throw new \Exception("IP couldn't be detected");
                }

                return trim($result);
            } catch (\Exception $exception) {
                echo "Error: " . $exception->getMessage();
                die;
            }
        }
    }