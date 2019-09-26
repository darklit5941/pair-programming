<?php
namespace Poker;

use \Poker\Card;

class Dealer
{
	private function pickPoint($point=false){
		$white_list = ['A','2','3','4','5','6','7','8','9','10','J','Q','K'];
		if($point && isset($white_list[$point])){
			return $white_list[$point];
		}else{
			return $white_list[array_rand($white_list)];
		}
	}

	private function pickSuit($suit=false){
		$white_list = ['Spades', 'Hearts', 'Diamonds', 'Clubs'];
		if($suit && isset($white_list[$suit])){
			return $white_list[$suit];
		}else{
			return $white_list[array_rand($white_list)];
		}
	}

	public function getCard($num=0){
		$cards = [];

		for($i=0; $i<$num; $i++){
			$suit = $this->pickSuit();
			$point = $this->pickPoint();

			$cards[] = new Card($suit, $point);
		}

		return $cards;
	}
}
?>