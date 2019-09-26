<?php
	require_once '../vendor/autoload.php';

	$dealer = new Poker\Dealer();
	$cards = $dealer->getCard(5);
	dump($cards);
?>