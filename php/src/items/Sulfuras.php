<?php

/**
 * Created by PhpStorm.
 * User: holdmann
 * Date: 12.06.16
 * Time: 18:20
 */
class Sulfuras {
    
    protected $_item = null;

    public function __construct(\Item $item)
    {
        $this->_item = $item;
    }

    public function update()
    {
        // do nothing with legendary item.
    }
}