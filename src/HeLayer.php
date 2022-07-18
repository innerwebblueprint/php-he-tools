<?php
namespace FKosmala\PHPHeTools;

class HeLayer {
	// Toggle to true if you want to display the query & the result
	private $debug = false;
	
	// Default node for query HiveEngine API
	private $heNode ="api.hive-engine.com/rpc";
	
	private $throw_exception = false;
	
	// Force Scheme with HTTPS
	private $scheme = 'https://';
	
	public function __construct($heConfig = array()) {
		
		if (array_key_exists('debug', $heConfig)) {
			$this->debug = $heConfig['debug'];
		}
		
		if (array_key_exists('heNode', $heConfig)) {
			$this->heNode = $heConfig['heNode'];
		}
		
		if (array_key_exists('throw_exception', $heConfig)) {
			$this->throw_exception = $heConfig['throw_exception'];
		}
	}
	
	public function getRequest($method, $contract, $table, $query, $limit = 1) {
		$request = array(
			"id" => 1,
			"jsonrpc" => "2.0",
			"method" => $method,
			"params" => array(
				"contract" => $contract,
				"table" => $table,
				"query" => $query,
			),
			"limit" => $limit
		);
			
		$request_json = json_encode($request);
		
		if ($this->debug) {
			echo "<pre>request_json<br/>".$request_json."\n</pre>";
		}
		
		return $request_json;
	}
	
	public function getRPCRequest($method, $params=array()) {
		$request = array(
			"id" => 1,
			"jsonrpc" => "2.0",
			"method" => $method,
			"params" => $params
		);
			
		$request_json = json_encode($request);
		
		if ($this->debug) {
			echo "<pre>request_json<br/>".$request_json."\n</pre>";
		}
		
		return $request_json;
	}
	
	public function curl($data, $endpoint) {
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $this->scheme.$this->heNode.$endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		
		$result = curl_exec($ch);

		if ($this->debug) {
			echo "<pre><br>Result :<br>".$result."</pre>\n";
		}

		return $result;
	}

	public function call($method, $params = array(), $endpoint="/contracts") {
		if (!empty($params['contract'])) {
			$contract = $params['contract'];
			$table = $params['table'];
			$query = $params['query'];
			$limit = $params['limit'];
			$request = $this->getRequest($method, $contract, $table, $query, $limit);
		}
		else {
			$request = $this->getRPCRequest($method, $params);
		}
		$response = $this->curl($request, $endpoint);
		$response = json_decode($response, true);
		
		if (empty($response['result'])) {
			if ($this->throw_exception) {
				throw new Exception('Error retrieve HiveEngine API query');
			} else {
				return $response['result'];
			}
		}
		
		return $response['result'];
	}
}
