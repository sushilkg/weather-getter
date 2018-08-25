#Weather Getter
This is a tiny CLI application that gives you the weather in your current city or the city that you specify.

Setup
=====
- Git clone this repo
- Run `composer install` inside the project root
- Make the `wg` file executable by `sudo chmod +x wg`
 - Copy `.env_sample` file and create a new file named `.env` 
- Grab APIs from `https://openweathermap.org/`
 and `https://ipstack.com/` put them on `.env` file. 

Usage
=====
- You can run `./wg weather:current` to get the current weather in your city.
- You can also specify which city to get the weather for: `./wg weather:current Kathmandu`

To access this project from anywhere, add the project root `wg` to the `$PATH` variable.  

Tools Used
==========
This project makes use of `symfony/console` and `cmfcmf/openweathermap-php-api` and `icanhazip`.

Licence
=======
Do whatever you want - just don't misuse the IP and Weather services.