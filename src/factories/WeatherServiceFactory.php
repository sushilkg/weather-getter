<?php

    namespace WeatherGetter\Factories;

    use WeatherGetter\Services\OWMService;

    class WeatherServiceFactory {

        public function getService($type) {
            if ($type === "OpenWeatherMap") {
                return new OWMService();
            }
        }
    }
