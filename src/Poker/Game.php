<?php
namespace Poker;

use \Poker\Card;

class Game
{
	//驗證對子
	public function isPair(Array $Cards=[]){
		$points = [];
		foreach($Cards as $k => $Card){
			$points[] = $Card->getPoint();
		}
		$points = array_unique($points);
		if(count($points) < 5){
			return true;
		}else{
			return false;
		}
	}

	//驗證2Pair
	public function isTwoPair(Array $Cards=[]){
		$points = [];
		foreach($Cards as $k => $Card){
			$points[] = $Card->getPoint();
		}
		$points = array_count_values($points);
		$check = 0;
		foreach ($points as $key => $value) {
			if ($value == 2)
				$check ++;
		}
	
		if($check == 2){
			return true;
		}else{
			return false;
		}
	}

	//驗證三條
	public function isThree(Array $Cards=[]){
		$points = [];
		foreach($Cards as $k => $Card){
			$points[] = $Card->getPoint();
		}
		$points = array_count_values($points);
		$check = 0;
		foreach ($points as $key => $value) {
			if ($value == 3)
				$check ++;
		}
	
		if($check == 1){
			return true;
		}else{
			return false;
		}
	}

	//驗證鐵支
	public function isFour(Array $Cards=[]){
		$points = [];
		foreach($Cards as $k => $Card){
			$points[] = $Card->getPoint();
		}
		$points = array_count_values($points);
		$check = 0;
		foreach ($points as $key => $value) {
			if ($value == 4)
				$check ++;
		}
	
		if($check == 1){
			return true;
		}else{
			return false;
		}
	}

	private function getPoints(Array $Cards=[]){
		$points = [];
		foreach($Cards as $k => $Card){
			$points[] = $Card->getPoint();
		}
		return $points;
	}

	//驗證HuLu
	public function isHuLu(Array $Cards=[]){
		$points = $this->getPoints($Cards);
		return count(array_unique($points)) == 2 && $this->isThree($Cards);
	}

	private function switchToNumber($points){
		return (array_map(function($value){
			switch ($value) {
				case 'A': $value = 1; break;
				case 'J': $value = 11; break;
				case 'Q': $value = 12; break;
				case 'K': $value = 13; break;
			}
			return $value;
		}, $points));
	}

	private function switchToString($points){
		return (array_map(function($value){
			switch ($value) {
				case '1': $value = 'A'; break;
				case '11': $value = 'J'; break;
				case '12': $value = 'Q'; break;
				case '13': $value = 'K'; break;
			}
			return $value;
		}, $points));
	}

	public function isStraight(Array $Cards = []){
		$points = array_unique($this->switchToNumber($this->getPoints($Cards)));
		if(count($points) < 5){
			return false;
		}

		sort($points);
		$stringDataset = '12345678910111213';
		$needle = implode('', $points);
		$result = strstr($stringDataset, $needle);
		return ($result || $needle == '110111213');
	}

	//驗證同花
	public function isFlush(Array $Cards=[]){

		$suits = [];
		foreach($Cards as $k => $Card){
			$suits[] = $Card->getSuit();
		}
		return count(array_unique($suits)) == 1 ;
	}

	public function isStraightFlush(Array $Cards=[]) {
		return $this->isStraight($Cards) && $this->isFlush($Cards);
	}


	public function getCardType(Array $Cards=[]) {
		if($this->isStraightFlush($Cards)){
			return 'StraightFlush';
		}else if($this->isFour($Cards)){
			return 'Four';
		}else if($this->isHuLu($Cards)){
			return 'HuLu';
		}else if($this->isFlush($Cards)){
			return 'Flush';
		}else if($this->isStraight($Cards)){
			return 'Straight';
		}else if($this->isThree($Cards)){
			return 'Three';
		}else if($this->isTwoPair($Cards)){
			return 'TwoPair';
		}else if($this->isPair($Cards)){
			return 'Pair';
		}else{
			return 'highCard';
		}
		
	}

	public function jdugeType(Array $Cards1, Array $Cards2)
	{
		$card1Type = $this->getCardType($Cards1);
		$card2Type = $this->getCardType($Cards2);
		$card1Rank = $this->getRankByType($card1Type);
		$card2Rank = $this->getRankByType($card2Type);
		return $card1Rank <=> $card2Rank;
	}

	private function getRankByType($type)
	{
		$typeRank = [
			'StraightFlush',
			'Four',
			'HuLu',
			'Flush',
			'Straight',
			'Three',
			'TwoPair',
			'Pair',
			'highCard'
		];
		return array_search($type, $typeRank);

	}


}
?>