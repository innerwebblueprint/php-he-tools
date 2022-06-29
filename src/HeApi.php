<?php

	namespace FKosmala\PHPHeTools;
	
	use FKosmala\PHPHeTools\HeLayer;
	
	class HeApi {
		private $HeLayer;
		
		public function __construct($config = null) {
			$this->HeLayer = new HeLayer($heConfig);
		}
		
		// Get Status of the HE sidechain
		public function get_status(){
			$result = $this->HiveLayer->call('get_status');
			return $result;
		}
	}
