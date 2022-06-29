<?php

	namespace FKosmala\PHPHeTools;
	
	class HeLayer {
		// Default node for query HiveEngine API
		private $heNode ="api2.hive-engine.com/rpc/contracts";
		
		// Force Scheme with HTTPS
		private $scheme = 'https://';
		
		// Tooggle to True if you want to display the query & the result
		private $debug = false;
		
		private $throw_exception = false;
		
		public function __construct($config = array()) {
			
			if (array_key_exists('heNode', $config)) {
				$this->webservice_url = $config['heNode'];
			}
			
			if (array_key_exists('debug', $config)) {
				$this->debug = $config['debug'];
			}
			
			if (array_key_exists('throw_exception', $config)) {
				$this->throw_exception = $config['throw_exception'];
			}
		}
		
		public function call($method, $params = array()) {
			$request = $this->getRequest($method, $params);
			$response = '';
			$response = $this->curl($request);

			if (array_key_exists('error', $response)) {
				if ($this->throw_exception) {
					throw new Exception($response['error']);
				} else {
					return $response;
				}
			}
			return $response['result'];
		}
		
		public function getRequest($method, $params) {
			$request = array(
				"jsonrpc" => "2.0",
				"method" => $method,
				"params" => $params,
				"id" => 1
			);
				
			$request_json = json_encode($request);
			
			if ($this->debug) {
				echo "<pre><br>request_json<br/>";
				print $request_json . "\n";
				echo "</pre>";
			}
			
			return $request_json;
		}

		public function curl($data) {
			$ch = curl_init();
			$this->scheme = 'https://';
			curl_setopt($ch, CURLOPT_URL, $this->scheme.$this->heNode);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$result = curl_exec($ch);

			if ($this->debug) {
				echo "<pre><br>result<br>";
				print $result . "\n";
				echo "</pre>";
			}

			$result = json_decode($result, true);

			return $result;
		}
	}
