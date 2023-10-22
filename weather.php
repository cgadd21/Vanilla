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
                        print_recursive($val);
                    } 
                    elseif($key == 'stationID') 
                    {
                        echo ucfirst(("$key = $val <br/>"));
                    } 
                    elseif($key == 'obsTimeLocal') 
                    {
                        $date = date_create($val);
                        echo "Local Time = " . date_format($date, "m/d/Y @ G:i:s") . "<br/>";
                    } 
                    elseif ($key == 'neighborhood')
                    {
                        echo ucfirst(("$key = $val <br/>"));
                    } 
                    elseif ($key == 'country')
                    {
                        echo ucfirst(("$key = $val <br/>"));
                    } 
                    elseif ($key == 'winddir')
                    {
                        echo("Wind Direction = <b>".get_wind_cardinal($val)."</b> <br/>");
                    } 
                    elseif ($key == 'humidity')
                    {
                        echo ucfirst(("$key = <b>$val%</b> <br/>"));
                    } 
                    elseif ($key == 'temp')
                    {
                        $val = number_format($val, 1);

                        if ($val < "0") 
                        {
                            echo "Temperature = " . "<font size='5' color='Indigo'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "0" && $val <= "10" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='DarkBlue'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "10" && $val <= "20" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='DodgerBlue'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "20" && $val <= "30" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='LightSkyBlue'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "30" && $val <= "35" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='Cyan'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "35" && $val <= "40" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='MediumAquaMarine'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "40" && $val <= "45" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='SpringGreen'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "45" && $val <= "50" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='GreenYellow'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "50" && $val <= "55" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='Yellow'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        }
                        elseif ($val > "55" && $val <= "60" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='Gold'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "60" && $val <= "70" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='Orange'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "70" && $val <= "80" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='DarkOrange'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "80" && $val <= "90" ) 
                        {
                            echo "Temperature = " . "<font size='5' color='Red'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        } 
                        elseif ($val > "90") 
                        {
                            echo "Temperature = " . "<font size='5' color='Crimson'>" . "<b>$val&deg;F</b>" . "</font>" . "<br/>" . "<br/>";
                        }
                    } 
                    elseif ($key == 'heatIndex')
                    {
                        $val = number_format($val, 1);
                        echo("Feels Like = <b>$val&deg;F</b> <br/>");
                    } 
                    elseif ($key == 'dewpt')
                    {
                        $val = number_format($val, 1);
                        echo("Dew Point = <b>$val&deg;F</b> <br/>");
                    } 
                    elseif ($key == 'windChill')
                    {
                        echo("Wind Chill = <b>$val&deg;F</b> <br/>");
                    } 
                    elseif ($key == 'windSpeed')
                    {
                        $val = number_format($val, 1);
                        echo("Wind Speed = <b>$val</b> mph <br/>");
                    } 
                    elseif ($key == 'windGust')
                    {
                        $val = number_format($val, 1);
                        echo("Wind Gust = <b>$val</b> mph <br/>");
                    } 
                    elseif ($key == 'pressure')
                    {
                        $val = number_format($val, 2);
                        echo("Pressure = <b>$val</b> in<br/>");
                    } 
                    elseif ($key == 'precipRate')
                    {
                        $val = number_format($val, 2);
                        echo("Precipitation Rate = <b>$val</b> in<br/>");
                    } 
                    elseif ($key == 'precipTotal')
                    {
                        $val = number_format($val, 2);
                        echo("Precipition Total = <b>$val</b> in<br/>");
                    }
                }
                return;
            }

            function get_wind_cardinal($val) 
            {
                $direction = $val / 22.5 + .5;
                $cardinal_array = [ "N","NNE","NE","ENE","E","ESE", "SE", "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW" ];
                return $cardinal_array[ ( $direction % 16 ) ];
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