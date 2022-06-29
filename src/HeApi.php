<?php

	namespace FKosmala\PHPHeTools;
	
	use FKosmala\PHPHeTools\HeLayer;
	
	class HeApi {
		private $HeLayer;
		
		public function __construct($heConfig = null) {
			$this->HeLayer = new HeLayer($heConfig);
		}
		
		public function getHeTokensFromAccount($account) {
			$params = array(
				"contract" => "tokens",
				"table" => "balances",
				"query" => array(
					"account" => $account
				),
				"limit" => 1
			);
			$result = $this->HeLayer->call('find', $params);
			return $result;
		}
		
	}
