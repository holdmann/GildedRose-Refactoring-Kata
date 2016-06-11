<?php
/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 0:40
 */

require_once './../src/gilded_rose.php';

/**
 * @var int $daysCount Count of dates for items testing,
 * I use 100 because of maximum quality of product is 50, so range [-50, 50] should be ok.
 */
$daysCount = 100;

/**
 * @var array $items Array of similar items with different sellIn and quality values.
 */
$items = array(
    new Item('[item name]', 3, 6),
    new Item('[item name]', 0, 8),
    new Item('[item name]', -1, 20),
);

$app = new GildedRose($items);


/**
 * @var array $fixturesData Multidimensional array
 * that stores data for fixture generation.
 */
$fixturesData = array();

foreach ($items as $idx=>$item) {
    $fixturesData[$idx]['properties'] = [
        'sellIn' => $item->sellIn,
        'quality' => $item->quality,
    ];
}

for ($i = 0; $i < $daysCount; $i++) {
    foreach ($items as $idx=>$item) {
        $fixturesData[$idx]['items'][] = array(
            'sellIn' => $item->sellIn,
            'quality' => $item->quality,
        );
    }
    $app->updateQuality();
}

echo json_encode($fixturesData);