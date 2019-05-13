<?php

/**
 * Card interface
 */
interface iCard {
    public function display(); // prints the type of card
}

/**
 * Card class represents a playing card from a Poker deck.  
 * Card has a suit: spades, hearts, diamonds, clubs.  
 * A given suit has one of the 13 values: 2, 3, 4, 5, 6, 7, 8, 9, 10, jack, queen, or king, ace. 
 * Ace is considered as the high card
 */

class Card implements iCard {
   
   // Defining order for 4 suits.
  public static $suits = [
    1 => "Clubs",
    2 => "Diamonds",
    3 => "Hearts",
    4 => "Spades",
  ];

  public static $values = [
    2 => "Two",
    3 => "Three",
    4 => "Four",
    5 => "Five",
    6 => "Six",
    7 => "Seven",
    8 => "Eight",
    9 => "Nine",
    10 => "Ten",
    11 => "Jack",
    12 => "Queen",
    13 => "King",
    14 => "Ace",
  ];

  public static $states = [
    "D" => "Dealt",
    "ND" => "Not-Yet-Dealt",
  ];
    
   
   /**
    * This card's suit
    */
   public $suit; 
   
   /**
    * The card's value
    */
   public $value;

   /**
    * The card's state, D - dealt, ND - Not yet dealt.
    */
   public $state = "ND";
   
   /**
    * Creates a card with a specified suit and value.
    * @param value of the card, 1 through 13.
    * @param suit of the card.
    */
   public function __construct( $givenSuit, $givenValue, $givenState) {

      if (!array_key_exists($givenSuit, self::$suits))
         throw new invalidArgumentException("invalid card suit");
      if (!array_key_exists($givenValue, self::$values))
         throw new invalidArgumentException("invalid card value");
      if (!array_key_exists($givenState, self::$states))
         throw new invalidArgumentException("invalid card state");

      //set the given variables
      $this->suit =  $givenSuit;
      $this->value = $givenValue;
      $this->state = $givenState;
   }
   
   /**
    * Returns a string value & suit of this card.
    */
   public function display() {
      return self::$values[$this->value] . " of " . self::$suits[$this->suit] . " in " . self::$states[$this->state] .  " state.\r\n";
   }

}

?>