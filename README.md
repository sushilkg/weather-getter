#Weather Getter
This is a tiny CLI application that gives you the weather in your current city or the city that you specify.

Setup
=====
- Git clone this repo
- Run `composer install` inside the project root
- Make the `wg` file executable by `sudo chmod +x wg`
- Grab API keys by signing up from `https://openweathermap.org/`
 and `https://ipstack.com/` and place it under `.env` files

Usage
=====
- You can run `./wg weather:current` to get the current weather in your city.
- You can also specify which city to get the weather for: `./wg weather:current Kathmandu`

To access this project from anywhere, make sure that the `wg` file in included in the `$PATH`.  

Tools Used
==========
This project makes use of `symfony/console` and `cmfcmf/openweathermap-php-api` and `icanhazip`.

Licence
=======
Do whatever you want - just don't misuse the IP and Weather services.