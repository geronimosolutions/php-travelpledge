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
    const REMOTE_IMAGE_PATH = '/UploadFiles/';
    const REMOTE_IMAGE_HOST = 'www.geronimo.com';
    const DEFAULT_IMAGE = null;
    const ADDRESS_FORMAT = "%s, %s"; // ""%s, %s<br> %s";
    
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
        $getter = 'get' . $attribute;
        if (method_exists($this, $getter)) {
            // read property, e.g. getName()
            return $this->$getter();
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
        $setter = 'set' . $attribute;
        if (method_exists($this, $setter)) {
            // set property
            $this->$setter($value);

            return $value;
        }
        $this->_attributes[$attribute] = $value;

        return $this->_attributes[$attribute];
    }
    
    /**
     * Returns attribute values.
     * @return mixed[]
     */
    public function getAttributes() {
        return $this->_attributes;
    }
    
    /**
     * Sets attribute values.
     * @param mixed[]
     * @return mixed[]
     */
    public function setAttributes($attributes) {
        
        $this->_attributes = $attributes;
        
        return $this->_attributes;
    }

    /**
     * Find out if a remote image file exists
     * @param string $modelImageLocation url
     * @return boolean
     */
    public static function remoteImageExists($modelImageLocation)
    {
        try {
            $ch = curl_init($modelImageLocation);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_exec($ch);
            $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // $retcode >= 400 -> not found, $retcode = 200, found.
            curl_close($ch);
        } catch (\Exception $ex) {
            $error = json_encode([
                $ex->getMessage(),
                $ex->getTraceAsString()
            ]);
        }
        if (empty($retcode)) {
            $retcode = 500;
        }
        if ($retcode >= 200 && $retcode < 400) {
            return true;
        }
        return false;
    }
}
