<?php
namespace Aura\Web\Request;

class Headers
{
    protected $data = array();
    
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
    }
    
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