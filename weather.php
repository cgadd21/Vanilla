<?php $currentPage = "Weather"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<body>

    <div class="container">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <?php
            class WeatherData
            {
                public $stationID;
                public $obsTimeLocal;
                public $neighborhood;
                public $country;
                public $windDirection;
                public $humidity;
                public $temperature;
                public $heatIndex;
                public $dewPoint;
                public $windChill;
                public $windSpeed;
                public $windGust;
                public $pressure;
                public $precipitationRate;
                public $precipitationTotal;
            
                public function __construct($data)
                {
                    $observation = $data['observations'][0];
            
                    $this->stationID = $observation['stationID'];
                    $this->obsTimeLocal = date_format(date_create($observation['obsTimeLocal']), "m/d/Y @ G:i:s");
                    $this->neighborhood = $observation['neighborhood'];
                    $this->country = $observation['country'];
                    $this->windDirection = $this->calculateWindDirection($observation['winddir']);
                    $this->humidity = $observation['humidity'].'%';
                    $this->temperature = number_format($observation['imperial']['temp'], 1).'°F';
                    $this->heatIndex = number_format($observation['imperial']['heatIndex'], 1).'°F';
                    $this->dewPoint = number_format($observation['imperial']['dewpt'], 1).'°F';
                    $this->windChill = number_format($observation['imperial']['windChill'], 1).'°F';
                    $this->windSpeed = number_format($observation['imperial']['windSpeed'], 1).' mph';
                    $this->windGust = number_format($observation['imperial']['windGust'], 1).' mph';
                    $this->pressure = number_format($observation['imperial']['pressure'], 2).' in';
                    $this->precipitationRate = number_format($observation['imperial']['precipRate'], 2).' in'; 
                    $this->precipitationTotal = number_format($observation['imperial']['precipTotal'], 2).' in';
                }

                public function getColorForTemperature()
                {
                    $colors = [-30 => 'DarkViolet', -20 => 'Purple', -10 => 'BlueViolet', 0 => 'Indigo', 10 => 'DarkBlue', 20 => 'DodgerBlue', 30 => 'LightSkyBlue', 35 => 'Cyan', 40 => 'MediumAquaMarine', 45 => 'SpringGreen', 50 => 'GreenYellow', 55 => 'Yellow', 60 => 'Gold', 70 => 'Orange', 80 => 'DarkOrange', 90 => 'Red'];

                    foreach ($colors as $threshold => $color)
                    {
                        if ($this->temperature <= $threshold)
                        {
                            return $color;
                        }
                    }

                    return 'White';
                }
            
                private function calculateWindDirection($degree)
                {
                    $directions = ["N", "NNE", "NE", "ENE", "E", "ESE", "SE", "SSE", "S", "SSW", "SW", "WSW", "W", "WNW", "NW", "NNW"];
                    return $directions[round($degree / 22.5) % 16];
                }
            }
            
            include('../weatherConn.php');

            $arr = json_decode($response, true);

            switch (json_last_error()) 
            {
                case JSON_ERROR_NONE:
                    $weatherData = new WeatherData($arr);
                    echo '<div class="fade-in">';
                    echo "<p>StationID = $weatherData->stationID</p>";
                    echo "<p>Local Time = $weatherData->obsTimeLocal</p>";
                    echo "<p>Neighborhood = $weatherData->neighborhood</p>";
                    echo "<p>Country = $weatherData->country</p>";
                    echo "<p>Wind Direction = $weatherData->windDirection</p>";
                    echo "<p>Humidity = $weatherData->humidity</p>";
                    echo "<p>Temperature = <b style='color: ".$weatherData->getColorForTemperature() .";'>".$weatherData->temperature."</b></p>";
                    echo "<p>Heat Index = $weatherData->heatIndex</p>";
                    echo "<p>Dew Point = $weatherData->dewPoint</p>";
                    echo "<p>Wind Chill = $weatherData->windChill</p>";
                    echo "<p>Wind Speed = $weatherData->windSpeed</p>";
                    echo "<p>Wind Gust = $weatherData->windGust</p>";
                    echo "<p>Pressure = $weatherData->pressure</p>";
                    echo "<p>Precipitation Rate = $weatherData->precipitationRate</p>";
                    echo "<p>Precipitation Total = $weatherData->precipitationTotal</p>";
                    echo '</div>';
                    break;
                case JSON_ERROR_DEPTH:
                    echo "Maximum stack depth exceeded";
                    break;
                case JSON_ERROR_STATE_MISMATCH:
                    echo "Invalid or malformed JSON";
                    break;
                case JSON_ERROR_CTRL_CHAR:
                    echo "Control character error";
                    break;
                case JSON_ERROR_SYNTAX:
                    echo "Syntax error";
                    break;
                case JSON_ERROR_UTF8:
                    echo "Malformed UTF-8 characters";
                    break;
                default:
                    echo "Unknown error";
                    break;
            }
        ?>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>

    <script>
        setTimeout(function () { window.location.reload(); }, 7*60*1000);
    </script>

</body>
</html>