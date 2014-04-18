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

use Aura\Web\Request\Accept\Charset;
use Aura\Web\Request\Accept\Encoding;
use Aura\Web\Request\Accept\Language;
use Aura\Web\Request\Accept\Media;

/**
 * 
 * A collection of `Accept*` objects.
 * 
 * @package Aura.Web
 *
 * @property-read Media $media The `Accept` values object.
 *
 * @property-read Charset $charset The `Accept-Charset` values object.
 *
 * @property-read Encoding $encoding The `Accept-Encoding` values object.
 *
 * @property-read Language $language The `Accept-Language` values object.
 *
 */
class Accept
{
    /**
     * 
     * The `Accept` values object.
     * 
     * @var Media
     * 
     */
    protected $media;
    
    /**
     * 
     * The `Accept-Charset` values object.
     *
     * @var Charset
     * 
     */
    protected $charset;
    
    /**
     * 
     * The `Accept-Encoding` values object.
     *
     * @var Encoding
     * 
     */
    protected $encoding;
    
    /**
     * 
     * The `Accept-Language` values object.
     *
     * @var Language
     * 
     */
    protected $language;

	/**
	 *
	 * Constructor.
	 *
	 * @param Accept\Charset $charset A charset object.
	 *
	 * @param Accept\Encoding $encoding An encoding object.
	 *
	 * @param Accept\Language $language A language object.
	 *
	 * @param Accept\Media $media A media object.
	 *
	 */
    public function __construct(
        Charset $charset,
        Encoding $encoding,
        Language $language,
        Media $media
    ) {
        $this->media    = $media;
        $this->charset  = $charset;
        $this->encoding = $encoding;
        $this->language = $language;
    }
    
    /**
     * 
     * Returns a values object by name.
     * 
     * @param string $key The values object name.
     * 
     * @return object The values object.
     * 
     */
    public function __get($key)
    {
        return $this->$key;
    }
}
