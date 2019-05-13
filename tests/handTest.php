<?php

/**
* required files and classes.
*/	
require_once("../deck.php");
require_once("../hand.php");

class handTest {

	public function __construct() {
		$this->testValidHandCreation();
		$this->testValidAddCard();
        $this->testInvalidAddCard();
		$this->testSortBySuit();
		$this->testSortByValue();
        $this->testHasStraightSuccess();
        $this->testHasStraightFailed();
        $this->testHasStraightSameSuitSuccess();
        $this->testHasStraightSameSuitFailed();
		$this->testHandDisplay();
	}

	public function testValidHandCreation() {

        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        for($c = 1; $c <= 5; $c++) {
            $hand->addCard($deck->dealOne());
        }

    	$input = "adding top 5 new cards without shuffling the deck";
    	$expected = "Two of Clubs in Dealt state.\r\nThree of Clubs in Dealt state.\r\nFour of Clubs in Dealt state.\r\nFive of Clubs in Dealt state.\r\nSix of Clubs in Dealt state.\r\n";
    	$outcome = $hand->display();

    	if($outcome == $expected)
    		$status = "success";
    	else 
    		$status = "failed";

    	$this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
	}

	public function testValidAddCard()
    {
        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard($deck->dealOne());
        

        $input = "adding top card without shuffling the deck";
        $expected = "Two of Clubs in Dealt state.\r\n";
        $outcome = $hand->display();

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }


    public function testInvalidAddCard()
    {
        $input = '$deck->dealOne(); new Card( 1, 2, "D");';
        $expected = "card already exists in the hand";
        try {
            //add a new deck
            $deck = new Deck();

            //add a new hand
            $hand = new Hand(); 
            $hand->addCard($deck->dealOne());

            $card = new Card( 1, 2, 'D');
            $hand->addCard($card);

        } catch (Exception $e) {
            $outcome = $e->getMessage();
        }

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testSortBySuit()
    {
        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard(new Card( 2, 2, 'D'));
        $hand->addCard(new Card( 1, 11, 'D'));
        $hand->addCard(new Card( 4, 9, 'D'));
        $hand->addCard(new Card( 3, 6, 'D'));
        $hand->addCard(new Card( 1, 4, 'D'));
        $hand->sortBySuit();
    

        $input = "adding 5 new cards in order Card( 2, 2, 'D') Card( 1, 11, 'D') Card( 4, 9, 'D') Card( 3, 6, 'D') Card( 1, 4, 'D')";
        $expected = "Four of Clubs in Dealt state.\r\nJack of Clubs in Dealt state.\r\nTwo of Diamonds in Dealt state.\r\nSix of Hearts in Dealt state.\r\nNine of Spades in Dealt state.\r\n";
        $outcome = $hand->display();

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testSortByValue()
    {
        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard(new Card( 2, 2, 'D'));
        $hand->addCard(new Card( 1, 11, 'D'));
        $hand->addCard(new Card( 4, 9, 'D'));
        $hand->addCard(new Card( 3, 6, 'D'));
        $hand->addCard(new Card( 1, 4, 'D'));
        $hand->sortByValue();
    

        $input = "adding 5 new cards in order Card( 2, 2, 'D') Card( 1, 11, 'D') Card( 4, 9, 'D') Card( 3, 6, 'D') Card( 1, 4, 'D')";
        $expected = "Two of Diamonds in Dealt state.\r\nFour of Clubs in Dealt state.\r\nSix of Hearts in Dealt state.\r\nNine of Spades in Dealt state.\r\nJack of Clubs in Dealt state.\r\n";
        $outcome = $hand->display();

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }


    public function testHasStraightSuccess() {

        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard(new Card( 2, 2, 'D'));
        $hand->addCard(new Card( 1, 5, 'D'));
        $hand->addCard(new Card( 4, 3, 'D'));
        $hand->addCard(new Card( 3, 6, 'D'));
        $hand->addCard(new Card( 1, 4, 'D'));
        $outcome = $hand->hasStraight(5, false) ? "TRUE" : "FALSE";
    

        $input = "adding 5 new cards in order Card( 2, 2, 'D') Card( 1, 5, 'D') Card( 4, 3, 'D') Card( 3, 6, 'D') Card( 1, 4, 'D')";
        $expected = "TRUE";

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }

    public function testHasStraightFailed() {

        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard(new Card( 2, 2, 'D'));
        $hand->addCard(new Card( 1, 5, 'D'));
        $hand->addCard(new Card( 4, 9, 'D'));
        $hand->addCard(new Card( 3, 6, 'D'));
        $hand->addCard(new Card( 1, 4, 'D'));
        $outcome = $hand->hasStraight(5, false) ? "TRUE" : "FALSE";
    

        $input = "adding 5 new cards in order Card( 2, 2, 'D') Card( 1, 5, 'D') Card( 4, 9, 'D') Card( 3, 6, 'D') Card( 1, 4, 'D')";
        $expected = "TRUE";

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);

    }

    public function testHasStraightSameSuitSuccess() {

        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard(new Card( 2, 2, 'D'));
        $hand->addCard(new Card( 2, 5, 'D'));
        $hand->addCard(new Card( 2, 3, 'D'));
        $hand->addCard(new Card( 2, 6, 'D'));
        $hand->addCard(new Card( 2, 4, 'D'));
        $outcome = $hand->hasStraight(5, true) ? "TRUE" : "FALSE";
    

        $input = "adding 5 new cards in order Card( 2, 2, 'D') Card( 2, 5, 'D') Card( 2, 3, 'D') Card( 2, 6, 'D') Card( 2, 4, 'D')";
        $expected = "TRUE";

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);

    }

    public function testHasStraightSameSuitFailed() {

        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        $hand->addCard(new Card( 2, 2, 'D'));
        $hand->addCard(new Card( 2, 5, 'D'));
        $hand->addCard(new Card( 3, 3, 'D'));
        $hand->addCard(new Card( 2, 6, 'D'));
        $hand->addCard(new Card( 2, 4, 'D'));
        $outcome = $hand->hasStraight(5, true) ? "TRUE" : "FALSE";
    

        $input = "adding 5 new cards in order Card( 2, 2, 'D') Card( 2, 5, 'D') Card( 3, 3, 'D') Card( 2, 6, 'D') Card( 2, 4, 'D')";
        $expected = "TRUE";

        if($outcome == $expected)
            $status = "success";
        else 
            $status = "failed";

        $this->printResults( __FUNCTION__, $status, $input, $expected, $outcome);
    }


    public function testHandDisplay()
    {
        //add a new deck
        $deck = new Deck();

        //add a new hand
        $hand = new Hand(); 
        for($c = 1; $c <= 5; $c++) {
            $hand->addCard($deck->dealOne());
        }

        $input = "adding top 5 new cards without shuffling the deck";
        $expected = "Two of Clubs in Dealt state.\r\nThree of Clubs in Dealt state.\r\nFour of Clubs in Dealt state.\r\nFive of Clubs in Dealt state.\r\nSix of Clubs in Dealt state.\r\n";
        $outcome = $hand->display();

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


$handTest = new handTest();