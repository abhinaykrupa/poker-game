<?php
/**
* required files and classes.
*/	
require_once("card.php");

/**
 * Deck interface
 */
interface iDeck {
    public function dealOne(); // moves the top card from ND to D and returns the card
	public function display(); // prints non-dealt cards and dealt-cards (in order, as separate lists)
	public function shuffle(); //Shuffles the deck randomly
}

/**
 *  Deck class represents a deck of 52 playing cards.  
 */
class Deck implements iDeck {

   /**
    * An array to store 52 cards.
    */
   public $deck = [];

   private $cardsUsed; 
  
   /**
    * Constructs a poker deck of playing cards, originally the cards
    * are in a sorted order.
    */
   public function __construct() { 
      $this->deck = [];
      $cardsIndex = 1;
      foreach (card::$suits as $suit=>$suitName) {
         foreach(card::$values as $value=>$valueName) {
            $this->deck[$cardsIndex] = new Card( $suit, $value, "ND");
            $cardsIndex++;
         }
      }
      $this->cardsUsed = 0;
   }

   /**
    * Put all the used cards back into the deck (if any), and
    * shuffle the deck into a random order.
    */
   public function shuffle() {
   	  $currentDeck = $this->deck;
      for ( $i = count($this->deck); $i > 0; $i--) {
      	 // Pick a random index from 0 to i
         $rand = rand(1, $i);
         $temp = $this->deck[$i];
         $this->deck[$i] = $this->deck[$rand];
         $this->deck[$rand] = $temp;
      }
      //recusrsive call if the above randomization fails for any reason
      if($this->deck == $currentDeck) {
      	$this->shuffle();
      }
   }

   /**
    * Returns a string value & suit of each card in the deck.
    */
   public function display() {
   		$cardsDisplay = "";
 	 	foreach($this->deck as $card) {
 	 		$cardsDisplay .= $card->display();
        }
        return $cardsDisplay;
   }
   
   /**
    * @return returns the next card in the deck
    * @throws invalidStateException if no cards are left 
    */
   public function dealOne() {
      if ($this->cardsUsed == count($this->deck))
         throw new invalidArgumentException("No more cards left in the deck");
      $this->cardsUsed++;
	  $this->deck[$this->cardsUsed]->state = "D";
      return $this->deck[$this->cardsUsed]; //we dont remove the cards from the deck but just keep track of it!
   }   
}

?>
