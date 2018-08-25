<?php

    namespace WeatherGetter;

    class WeatherServiceFactory {

        public function getService($type) {
            if ($type === "OpenWeatherMap") {
                return new OWMService();
            }
        }
    }
