Weather Getter
=============
This is a tiny CLI application that gives you the weather in your current city or the city that you specify. It also demonstrates a basic implementation of Factory Design Pattern.

Setup
=====
- Git clone this repo
- Run `composer install` inside the project root
- Make the `wg` file executable by `sudo chmod +x wg`
- Copy `.env.example` file and create a new file named `.env` 
- Grab APIs from `https://openweathermap.org/`
 and `https://ipstack.com/` put them on `.env` file. 

Usage
=====
- You can run `./wg weather:current` to get the current weather in your city.
- You can also specify which city to get the weather for: `./wg weather:current Kathmandu`

To access this project from anywhere, add the project root folder to the `$PATH` variable.

Licence
=======
Do whatever you want - just don't misuse the IP and Weather services.
