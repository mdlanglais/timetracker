<?php

	/*
	 * class.client.php
	 * Author: Michael Langlais
	 *
	 */

	class Client {

		/* Client class properties */
		private $id;
		private $name;
		private $client_type;
		private $phone;
		private $status;
		private $notes;
		private $account_rep;
		private $modified;
		private $submitted;
		
		/* Client class functions */
		public function get_id() {
			return $this->id;
		}
		
		public function set_id($id) {
			$this->id = $id;
		}
		
		public function get_name() {
			return $this->name;
		}
		
		public function set_name($name) {
			$this->name = $name;
		}
		
		public function get_client_type() {
			return $this->client_type;
		}

		public function set_client_type($client_type) {
			$this->client_type = $client_type;
		}

		public function get_phone() {
			return $this->phone;
		}

		public function set_phone($phone) {
			$this->phone = $phone;
		}

		public function get_status() {
			return $this->status;
		}

		public function set_status($status) {
			$this->status = $status;
		}

		public function get_notes() {
			return $this->notes;
		}

		public function set_notes($notes) {
			$this->notes = $notes;
		}

		public function get_account_rep() {
			return $this->account_rep;
		}

		public function set_account_rep($account_rep) {
			$this->account_rep = $account_rep;
		}
		
		public function get_modified() {
			return $this->modified;
		}

		public function set_modified($modified) {
			$this->modified = $modified;
		}

		public function get_submitted() {
			return $this->submitted;
		}

		public function set_submitted($submitted) {
			$this->submitted = $submitted;
		}
		
		public function to_string() {
			$str = 'Client: ';
			$str .= $this->name . ' | ' . $this->client_type . ' | ' . $this->phone . ' | ' . $this->status . ' | ' . $this->notes . ' | ' . $this->account_rep;
			return $str;			
			
		}

	}

?>