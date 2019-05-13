Poker Library by Abhi

this code was built and tested in php 7.1 version and was built for CLI execution only.

for executing it in browser code "\r\n" has to be changed to "<\ br >" or by using nl2br() php function where ever we have the code for carriage returns

To Run the entire script as a game flow, cd into the folder that you place code base in:

cd {BASE_PATH}/poker-game

Then execute the php from command line console:

php index.php


it will prompt you to enter the number of hands(players) in this game. enter a value between 2 - 10 and press enter.
the script will create hands for those number of players 
and each hand has 5 cards dealt.

the script tests for if the hand hasStraight, both:

- sameSuit

- and just plain straight

and prints the result of that function. 

later it displays the deck with all the cards that are dealt and yet-to-dealt


----------------------------------------

To Run the Test Scripts: 
make sure you cd into that folder first:

cd /tests

then execute the test file that you want to see the results for: 

php cardTest.php

php deckTest.php

php handTest.php
