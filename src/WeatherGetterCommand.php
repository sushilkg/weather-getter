<?php

    namespace WeatherGetter;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Formatter\OutputFormatterStyle;

    use WeatherGetter\WeatherGetter;

    class WeatherGetterCommand extends Command {

        protected function configure() {
            $this->setName("weather:current")
                ->setDescription("Get's current weather (based on IP)")
                ->addArgument('city', InputArgument::OPTIONAL, 'City that you can optionally specify to get weather of that city');
        }

        protected function execute(InputInterface $input, OutputInterface $output) {

            $weatherGetter = new WeatherGetter();
            $city = $input->getArgument('city');

            try {
                $result = $weatherGetter->get($city);
                $output->writeln('Weather of ' . $result->city);
                $output->writeln('Temperature: ' . $result->temperature);
                $output->writeln('Wind speed: ' . $result->wind_speed);
            } catch (\Exception $e) {
                $output->writeln('Couldn\'t get the weather. Pleas make sure the city name is correct or try again.');
                $output->write('Error: '. $e->getMessage());
            }
        }

    }