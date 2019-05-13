<?php
/**
* required files and classes.
*/
require_once("card.php");

/**
 * hand interface
 */
interface iHand {
	public function display(); // prints the hand (in order)
	public function addCard(iCard $card); // adds a card to the hand
	public function sortBySuit(); // sorts the cards by suit (see intro for suit order), and then by value (see intro for value order)
	public function sortByValue(); // sorts by value, then by suit
	public function hasStraight($len, $sameSuit); //returns true if hand contains a straight of the given length
}

/**
 * Hand class represents a hand of cards. initially hand is empty and any number of cards can be added to it.
 */

class Hand implements iHand {

   //holds cards in a given hand.
   public $cards;

    /**
    * Constructs a poker hand of playing cards
    */
    public function __construct() { 
      $this->cards = [];
   }

   /**
    * Add a card to the end of the hand.
    * @param card that needs tobe added.
    * @throws invalidArgumentException if card is already there in hand.
    */
   public function addCard(iCard $card) {
		   
		 $cardExistsInHand = false;
		foreach($this->cards as $cardInHand) {
	    	if($cardInHand->value == $card->value && $cardInHand->suit == $card->suit) {
	    		$cardExistsInHand = true;
	    	}
		}
		

      	if ($cardExistsInHand)
        	throw new invalidArgumentException("card already exists in the hand");
     	else 
     		$this->cards[] = $card; //add the card to the hand
   }
   
   /**
    * Returns a string value & suit of each card in the hand.
    */
   public function display() {
 	 	$cardsDisplay = "";
 	 	foreach($this->cards as $card) {
 	 		$cardsDisplay .= $card->display();
        }
        return $cardsDisplay;
   }
 
   /**
    * Sorts the cards in the hand by suit first and value next
    */
   public function sortBySuit() {
 		usort($this->cards, function ($a, $b) {
           return ( $a->suit < $b->suit || ($a->suit == $b->suit && $a->value < $b->value) ) ? -1 : 1;
        });
   }
   
   /**
    * Sorts the cards in the hand by value first and suit next
    */
   public function sortByValue() {
   		usort($this->cards, function ($a, $b) {
           return ( $a->value < $b->value || ($a->value == $b->value && $a->suit < $b->suit) ) ? -1 : 1;
        });
   }

   /**
    * returns true if hand contains a straight of the given length.
	* If sameSuit is true, counts only straights with cards in the same suit (flushes);
	* If sameSuit if not true, any straight is counted
    */
   public function hasStraight($len, $sameSuit = false) {
   		if($sameSuit) {
   			$this->sortBySuit();
   		} else {
   			$this->sortByValue();
   		}

   		$sequenceCnt = 0;
   		//check if the given cards are straight
   		foreach($this->cards as $key => $card) {

   			if(!isset($this->cards[$key+1]))
   				break;
   			else
				$nextCard = $this->cards[$key+1];

			if($sameSuit) {
				if($nextCard->suit == $card->suit && $nextCard->value == ($card->value + 1))
					$sequenceCnt++;
				else 
					$sequenceCnt = 0;

			} else {
				if($nextCard->value == ($card->value + 1))
					$sequenceCnt++;
				else 
					$sequenceCnt = 0;
			}

   			if($sequenceCnt == ($len - 1))
   				return true;
   		}

   		return false;
   }
   
}

?>