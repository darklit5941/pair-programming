<?php

use PHPUnit\Framework\TestCase;
use Poker\Card;

class CardTest extends TestCase
{
	private $Card;

	public function __construct(){
		$this->Card = new Card();
	}
    
    public function testSetSuit(){
        $this->assertTrue(is_bool($this->Card->setSuit('Spades')));
    }

    public function testSetPoint(){
        $this->assertTrue(is_bool($this->Card->setPoint('A')));
    }
}

?>