<?php

use PHPUnit\Framework\TestCase;
use Poker\Dealer;

class DealerTest extends TestCase
{
	private $Dealer;

	public function __construct(){
		$this->Dealer = new Dealer();
	}

    public function testFunction(){
        $this->assertTrue(method_exists($this->Dealer, 'getCard'));
    }
}

?>