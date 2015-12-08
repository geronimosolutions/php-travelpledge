<?php
/**
 * @file
 * travelpledge\Exception class definition.
 *
 * @author (C) 2015 Woody Whitman (woody@handbid.com)
 */
namespace travelpledge\models;

use travelpledge\Exception;
/**
 * Abstract class: this is the superclass for all travelpledge sungletons
 * classes.
 *
 * This class is responsible for the connection travelpledge
 *
 */
abstract class Base
{
	protected $_attributes; /**< @type string[] Active environment. */

	/**
	 * Constructor.
	 *
	 * @param  mixed[] @type string Environment.
	 */
	public function __construct($attributes)
	{
            foreach ($attributes as $key => $value) {
               $this->_attributes[$key] = $value;
            }
	}
        
	public function __get($attribute)
	{
            if (isset($this->_attributes[$attribute])) {
                return $this->_attributes[$attribute];
            }
            return null;
	}
        
	public function __set($attribute,$value)
	{
            $this->_attributes[$attribute] = $value;
            
            return $this->_attributes[$attribute];
	}
}
