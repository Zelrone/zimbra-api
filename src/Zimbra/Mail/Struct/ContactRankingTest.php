<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Mail\Struct;

/**
 * ContactRankingTest class
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Struct
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class ContactRankingTest extends FilterTest
{
    /**
     * Constructor method for ContactRankingTest
     * @param int $index Index - specifies a guaranteed order for the test elements
     * @param string $header Header name
     * @param bool $negative Specifies a "not" condition for the test
     * @return self
     */
    public function __construct(
        $index, $header, $negative = null
    )
    {
        parent::__construct($index, $negative);
        $this->setProperty('header', trim($header));
    }

    /**
     * Gets header name
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->getProperty('header');
    }

    /**
     * Sets header name
     *
     * @param  string $header
     * @return self
     */
    public function setHeader($header)
    {
        return $this->setProperty('header', trim($header));
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray($name = 'contactRankingTest')
    {
        return parent::toArray($name);
    }

    /**
     * Method returning the xml representative this class
     *
     * @return SimpleXML
     */
    public function toXml($name = 'contactRankingTest')
    {
        return parent::toXml($name);
    }
}
