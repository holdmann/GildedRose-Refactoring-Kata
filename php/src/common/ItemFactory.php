<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 17:50
 */
class ItemFactory {

    /**
     * @var string Default Item Mapping class used if there is no specific mapping class.
     */
    protected static $_defaultItemClass = 'DefaultItem';

    /**
     * @var array Holds Class names that routes according to Item name.
     */
    protected static $_mappingClasses = [
        'Aged Brie' => 'AgedBrie',
        'Sulfuras, Hand of Ragnaros' => 'Sulfuras',
        'Backstage passes to a TAFKAL80ETC concert' => 'BackstagePass',
        'Conjured Mana Cake' => 'ConjuredManaCake',
    ];

    /**
     * Class facroty that checks mappings 
     * and creates instance of BaseItem according to mappings.
     * 
     * @param Item $item original Item.
     * @return BaseItem new Item instance.
     */
    public static function model(\Item $item)
    {
        if(isset(self::$_mappingClasses[$item->name]))
            $class =  self::$_mappingClasses[$item->name];
        else
            $class = self::$_defaultItemClass;
        
        return new $class($item);
    }
}