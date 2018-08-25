<?php

    namespace WeatherGetter;

    class WeatherGetter {

        public function get($city = false) {
            $result = new \stdClass();

            $result->city = $city ?: " current city";
            $result->temperature = "28 C";
            $result->wind_speed = "5 KM/H";

            return $result;
        }
    }