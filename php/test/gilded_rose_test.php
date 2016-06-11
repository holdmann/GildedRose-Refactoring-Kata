<?php

require_once 'gilded_rose.php';

class GildedRoseTest extends PHPUnit_Framework_TestCase {

    /**
     * @var string Folder that contents fixtures data.
     */
    protected $fixturesFolder = 'fixtures';

    /**
     * Testing of Default item.
     */
    function testDefaultItem()
    {
        $fixturesFilename = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/default-item.json');
        $fixtures = json_decode($fixturesFilename);

        foreach($fixtures as $id=>$fixture) {
            $items = [
                new Item("Any default item", $fixture->properties->sellIn, $fixture->properties->quality)
            ];
            $gildedRose = new GildedRose($items);

            for($i = 0; $i<count($fixture->items); $i++) {
                $this->assertEquals(
                    $fixture->items[$i]->sellIn, 
                    $items[0]->sellIn
                );

                $this->assertEquals(
                    $fixture->items[$i]->quality,
                    $items[0]->quality
                );
                $gildedRose->updateQuality();
            }
        }
    }

    /**
     * Testing of Aged Brie item.
     */
    function testAgedBrie()
    {
        $fixturesFilename = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/aged-brie.json');
        $fixtures = json_decode($fixturesFilename);

        foreach($fixtures as $id=>$fixture) {
            $items = [
                new Item("Aged Brie", $fixture->properties->sellIn, $fixture->properties->quality)
            ];
            $gildedRose = new GildedRose($items);

            for($i = 0; $i<count($fixture->items); $i++) {
                $this->assertEquals(
                    $fixture->items[$i]->sellIn,
                    $items[0]->sellIn
                );
                $this->assertEquals(
                    $fixture->items[$i]->quality,
                    $items[0]->quality
                );
                $gildedRose->updateQuality();
            }
        }
    }

    /**
     * Testing of Backstage passes to a TAFKAL80ETC concert item.
     */
    function testTAFKAL80ETCConcertBackstagePasses()
    {
        $fixturesFilename = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/backstage-passes.json');
        $fixtures = json_decode($fixturesFilename);

        foreach($fixtures as $id=>$fixture) {
            $items = [
                new Item("Backstage passes to a TAFKAL80ETC concert", $fixture->properties->sellIn, $fixture->properties->quality)
            ];
            $gildedRose = new GildedRose($items);

            for($i = 0; $i<count($fixture->items); $i++) {
                $this->assertEquals(
                    $fixture->items[$i]->sellIn,
                    $items[0]->sellIn
                );
                $this->assertEquals(
                    $fixture->items[$i]->quality,
                    $items[0]->quality
                );
                $gildedRose->updateQuality();
            }
        }
    }
}
