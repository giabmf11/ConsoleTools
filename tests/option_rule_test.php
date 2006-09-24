<?php
/**
 * ezcConsoleToolsOptionRuleTest
 * 
 * @package ConsoleTools
 * @subpackage Tests
 * @version //autogentag//
 * @copyright Copyright (C) 2005, 2006 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Test suite for ezcConsoleOption class.
 * 
 * @package ConsoleTools
 * @subpackage Tests
 */
class ezcConsoleToolsOptionRuleTest extends ezcTestCase
{

	public static function suite()
	{
		return new ezcTestSuite( "ezcConsoleToolsOptionRuleTest" );
	}

    public function testGetAccessSuccess()
    {
        $option = new ezcConsoleOption( "a", "aaa" );
        $rule = new ezcConsoleOptionRule( $option, array( "a", "b", "c" ) );

        $this->assertSame( $option, $rule->option );
        $this->assertEquals( array( "a", "b", "c" ), $rule->values );
    }

    public function testGetAccessFailure()
    {
        $option = new ezcConsoleOption( "a", "aaa" );
        $rule = new ezcConsoleOptionRule( $option, array( "a", "b", "c" ) );

        try
        {
            $foo = $rule->nonExistent;
        }
        catch ( ezcBasePropertyNotFoundException $e )
        {
            return true;
        }
        $this->fail( "Exception not thrown on access of invalid property." );
    }
    
    public function testSetAccessSuccess()
    {
        $option = new ezcConsoleOption( "a", "aaa" );
        $rule = new ezcConsoleOptionRule( $option, array( "a" ) );

        $rule->option = $option;
        $rule->values = array( "a", "b", "c" );

        $this->assertSame( $option, $rule->option );
        $this->assertEquals( array( "a", "b", "c" ), $rule->values );
    }

    public function testSetAccessFailureOption()
    {
        $option = new ezcConsoleOption( "a", "aaa" );
        $rule = new ezcConsoleOptionRule( $option, array( "a" ) );

        try
        {
            $rule->option = array();
        }
        catch ( ezcBaseValueException $e )
        {
            return;
        }
        $this->fail( "Exception not thrown on invalid value for ezcConsoleOptionRule->option." );
    }

    public function testSetAccessFailureValues()
    {
        $option = new ezcConsoleOption( "a", "aaa" );
        $rule = new ezcConsoleOptionRule( $option, array( "a" ) );

        try
        {
            $rule->values = 23;
        }
        catch ( ezcBaseValueException $e )
        {
            return;
        }
        $this->fail( "Exception not thrown on invalid value for ezcConsoleOptionRule->values." );
    }

    public function testSetAccessFailureNonExsitent()
    {
        $option = new ezcConsoleOption( "a", "aaa" );
        $rule = new ezcConsoleOptionRule( $option, array( "a" ) );

        try
        {
            $rule->values = 23;
        }
        catch ( ezcBaseValueException $e )
        {
            return;
        }
        $this->fail( "Exception not thrown on invalid value for ezcConsoleOptionRule->values." );
    }
}

?>