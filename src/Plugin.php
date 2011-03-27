<?php
namespace aura\view;
abstract class Plugin
{
    /**
     * 
     * Parameters for escaping.
     * 
     * @var array
     * 
     */
    protected $escape_charset = 'UTF-8';
    
    protected $escape_quotes = ENT_COMPAT;
    
    abstract public function __invoke();
    
    public function setEscapeQuotes($quotes)
    {
        $this->escape_quotes = $quotes;
    }
    
    public function setEscapeCharset($charset)
    {
        $this->escape_charset = $charset;
    }
    
    /**
     * 
     * Escapes output.
     * 
     * @param scalar $value The value to escape.
     * 
     * @return string The escaped value.
     * 
     */
    public function escape($value)
    {
        return htmlspecialchars(
            $value,
            $this->escape_quotes,
            $this->escape_charset
        );
    }
    
    /**
     * 
     * Converts an associative array to an attribute string.
     * 
     * @param array $attribs From this array, each key-value pair is 
     * converted to an attribute name and value.
     * 
     * @return string The HTML for the attributes.
     * 
     */
    public function attribs(array $attribs)
    {
        $html = '';
        foreach ($attribs as $key => $val) {
            
            // space-separate multiple values
            if (is_array($val)) {
                $val = implode(' ', $val);
            }
            
            // skip empty values; use a string cast and strict equality to 
            // make sure that a string zero is not counted as an empty value.
            if ((string) $val === '') {
                continue;
            }
            
            // add to the attributes
            $html .= ' ' . $this->escape($key)
                   .  '="' . $this->escape($val) . '"';
        }
        
        // done
        return $html;
    }
}
