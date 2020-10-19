<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;
use isDayOff\Collections\FiltersCollection;
use isDayOff\Filters\CovidFilter;
use isDayOff\Filters\PreHolidayFilter;
use isDayOff\Filters\UkraineFilter;

$client = new IsDayOff();

/**
 * To filter data just add existing filter classes
 * in filters collection.
 */
$client->date()->filters()->add([
    new CovidFilter(),
    new PreHolidayFilter(),
    new UkraineFilter(),
]);

$date = new DateTime('now');
$result = $client->date()->isDayOff($date);

if($result)
{
    echo 'Выходной.';
}
else
{
    echo 'Рабочий день.';
}

/**
 * New filter collection
 */
$filters = new FiltersCollection();
$filters->addOne(new UkraineFilter());

$client->date()->setFilters($filters);
$date = new DateTime('2019/01/01');

$result = $client->date()->getDataPerMonth($date);

print_r($result);
