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
 * @package    Zend
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Zend_AllTests::main');
}

/**
 * @category   Zend
 * @package    Zend
 * @subpackage UnitTests
 * @group      Zend
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_AllTests
{
    public static function main()
    {
        // Run buffered tests as a separate suite first
        ob_start();
        PHPUnit_TextUI_TestRunner::run(self::suiteBuffered());
        if (ob_get_level()) {
            ob_end_flush();
        }

        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    /**
     * Buffered test suites
     *
     * These tests require no output be sent prior to running as they rely
     * on internal PHP functions.
     *
     * @return PHPUnit_Framework_TestSuite
     */
    public static function suiteBuffered()
    {
        $suite = new PHPUnit_Framework_TestSuite('Zend Framework - Zend - Buffered Test Suites');

        // These tests require no output be sent prior to running as they rely
        // on internal PHP functions
        $suite->addTest(Zend_Session_AllTests::suite());
        $suite->addTest(Zend_Soap_AllTests::suite());

        return $suite;
    }

    /**
     * Regular suite
     *
     * All tests except those that require output buffering.
     *
     * @return PHPUnit_Framework_TestSuite
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Zend Framework - Zend');

        // Running this early to ensure that the test suite hasn't used too
        // much memory by the time it gets to this test.
        $suite->addTest(Zend_Memory_AllTests::suite());

        // Start remaining tests...
        $suite->addTestSuite('Zend_Acl_AclTest');
        $suite->addTest(Zend_Application_AllTests::suite());
        $suite->addTestSuite('Zend_AuthTest');
        $suite->addTest(Zend_Auth_AllTests::suite());
        $suite->addTest(Zend_Barcode_AllTests::suite());
        $suite->addTest(Zend_Cache_AllTests::suite());
        $suite->addTest(Zend_Captcha_AllTests::suite());
        $suite->addTestSuite('Zend_ConfigTest');
        $suite->addTest(Zend_Config_AllTests::suite());
        $suite->addTestSuite('Zend_Console_GetoptTest');
        $suite->addTest(Zend_Controller_AllTests::suite());
        $suite->addTestSuite('Zend_CurrencyTest');
        $suite->addTestSuite('Zend_DateTest');
        $suite->addTest(Zend_Date_AllTests::suite());
        $suite->addTest(Zend_Db_AllTests::suite());
        $suite->addTestSuite('Zend_DebugTest');
        $suite->addTest(Zend_Dom_AllTests::suite());
        $suite->addTest(Zend_Stdlib_AllTests::suite());
        $suite->addTestSuite('Zend_ExceptionTest');
        $suite->addTest(Zend_Feed_AllTests::suite());
        $suite->addTest(Zend_File_AllTests::suite());
        $suite->addTestSuite('Zend_FilterTest');
        $suite->addTest(Zend_Filter_AllTests::suite());
        $suite->addTest(Zend_Form_AllTests::suite());
        $suite->addTest(Zend_Http_AllTests::suite());
        $suite->addTestSuite('Zend_JsonTest');
        $suite->addTest(Zend_Json_AllTests::suite());
        $suite->addTest(Zend_Layout_AllTests::suite());
        $suite->addTest(Zend_Ldap_AllTests::suite());
        $suite->addTestSuite('Zend_LoaderTest');
        $suite->addTest(Zend_Loader_AllTests::suite());
        $suite->addTestSuite('Zend_LocaleTest');
        $suite->addTest(Zend_Locale_AllTests::suite());
        $suite->addTest(Zend_Log_AllTests::suite());
        $suite->addTest(Zend_Mail_AllTests::suite());
        $suite->addTest(Zend_Measure_AllTests::suite());
        $suite->addTestSuite('Zend_MimeTest');
        $suite->addTest(Zend_Mime_AllTests::suite());
        $suite->addTestSuite('Zend_NavigationTest');
        $suite->addTest(Zend_Navigation_AllTests::suite());
        $suite->addTest(Zend_Paginator_AllTests::suite());
        $suite->addTestSuite('Zend_PdfTest');
        $suite->addTest(Zend_Pdf_AllTests::suite());
        $suite->addTestSuite('Zend_RegistryTest');
        $suite->addTest(Zend_Search_Lucene_AllTests::suite());
        $suite->addTest(Zend_Serializer_AllTests::suite());
        $suite->addTest(Zend_Server_AllTests::suite());
        $suite->addTest(Zend_Tag_AllTests::suite());
        $suite->addTest(Zend_Test_AllTests::suite());
        $suite->addTest(Zend_Text_AllTests::suite());
        $suite->addTestSuite('Zend_TranslateTest');
        $suite->addTest(Zend_Translate_Adapter_AllTests::suite());
        $suite->addTestSuite('Zend_UriTest');
        $suite->addTest(Zend_Uri_AllTests::suite());
        $suite->addTestSuite('Zend_ValidateTest');
        $suite->addTest(Zend_Validate_AllTests::suite());
        $suite->addTestSuite('Zend_ViewTest');
        $suite->addTest(Zend_View_AllTests::suite());
        $suite->addTestSuite('Zend_VersionTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Zend_AllTests::main') {
    Zend_AllTests::main();
}
