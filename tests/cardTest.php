<?php

/**
* required files and classes.
*/	
require_once("../card.php");

class cardTest {

	public function __construct() {
		$this->testValidCardCreation();
		$this->testInvalidValueDetected();
		$this->testInvalidSuitDetected();
		$this->testInvalidStateDetected();
		$this->testCardDisplay();
	}

	public function testValidCardCreation() {
    	$input = "new Card( 1, 2, 'ND');";
    	$expected = "Two of Clubs in Not-Yet-Dealt state.\r\n";
    	$card = new Card( 1, 2, 'ND');
    	$outcome = $card->display();

    	if($outcome == $expected)
    		$status = "success";
    	else 
    		$status = "failed";

    	$this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
	}

	public function testInvalidValueDetected()
    {
    	$input = "new Card( 1, 62, 'ND');";
    	$expected = "invalid card value";
    	try {
    		$card = new Card( 1, 62, 'ND');
    	} catch (Exception $e) {
    		$outcome = $e->getMessage();
		}

    	if($outcome == $expected)
    		$status = "success";
    	else 
    		$status = "failed";

    	$this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testInvalidSuitDetected()
    {
    	$input = "new Card( 5, 2, 'ND');";
    	$expected = "invalid card suit";
    	try {
    		$card = new Card( 5, 2, 'ND');
    	} catch (Exception $e) {
    		$outcome = $e->getMessage();
		}

    	if($outcome == $expected)
    		$status = "success";
    	else 
    		$status = "failed";

    	$this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testInvalidStateDetected()
    {
    	$input = "new Card( 1, 2, 'AD');";
    	$expected = "invalid card state";
    	try {
    		$card = new Card( 1, 2, 'AD');
    	} catch (Exception $e) {
    		$outcome = $e->getMessage();
		}

    	if($outcome == $expected)
    		$status = "success";
    	else 
    		$status = "failed";

    	$this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testCardDisplay()
    {
    	$input = "new Card( 1, 2, 'ND');";
    	$expected = "Two of Clubs in Not-Yet-Dealt state.\r\n";
    	$card = new Card( 1, 2, 'ND');
    	$outcome = $card->display();

    	if($outcome == $expected)
    		$status = "success";
    	else 
    		$status = "failed";

    	$this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function printResults( $func, $status, $input, $expected, $outcome) {

		echo  "\r\n\r\n\r\n" .
		  "FUNCTION : " . $func . "\r\n"
		. "STATUS : " . $status . "\r\n" 
		. "INPUT : " . $input . "\r\n"
		. "EXPECTED : " . $expected . "\r\n"
		. "OUTPUT : " . $outcome . "\r\n";
    }

}


$cardTest = new cardTest();