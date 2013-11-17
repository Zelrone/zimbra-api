<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Account\Request;

use Zimbra\Soap\Request;
use Zimbra\Soap\Struct\Pref;
use Zimbra\Utils\TypedSequence;

/**
 * ModifyPrefs class
 * Modify Preferences
 *
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class ModifyPrefs extends Request
{
    /**
     * Specify the preferences to be modified
     * @var array
     */
    private $_prefs = array();

    /**
     * Constructor method for modifyIdentity
     * @param array $prefs
     * @return self
     */
    public function __construct(array $prefs = array())
    {
        parent::__construct();
        $this->_prefs = new TypedSequence('Zimbra\Soap\Struct\Pref', $prefs);
    }

    /**
     * Add a pref
     *
     * @param  Pref $pref
     * @return self
     */
    public function addPref(Pref $pref)
    {
        $this->_prefs->add($pref);
        return $this;
    }

    /**
     * Gets pref Sequence
     *
     * @return Sequence
     */
    public function prefs()
    {
        return $this->_prefs;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        if(count($this->_prefs))
        {
            $this->array['pref'] = array();
            foreach ($this->_prefs as $pref)
            {
                $prefArr = $pref->toArray();
                $this->array['pref'][] = $prefArr['pref'];
            }
        }
        return parent::toArray();
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        foreach ($this->_prefs as $pref)
        {
            $this->xml->append($pref->toXml());
        }
        return parent::toXml();
    }
}