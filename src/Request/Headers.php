<?php
/**
 * 
 * This file is part of Aura for PHP.
 * 
 * @package Aura.Web
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Web\Request;

class Headers
{
    /**
     * 
     * @var array
     * 
     */
    protected $data = array();
    
    /**
     * 
     * Constructor
     * 
     * @param array $server Server values
     * 
     */
    public function __construct(array $server)
    {
        foreach ($server as $label => $value) {
            if (substr($label, 0, 5) == 'HTTP_') {
                // remove the HTTP_* prefix and normalize to lowercase
                $label = strtolower(substr($label, 5));
                // convert underscores to dashes
                $label = str_replace('_', '-', strtolower($label));
                // retain the header label and value
                $this->data[$label] = $value;
            }
        }
        
        // further sanitize headers to remove HTTP_X_JSON headers
        unset($this->data['HTTP_X_JSON']);
    }

    /**
     * 
     * Returns the value of a particular header, 
     * or an alternative value if the key is not present. 
     * 
     * @param string $key
     * 
     * @param string $alt
     * 
     */
    public function get($key = null, $alt = null)
    {
        if (! $key) {
            return $this->data;
        }
        
        $key = strtolower($key);
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        
        return $alt;
    }
}
