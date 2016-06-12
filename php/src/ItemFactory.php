<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 17:50
 */
class ItemFactory {

    protected static $_defaultItemClass = 'Default';

    protected static $_mappingClasses = [
        'Aged Brie' => 'AgedBrie',
        'Sulfuras, Hand of Ragnaros' => 'Sulfaras',
        'Backstage passes to a TAFKAL80ETC concert' => 'BackstagePass',
        'Conjured Mana Cake' => 'ConjuredManaCake',
    ];

    public static function model(\Item $item)
    {
        if(isset(self::$_mappingClasses[$item->name]))
            $class =  self::$_mappingClasses[$item->name];
        else
            $class = self::$_defaultItemClass;
        
        return new $class($item);
    }
}