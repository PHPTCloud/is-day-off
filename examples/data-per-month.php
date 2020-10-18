<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();

$date = new DateTime('now');
$result = $client->date()->getDataPerMonth($date);

// print_r($result); // isDayOff\Collections\DaysCollection

echo '<table border="1">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>Дата</th>';
            echo '<th>Выходной</th>';
        echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
        foreach($result->all() as $day)
        {
            echo '<tr>';
                echo '<td>' . $day->getDate('d-m-Y') . '</td>';
                echo '<td>' . (int) $day->getStatus() . '</td>';
            echo '</tr>';
        }
    echo '</tbody>';    
echo '</table>';