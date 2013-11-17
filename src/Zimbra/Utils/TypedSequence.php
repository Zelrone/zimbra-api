<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Utils;

use PhpCollection\Sequence;

/**
 * TypedSequence class
 * @package   Zimbra
 * @category  Utils
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by iWay Vietnam. (http://www.iwayvietnam.com)
 */
class TypedSequence extends Sequence
{
    /**
     * Class type
     * @var string
     */
    private $_type;

    /**
     * Constructor method for TypedSequence
     * @param string $type class type
     * @param array $elements
     * @return self
     */
    public function __construct($type, array $elements = array())
    {
        $this->_type = $type;
        $this->addAll($elements);
    }

    /**
     * Appends an element at the end of the sequence.
     * @param mixed $element new element
     * @return self
     */
    public function add($element)
    {
        if($element instanceof $this->_type)
        {
            parent::add($element);
        }
        else
        {
            throw new \UnexpectedValueException(
                "TypedSequence<$this->_type> can only hold objects of $this->_type class."
            );
        }
        return $this;
    }

    /**
     * Appends elements at the end of the sequence.
     * @param array $elements
     * @return self
     */
    public function addAll(array $elements)
    {
        foreach ($elements as $element)
        {
            $this->add($element);
        }
        return $this;
    }

    /**
     * Updates the element at the given index (0-based).
     *
     * @param integer $index
     * @param T $value
     */
    public function update($index, $value)
    {
        if ( ! isset($this->elements[$index]))
        {
            throw new \InvalidArgumentException(
                sprintf('There is no element at index "%d".', $index)
            );
        }
        if($value instanceof $this->_type)
        {
            $this->elements[$index] = $value;
        }
        return $this;
    }
}