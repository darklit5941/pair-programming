<?php

use PHPUnit\Framework\TestCase;
use Poker\Game;
use Poker\Card;

class GameTest extends TestCase
{
	private $Game;
	private $Card;

	public function __construct(){
		$this->Game = new Game();
	}

    public function testIsPairTrue(){
    	$cards = [
    		new Card('Spades', '2'),
    		new Card('Hearts', '3'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertTrue($this->Game->isPair($cards));
    }

    public function testIsPairFalse(){
        $cards = [
    		new Card('Spades', '2'),
    		new Card('Hearts', '3'),
    		new Card('Hearts', '10'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertFalse($this->Game->isPair($cards));
    }

    public function testIsTwoPairTrue(){
    	$cards = [
    		new Card('Spades', '2'),
    		new Card('Spades', 'A'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertTrue($this->Game->isTwoPair($cards));
    }

    public function testIsTwoPairFalse(){
        $cards = [
    		new Card('Spades', '2'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', '10'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertFalse($this->Game->isTwoPair($cards));
    }

    public function testIsThreeTrue(){
    	$cards = [
    		new Card('Spades', '2'),
    		new Card('Spades', '2'),
    		new Card('Diamonds','2'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertTrue($this->Game->isThree($cards));
    }

    public function testIsThreeFalse(){
        $cards = [
    		new Card('Spades', '2'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', '10'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertFalse($this->Game->isThree($cards));
    }

    public function testIsFourTrue(){
    	$cards = [
    		new Card('Clubs', '2'),
    		new Card('Spades', '2'),
    		new Card('Diamonds','2'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', 'J')
    	];
        $this->assertTrue($this->Game->isFour($cards));
    }

    public function testIsFourFalse(){
        $cards = [
    		new Card('Spades', '2'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', '10'),
    		new Card('Hearts', 'A'),
    		new Card('Hearts', 'J')
    	];
        $this->assertFalse($this->Game->isFour($cards));
    }
    public function testIsHuLuTrue(){
    	$cards = [
    		new Card('Clubs', '2'),
    		new Card('Spades', '2'),
    		new Card('Diamonds','2'),
    		new Card('Hearts', '3'),
    		new Card('Hearts', '3')
    	];
        $this->assertTrue($this->Game->isHuLu($cards));
    }
    public function testIsHuLuFalse(){
    	$cards = [
    		new Card('Clubs', '2'),
    		new Card('Spades', '2'),
    		new Card('Diamonds','A'),
    		new Card('Hearts', '3'),
    		new Card('Hearts', '3')
    	];
        $this->assertFalse($this->Game->isHuLu($cards));
    }

    public function testIsHuLuFalse2(){
    	$cards = [
    		new Card('Clubs', '2'),
    		new Card('Spades', '2'),
    		new Card('Diamonds','2'),
    		new Card('Hearts', '3'),
    		new Card('Hearts', 'A')
    	];
        $this->assertFalse($this->Game->isHuLu($cards));
    }

    public function testIsStraightTrue(){
    	$cards = [
    		new Card('Clubs', '10'),
    		new Card('Clubs', 'A'),
    		new Card('Clubs', 'K'),
    		new Card('Clubs', 'Q'),
    		new Card('Clubs', 'J')
    	];
    	$this->assertTrue($this->Game->isStraight($cards));
    }

    public function testIsStraightFalse(){
    	$cards = [
    		new Card('Clubs', 'A'),
    		new Card('Clubs', '2'),
    		new Card('Clubs', '3'),
    		new Card('Clubs', '4'),
    		new Card('Clubs', 'K')
    	];
    	$this->assertFalse($this->Game->isStraight($cards));
    }

    public function testIsFlushTrue(){
    	$cards = [
    		new Card('Clubs', '10'),
    		new Card('Clubs', 'A'),
    		new Card('Clubs', 'K'),
    		new Card('Clubs', 'Q'),
    		new Card('Clubs', 'J')
    	];
    	$this->assertTrue($this->Game->isFlush($cards));
    }

    public function testIsFlushFalse(){
    	$cards = [
    		new Card('Clubs', '10'),
    		new Card('Clubs', 'A'),
    		new Card('Spades', 'K'),
    		new Card('Clubs', 'Q'),
    		new Card('Clubs', 'J')
    	];
    	$this->assertFalse($this->Game->isFlush($cards));
    }

    public function testIsStraightFlushTrue() {
    	$cards = [
    		new Card('Diamonds', '10'),
    		new Card('Diamonds', 'A'),
    		new Card('Diamonds', 'K'),
    		new Card('Diamonds', 'Q'),
    		new Card('Diamonds', 'J')
    	];
    	$this->assertTrue($this->Game->isStraightFlush($cards));
    }

    public function testIsStraightFlushFalse() {
    	$cards = [
    		new Card('Diamonds', '9'),
    		new Card('Diamonds', 'A'),
    		new Card('Diamonds', 'K'),
    		new Card('Diamonds', 'Q'),
    		new Card('Diamonds', 'J')
    	];
    	$this->assertFalse($this->Game->isStraightFlush($cards));
    }

    public function testIsStraightFlushFalse2() {
    	$cards = [
    		new Card('Hearts', '10'),
    		new Card('Diamonds', 'A'),
    		new Card('Diamonds', 'K'),
    		new Card('Diamonds', 'Q'),
    		new Card('Diamonds', 'J')
    	];
    	$this->assertFalse($this->Game->isStraightFlush($cards));
    }

    public function testIsStraightFlushFalse3() {
    	$cards = [
    		new Card('Hearts', '9'),
    		new Card('Diamonds', 'A'),
    		new Card('Diamonds', 'K'),
    		new Card('Diamonds', 'Q'),
    		new Card('Diamonds', 'J')
    	];
    	$this->assertFalse($this->Game->isStraightFlush($cards));
    }

    public function testGetCardType() {
    	$cards = [
    		new Card('Diamonds', '10'),
    		new Card('Diamonds', 'A'),
    		new Card('Diamonds', 'K'),
    		new Card('Diamonds', 'Q'),
    		new Card('Diamonds', 'J')
    	];
    	$expect ='StraightFlush';
    	$acl = $this->Game->getCardType($cards);
    	$this->assertEquals($expect, $acl);
    }

    public function testJdugeType同花順與鐵支(){
    	$straightFlushCards = $this->getStraightFlushCards();
    	$fourCards = $this->getFourCards();
    	$expect = 1;
    	$acual = $this->Game->jdugeType($straightFlushCards, $fourCards);
    	$this->assertEquals($expect, $acual);
    }

    private function getStraightFlushCards()
    {
    	return [
    		new Card('Hearts', '9'),
    		new Card('Diamonds', 'A'),
    		new Card('Diamonds', 'K'),
    		new Card('Diamonds', 'Q'),
    		new Card('Diamonds', 'J')
    	];
    }

    private function getFourCards(){
    	return [
    		new Card('Clubs', '2'),
    		new Card('Spades', '2'),
    		new Card('Diamonds','2'),
    		new Card('Hearts', '2'),
    		new Card('Hearts', 'J')
    	];
    }

}

?>