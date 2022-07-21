<?php
namespace FKosmala\PHPHeTools;

use FKosmala\PHPHeTools\HeLayer;

class HeApi {
	private $HeLayer;

	public function __construct($heConfig = null) {
		$this->HeLayer = new HeLayer($heConfig);
	}

	// Methods related to the "/blockchain" endpoint
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

	public function getBlockInfo($block) {
		$params = array(
			"blockNumber" => $block
		);
		$result = $this->HeLayer->call('getBlockInfo', $params, '/blockchain');
		return $result;
	}

	public function getTransactionInfo($txid) {
		$params = array(
			"txid" => $txid
		);
		$result = $this->HeLayer->call('getTransactionInfo', $params, '/blockchain');
		return $result;
	}

	// Delegation methods
	public function getDelegationFrom($account, $token=null) {

		if($token!=null) {
			$token = strtoupper($token);
		}

		$params = array(
			"contract" => "tokens",
			"table" => "delegations",
			"query" => array(
				"from" => $account,
				"symbol" => $token
			),
			"limit" => 1
		);
		$result = $this->HeLayer->call('find', $params);
		return $result;
	}

	public function getDelegationTo($account, $token=null) {

		if($token!=null) {
			$token = strtoupper($token);
		}

		$params = array(
			"contract" => "tokens",
			"table" => "delegations",
			"query" => array(
				"to" => $account,
				"symbol" => $token
			),
			"limit" => 1
		);
		$result = $this->HeLayer->call('find', $params);
		return $result;
	}

	public function getPendingUndelegations($account, $token=null) {

		if($token != null) {
			$params = array(
				"contract" => "tokens",
				"table" => "pendingUndelegations",
				"query" => array(
					"account" => $account,
					"symbol" => strtoupper($token)
				),
				"limit" => 1
			);
		} else {
			$params = array(
				"contract" => "tokens",
				"table" => "pendingUndelegations",
				"query" => array(
					"account" => $account
				),
				"limit" => 1
			);
		}

		$result = $this->HeLayer->call('find', $params);
		return $result;
	}

	// Account related methods
	public function getAccountBalance($account) {
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

	public function getAccountHistory($account, $token=null, $limit=100) {
		if($token!=null) {
			$token = strtoupper($token);
		}
		
		$result = $this->HeLayer->callHistory($account, $token, $limit);
		return $result;
	}

}
