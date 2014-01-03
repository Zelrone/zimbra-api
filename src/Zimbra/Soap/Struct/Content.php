<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Struct;

use Zimbra\Utils\SimpleXML;

/**
 * Content struct class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class Content
{
    /**
     * Inlined content data.
     * Ignored if "aid" is specified
     * @var string
     */
    private $_value;

    /**
     * AttachmentAttachment upload ID of uploaded object to use
     * @var string
     */
    private $_aid;

    /**
     * Constructor method for AccountACEInfo
     * @param string $value
     * @param string $aid
     * @return self
     */
    public function __construct(
        $value = null,
        $aid = null
    )
    {
        $this->_value = trim($value);
        $this->_aid = trim($aid);
    }

    /**
     * Gets or sets value
     *
     * @param  string $value
     * @return string|self
     */
    public function value($value = null)
    {
        if(null === $value)
        {
            return $this->_value;
        }
        $this->_value = trim($value);
        return $this;
    }

    /**
     * Gets or sets aid
     *
     * @param  string $aid
     * @return string|self
     */
    public function aid($aid = null)
    {
        if(null === $aid)
        {
            return $this->_aid;
        }
        $this->_aid = trim($aid);
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'content')
    {
        $name = !empty($name) ? $name : 'content';
        $arr = array(
            '_' => $this->_value,
        );
        if(!empty($this->_aid))
        {
            $arr['aid'] = $this->_aid;
        }

        return array($name => $arr);
    }

    /**
     * Method returning the xml representative this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'content')
    {
        $name = !empty($name) ? $name : 'content';
        $xml = new SimpleXML('<'.$name.'>'.$this->_value.'</'.$name.'>');
        if(!empty($this->_aid))
        {
            $xml->addAttribute('aid', $this->_aid);
        }
        return $xml;
    }

    /**
     * Method returning the xml string representative this class
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toXml()->asXml();
    }
}
