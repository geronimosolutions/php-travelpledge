<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\BaseModel
 *
 * @author Woody Whitman <woody@handbid.com>
 * 
 * @property mixed $attributes
 */

abstract class BaseModel
{
    private $_attributes;

    /**
     * Constructor.
     * The default implementation does two things:
     *
     * - Initializes the object with the given configuration `$aConfig`.
     * - Call [[init()]].
     *
     * If this method is overridden in a child class, it is recommended that
     *
     * - the last parameter of the constructor is a configuration array, like `$aConfig` here.
     * - call the parent implementation at the end of the constructor.
     *
     * @param array $aConfig name-value pairs that will be used to initialize the object properties
     */
    public function __construct($aConfig)
    {
        foreach ($aConfig as $key => $value) {
           $this->$key = $value;
        }
    }

    /**
     * Returns the value of a component property.
     * This method will check in the following order and act accordingly:
     *
     *  - a property defined by a getter: return the getter result
     *  - a property of a behavior: return the behavior property value
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `$value = $component->property;`.
     * @param string $name the property name
     * @return mixed the property value or the value of a behavior's property
     * @see __set()
     */
    public function __get($attribute)
    {
        if ($attribute == 'attributes') {
            return $this->getAttributes();
        } elseif (isset($this->_attributes[$attribute])) {
            return $this->_attributes[$attribute];
        }
        return null;
    }

    /**
     * Sets the value of a component property.
     * This method will check in the following order and act accordingly:
     *
     *  - a property defined by a setter: set the property value
     *  - an event in the format of "on xyz": attach the handler to the event "xyz"
     *  - a behavior in the format of "as xyz": attach the behavior named as "xyz"
     *  - a property of a behavior: set the behavior property value
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `$component->property = $value;`.
     * @param string $name the property name or the event name
     * @param mixed $value the property value
     * @see __get()
     */
    public function __set($attribute,$value)
    {
        if ($attribute == 'attributes') {
            return $this->setAttributes($value);
        }
        $this->_attributes[$attribute] = $value;

        return $this->_attributes[$attribute];
    }
    
    public function getAttributes() {
        return $this->_attributes;
    }
    
    public function setAttributes($attributes) {
        
        $this->_attributes = $attributes;
        
        return $this->_attributes;
    }
}
