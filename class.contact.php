<?php

	/*
	 * class.contact.php
	 * Author: Michael Langlais
	 *
	 */

	class Contact {
	 
		/* Contact class properties */
		private $id;
		private $first_name;
		private $last_name;
		private $address;
		private $city;
		private $state;
		private $zip;
		private $primary_phone;
		private $email;
		private $cell_phone;
		private $contact_method;
		private $notes;
		private $status;
		private $client_id;
		private $account_rep;
		private $modified;
		private $submitted;
		
		/* Contact class functions */
		public function get_id() {
			return $this->id;
		}
		
		public function set_id($id) {
			$this->id = $id;	
		}
		
		public function get_first_name() {
			return $this->first_name;
		}

		public function set_first_name($first_name) {
			$this->first_name = $first_name;	
		}

		public function get_last_name() {
			return $this->last_name;
		}

		public function set_last_name($last_name) {
			$this->last_name = $last_name;	
		}

		public function get_address() {
			return $this->address;
		}

		public function set_address($address) {
			$this->address = $address;	
		}

		public function get_city() {
			return $this->city;
		}

		public function set_city($city) {
			$this->city = $city;	
		}

		public function get_state() {
			return $this->state;
		}

		public function set_state($state) {
			$this->state = $state;	
		}

		public function get_zip() {
			return $this->zip;
		}

		public function set_zip($zip) {
			$this->zip = $zip;	
		}

		public function get_primary_phone() {
			return $this->primary_phone;
		}

		public function set_primary_phone($primary_phone) {
			$this->primary_phone = $primary_phone;	
		}

		public function get_email() {
			return $this->email;
		}

		public function set_email($email) {
			$this->email = $email;	
		}

		public function get_cell_phone() {
			return $this->cell_phone;
		}

		public function set_cell_phone($cell_phone) {
			$this->cell_phone = $cell_phone;	
		}
		
		public function get_contact_method() {
			return $this->contact_method;
		}

		public function set_contact_method($contact_method) {
			$this->contact_method = $contact_method;	
		}

		public function get_notes() {
			return $this->notes;
		}

		public function set_notes($notes) {
			$this->notes = $notes;	
		}

		public function get_status() {
			return $this->status;
		}

		public function set_status($status) {
			$this->status = $status;	
		}

		public function get_client_id() {
			return $this->client_id;
		}
		
		public function set_client_id($client_id) {
			return $this->client_id = $client_id;	
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
			$str = 'Contact: ';
			$str .= $this->first_name . ' | ' . $this->last_name . ' | ' . $this->address . ' | ' . 
				$this->city . ' | ' . $this->state . ' | ' . $this->zip . ' | ' . $this->primary_phone . ' | ' . $this->cell_phone . ' | ' . 
				$this->email . ' | ' . $this->contact_method . ' | ' . $this->notes . ' | ' . $this->status;
			return $str;			
			
		}

	}
		
?>