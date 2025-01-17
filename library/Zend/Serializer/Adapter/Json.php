<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Serializer
 * @subpackage Adapter
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/** @see Zend_Serializer_Adapter_AdapterAbstract */


/** @see Zend_Json */


/**
 * @category   Zend
 * @package    Zend_Serializer
 * @subpackage Adapter
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Serializer_Adapter_Json extends Zend_Serializer_Adapter_AdapterAbstract
{
    /**
     * @var array Default options
     */
    protected $_options = array(
        'cycleCheck'           => false,
        'enableJsonExprFinder' => false,
        'objectDecodeType'     => Zend_Json::TYPE_ARRAY,
    );

    /**
     * Serialize PHP value to JSON
     *
     * @param  mixed $value
     * @param  array $opts
     * @return string
     * @throws Zend_Serializer_Exception on JSON encoding exception
     */
    public function serialize($value, array $opts = array())
    {
        $opts = $opts + $this->_options;

        try  {
            return Zend_Json::encode($value, $opts['cycleCheck'], $opts);
        } catch (Exception $e) {

            throw new Zend_Serializer_Exception('Serialization failed', 0, $e);
        }
    }

    /**
     * Deserialize JSON to PHP value
     *
     * @param  string $json
     * @param  array $opts
     * @return mixed
     */
    public function unserialize($json, array $opts = array())
    {
        $opts = $opts + $this->_options;

        try {
            $ret = Zend_Json::decode($json, $opts['objectDecodeType']);
        } catch (Zend_Json_Exception $e) {

            throw new Zend_Serializer_Exception('Invalid json data');
        } catch (Exception $e) {

            throw new Zend_Serializer_Exception('Unserialization failed by previous error', 0, $e);
        }

        return $ret;
    }
}
