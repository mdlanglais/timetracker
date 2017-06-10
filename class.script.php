<?php

	/*
	 * class.script.php
	 * Author: Michael Langlais
	 *
	 */

	class Script {
	 
		/* Script class properties */
		private $script_id;
		private $script_name;
		private $script_description;
		private $script_filename;
		private $script_status;
		
		/* Script class functions */
		public function get_script_id() {
			return $this->script_id;
		}
		
		public function set_script_id($script_id) {
			$this->script_id = $script_id;
		}
		
		public function get_script_name(){
			return $this->script_name;
		}

		public function set_script_name($script_name){
			$this->script_name = $script_name;
		}

		public function get_script_description(){
			return $this->script_description;
		}

		public function set_script_description($script_description){
			$this->script_description = $script_description;
		}

		public function get_script_filename(){
			return $this->script_filename;
		}

		public function set_script_filename($script_filename){
			$this->script_filename = $script_filename;
		}

		public function get_script_status(){
			return $this->script_status;
		}

		public function set_script_status($script_status){
			$this->script_status = $script_status;
		}
		
	}

?>