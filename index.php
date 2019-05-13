<?php 
/**
* required files and classes.
*/
require_once("deck.php");
require_once("hand.php");

$deck = new Deck();

echo "\r\n" . "DECK CREATED:" . "\r\n";
echo $deck->display();

echo "\r\n" . "DECK SHUFFLED:" . "\r\n";
$deck->shuffle();
echo $deck->display();

echo  "\r\n" . "Enter The Number of Hands(players) In This Game (min: 2, max:10): ";
$handle = fopen("php://stdin","r");
$totalHands = trim(fgets($handle));
if($totalHands < 2 || $totalHands > 10) {
    echo "INVALID INPUT, ABORTING!\n";
    exit;
} 
fclose($handle);

$cardsPerHand = 5;

echo "\r\n" . "TOTAL HANDS:$totalHands" . "\r\n";

echo "\r\n" . "TOTAL CARDS PER HAND:$cardsPerHand" . "\r\n";

$game = [];
for($h = 1; $h <= $totalHands; $h++) {
	//add a new hand
	$hand = new Hand();	
	for($c = 1; $c <= $cardsPerHand; $c++) {
		$hand->addCard($deck->dealOne());
	}

	//straight flush
	$straight = $hand->hasStraight($cardsPerHand, true);
	//straight
	if(!$straight) {
		$straight = $hand->hasStraight($cardsPerHand);
	}
	echo "\r\n" . "HAND $h HAS STRAIGHT?: " 
		. ($straight ? "TRUE" : "FALSE") . "\r\n";

	echo "\r\n" . "HAND $h:" . "\r\n";
	echo $hand->display();

	//add hand to the game
	$game[$h] = $hand;
}

echo "\r\n" . "DECK STATUS:" . "\r\n";
echo $deck->display();


?>
