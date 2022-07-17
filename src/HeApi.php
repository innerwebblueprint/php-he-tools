<?php

	namespace FKosmala\PHPHeTools;
	
	use FKosmala\PHPHeTools\HeLayer;
	
	class HeApi {
		private $HeLayer;
		
		public function __construct($heConfig = null) {
			$this->HeLayer = new HeLayer($heConfig);
		}
		
		public function getStatus() {
			$params = array();
			$result = $this->HeLayer->call('getStatus', $params, '/blockchain');
			return $result;
		}
		
		public function getLatestBlockInfo() {
			$params = array();
			$result = $this->HeLayer->call('getLatestBlockInfo', $params, '/blockchain');
			return $result;
		}
		
		public function getAccountTokens($account) {
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
