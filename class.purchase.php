<?php

	/*
	 * class.purchase.php
	 * Author: Michael Langlais
	 *
	 */

	class Purchase {
	 
		/* Purchase class properties */
		private $id;
		private $submitted_by;
		private $item_title;
		private $product_id;
		private $date_ordered;
		private $date_expected;
		private $date_received;
		private $invoice_number;
		private $order_number;
		private $cost;
		private $cost_shipping;
		private $cost_tax;
		private $ordered_by;
		private $vendor_name;
		private $price;
		private $price_shipping;
		private $price_tax;
		private $notes;
		private $modified;
		private $submitted;
		
		/* Purchase class functions */
		public function get_id(){
			return $this->id;
		}

		public function set_id($id){
			$this->id = $id;
		}

		public function get_submitted_by(){
			return $this->submitted_by;
		}

		public function set_submitted_by($submitted_by){
			$this->submitted_by = $submitted_by;
		}

		public function get_item_title(){
			return $this->item_title;
		}

		public function set_item_title($item_title){
			$this->item_title = $item_title;
		}

		public function get_product_id(){
			return $this->product_id;
		}

		public function set_product_id($product_id){
			$this->product_id = $product_id;
		}

		public function get_date_ordered(){
			return $this->date_ordered;
		}

		public function set_date_ordered($date_ordered){
			$this->date_ordered = $date_ordered;
		}

		public function get_date_expected(){
			return $this->date_expected;
		}

		public function set_date_expected($date_expected){
			$this->date_expected = $date_expected;
		}

		public function get_date_received(){
			return $this->date_received;
		}

		public function set_date_received($date_received){
			$this->date_received = $date_received;
		}

		public function get_invoice_number(){
			return $this->invoice_number;
		}

		public function set_invoice_number($invoice_number){
			$this->invoice_number = $invoice_number;
		}

		public function get_order_number(){
			return $this->order_number;
		}

		public function set_order_number($order_number){
			$this->order_number = $order_number;
		}

		public function get_cost(){
			return $this->cost;
		}

		public function set_cost($cost){
			$this->cost = $cost;
		}

		public function get_cost_shipping(){
			return $this->cost_shipping;
		}

		public function set_cost_shipping($cost_shipping){
			$this->cost_shipping = $cost_shipping;
		}

		public function get_cost_tax(){
			return $this->cost_tax;
		}

		public function set_cost_tax($cost_tax){
			$this->cost_tax = $cost_tax;
		}

		public function get_ordered_by(){
			return $this->ordered_by;
		}

		public function set_ordered_by($ordered_by){
			$this->ordered_by = $ordered_by;
		}

		public function get_vendor_name(){
			return $this->vendor_name;
		}

		public function set_vendor_name($vendor_name){
			$this->vendor_name = $vendor_name;
		}

		public function get_price(){
			return $this->price;
		}

		public function set_price($price){
			$this->price = $price;
		}

		public function get_price_shipping(){
			return $this->price_shipping;
		}

		public function set_price_shipping($price_shipping){
			$this->price_shipping = $price_shipping;
		}

		public function get_price_tax(){
			return $this->price_tax;
		}

		public function set_price_tax($price_tax){
			$this->price_tax = $price_tax;
		}

		public function get_notes(){
			return $this->notes;
		}

		public function set_notes($notes){
			$this->notes = $notes;
		}

		public function get_modified(){
			return $this->modified;
		}

		public function set_modified($modified){
			$this->modified = $modified;
		}

		public function get_submitted(){
			return $this->submitted;
		}

		public function set_submitted($submitted){
			$this->submitted = $submitted;
		}
		
}