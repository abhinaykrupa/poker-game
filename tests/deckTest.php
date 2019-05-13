<?php

/**
* required files and classes.
*/	
require_once("../deck.php");

class deckTest {

    public $expectedDeckDisplay = "Two of Clubs in Not-Yet-Dealt state.\r\nThree of Clubs in Not-Yet-Dealt state.\r\nFour of Clubs in Not-Yet-Dealt state.\r\nFive of Clubs in Not-Yet-Dealt state.\r\nSix of Clubs in Not-Yet-Dealt state.\r\nSeven of Clubs in Not-Yet-Dealt state.\r\nEight of Clubs in Not-Yet-Dealt state.\r\nNine of Clubs in Not-Yet-Dealt state.\r\nTen of Clubs in Not-Yet-Dealt state.\r\nJack of Clubs in Not-Yet-Dealt state.\r\nQueen of Clubs in Not-Yet-Dealt state.\r\nKing of Clubs in Not-Yet-Dealt state.\r\nAce of Clubs in Not-Yet-Dealt state.\r\nTwo of Diamonds in Not-Yet-Dealt state.\r\nThree of Diamonds in Not-Yet-Dealt state.\r\nFour of Diamonds in Not-Yet-Dealt state.\r\nFive of Diamonds in Not-Yet-Dealt state.\r\nSix of Diamonds in Not-Yet-Dealt state.\r\nSeven of Diamonds in Not-Yet-Dealt state.\r\nEight of Diamonds in Not-Yet-Dealt state.\r\nNine of Diamonds in Not-Yet-Dealt state.\r\nTen of Diamonds in Not-Yet-Dealt state.\r\nJack of Diamonds in Not-Yet-Dealt state.\r\nQueen of Diamonds in Not-Yet-Dealt state.\r\nKing of Diamonds in Not-Yet-Dealt state.\r\nAce of Diamonds in Not-Yet-Dealt state.\r\nTwo of Hearts in Not-Yet-Dealt state.\r\nThree of Hearts in Not-Yet-Dealt state.\r\nFour of Hearts in Not-Yet-Dealt state.\r\nFive of Hearts in Not-Yet-Dealt state.\r\nSix of Hearts in Not-Yet-Dealt state.\r\nSeven of Hearts in Not-Yet-Dealt state.\r\nEight of Hearts in Not-Yet-Dealt state.\r\nNine of Hearts in Not-Yet-Dealt state.\r\nTen of Hearts in Not-Yet-Dealt state.\r\nJack of Hearts in Not-Yet-Dealt state.\r\nQueen of Hearts in Not-Yet-Dealt state.\r\nKing of Hearts in Not-Yet-Dealt state.\r\nAce of Hearts in Not-Yet-Dealt state.\r\nTwo of Spades in Not-Yet-Dealt state.\r\nThree of Spades in Not-Yet-Dealt state.\r\nFour of Spades in Not-Yet-Dealt state.\r\nFive of Spades in Not-Yet-Dealt state.\r\nSix of Spades in Not-Yet-Dealt state.\r\nSeven of Spades in Not-Yet-Dealt state.\r\nEight of Spades in Not-Yet-Dealt state.\r\nNine of Spades in Not-Yet-Dealt state.\r\nTen of Spades in Not-Yet-Dealt state.\r\nJack of Spades in Not-Yet-Dealt state.\r\nQueen of Spades in Not-Yet-Dealt state.\r\nKing of Spades in Not-Yet-Dealt state.\r\nAce of Spades in Not-Yet-Dealt state.\r\n"; 

    public function __construct() {
        $this->testDeckCreation();
        $this->testDeckShuffle();
        $this->testDealOne();
        $this->testDeckDisplay();
    }

	public function testDeckCreation() {      
        $input = 'new Deck();';
        $expected = $this->expectedDeckDisplay;

        $deck = new Deck();
        $outcome = $deck->display();

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
	}

	public function testDeckShuffle()
    {     
        $input = 'new Deck(); $deck->shuffle();';
        $expected = $this->expectedDeckDisplay;

        $deck = new Deck();
        $deck->shuffle();
        $outcome = $deck->display();

        if($outcome != $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, "anything other than: ".$expected, $outcome);
    }

    public function testDealOne()
    {
        $input = 'new Deck(); $deck->dealOne();';
        $expected = "Two of Clubs in Dealt state.\r\n";

        $deck = new Deck();
        $card = $deck->dealOne();
        $outcome = $card->display();

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testDeckDisplay()
    {
        $input = 'new Deck(); echo $deck->display();';
        $expected = $this->expectedDeckDisplay;

        $deck = new Deck();
        $outcome = $deck->display();

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


$deckTest = new deckTest();