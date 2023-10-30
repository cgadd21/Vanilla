<?php $currentPage = "Weather"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<body>

    <div class="container">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <?php

            include('../weatherConn.php');

            $arr = json_decode($response, true);

            switch (json_last_error())
            {
                case JSON_ERROR_NONE:
                    print_recursive($arr);
                break;
                case JSON_ERROR_DEPTH:
                    echo ' - Maximum stack depth exceeded';
                break;
                case JSON_ERROR_STATE_MISMATCH:
                    echo ' - Underflow or the modes mismatch';
                break;
                case JSON_ERROR_CTRL_CHAR:
                    echo ' - Unexpected control character found';
                break;
                case JSON_ERROR_SYNTAX:
                    echo ' - Syntax error, malformed JSON';
                break;
                case JSON_ERROR_UTF8:
                    echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
                default:
                    echo ' - Unknown error';
                break;
            }

            function print_recursive($arr)
            {
                foreach ($arr as $key => $val)
                {
                    if (is_array($val))
                    {
                        echo '<div class="fade-in">';
                        print_recursive($val);
                        echo '</div>';
                    } 
                    elseif($key == 'stationID') 
                    {
                        echo (("<p>StationID = $val</p>"));
                    } 
                    elseif($key == 'obsTimeLocal') 
                    {
                        $date = date_create($val);
                        echo "<p>Local Time = ".date_format($date, "m/d/Y @ G:i:s")."<p>";
                    } 
                    elseif ($key == 'neighborhood')
                    {
                        echo (("<p>Neighborhood = $val</p>"));
                    } 
                    elseif ($key == 'country')
                    {
                        echo (("<p>Country = $val</p>"));
                    } 
                    elseif ($key == 'winddir')
                    {
                        $direction = $val / 22.5 + 0.5;
                        $cardinal_array = ["N", "NNE", "NE", "ENE", "E", "ESE", "SE", "SSE", "S", "SSW", "SW", "WSW", "W", "WNW", "NW", "NNW"];
                        $wind_cardinal = $cardinal_array[($direction % 16)];
                        echo("<p>Wind Direction = $wind_cardinal</p>");
                    } 
                    elseif ($key == 'humidity')
                    {
                        echo (("<p>Humidity = <b>$val%</b></p>"));
                    } 
                    elseif ($key == 'temp') {
                        $val = number_format($val, 1);
                        $colors = [
                            0 => 'Indigo',
                            10 => 'DarkBlue',
                            20 => 'DodgerBlue',
                            30 => 'LightSkyBlue',
                            35 => 'Cyan',
                            40 => 'MediumAquaMarine',
                            45 => 'SpringGreen',
                            50 => 'GreenYellow',
                            55 => 'Yellow',
                            60 => 'Gold',
                            70 => 'Orange',
                            80 => 'DarkOrange',
                            90 => 'Red',
                        ];
                    
                        foreach ($colors as $threshold => $color) {
                            if ($val <= $threshold) {
                                echo "<p>Temperature = <b style='color: $color;'>$val&deg;F</b></p>";
                                break;
                            }
                        }
                    }
                    elseif ($key == 'heatIndex')
                    {
                        $val = number_format($val, 1);
                        echo ("<p>Feels Like = <b>$val&deg;F</b></p>");
                    } 
                    elseif ($key == 'dewpt')
                    {
                        $val = number_format($val, 1);
                        echo ("<p>Dew Point = <b>$val&deg;F</b></p>");
                    } 
                    elseif ($key == 'windChill')
                    {
                        echo ("<p>Wind Chill = <b>$val&deg;F</b></p>");
                    } 
                    elseif ($key == 'windSpeed')
                    {
                        $val = number_format($val, 1);
                        echo ("<p>Wind Speed = <b>$val</b> mph</p>");
                    } 
                    elseif ($key == 'windGust')
                    {
                        $val = number_format($val, 1);
                        echo ("<p>Wind Gust = <b>$val</b> mph</p>");
                    } 
                    elseif ($key == 'pressure')
                    {
                        $val = number_format($val, 2);
                        echo ("<p>Pressure = <b>$val</b> in</p>");
                    } 
                    elseif ($key == 'precipRate')
                    {
                        $val = number_format($val, 2);
                        echo ("<p>Precipitation Rate = <b>$val</b> in</p>");
                    } 
                    elseif ($key == 'precipTotal')
                    {
                        $val = number_format($val, 2);
                        echo ("<p>Precipition Total = <b>$val</b> in</p>");
                    }
                }
                return;
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