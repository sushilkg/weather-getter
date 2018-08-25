<?php

    namespace WeatherGetter;

    interface WeatherServiceInterface {

        public function getWeather($city);
    }