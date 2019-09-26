<?php
namespace Poker;

class Card 
{
	private $suit=NULL;
	private $point=NULL;

	public function __construct($suit=NULL, $point=NULL){
		$this->setSuit($suit);
		$this->setPoint($point);
	}

	public function setSuit($suit){

		$white_list = ['Spades', 'Hearts', 'Diamonds', 'Clubs'];
		$this->suit = (in_array($suit, $white_list))? $suit : NULL ;

		return true;
	}

	public function setPoint($point){

		$white_list = ['A','2','3','4','5','6','7','8','9','10','J','Q','K'];
		$this->point = (in_array((string)$point, $white_list))? $point : NULL ;

		return true;
	}

	public function getSuit(){
		return $this->suit;
	}

	public function getPoint(){
		return $this->point;
	}

	public function getBoard($to_str=true){
		if($to_str){
			return $this->suit.$this->point;
		}else{
			return ['suit'=>$this->suit, 'point'=>$this->point];
		}
	}
}
?>