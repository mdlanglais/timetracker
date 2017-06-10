<?php 

	/*
	 * dao.purchase.php
	 * Author: Michael Langlais
	 * This is the Purchase Data Access Object class to handle data operations
	 *
	 */
	
	class PurchaseDAO {
	
		// returns the entire purchases result set from the database in the form of a Purchases array
		public function get_all_purchases() {
			
			global $db;
			
			$connection_string = 'SELECT * FROM purchases ORDER BY date_ordered';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the purchase_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$purchase_array = array();
			
				while($row = $result->fetchRow()) {
			
					$purchase_row = new Purchase;
					$purchase_row->set_id($row[0]);
					$purchase_row->set_submitted_by($row[1]);
					$purchase_row->set_item_title($row[2]);
					$purchase_row->set_product_id($row[3]);
					$purchase_row->set_date_ordered($row[4]);
					$purchase_row->set_date_expected($row[5]);
					$purchase_row->set_date_received($row[6]);
					$purchase_row->set_invoice_number($row[7]);
					$purchase_row->set_order_number($row[8]);
					$purchase_row->set_cost($row[9]);
					$purchase_row->set_cost_shipping($row[10]);
					$purchase_row->set_cost_tax($row[11]);
					$purchase_row->set_ordered_by($row[12]);
					$purchase_row->set_vendor_name($row[13]);
					$purchase_row->set_price($row[14]);
					$purchase_row->set_price_shipping($row[15]);
					$purchase_row->set_price_tax($row[16]);
					$purchase_row->set_notes($row[17]);
					
					// add the current purchase object to its respective index in the array
					$purchase_array[$counter] = $purchase_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Purchases
			return $purchase_array;
			
		} // end function get_all_purchases
		
		// returns a single purchase from the database by purchase_id
		public function get_purchase_by_purchase_id($id) {
		
			global $db;
			$purchase = new Purchase;
			$connection_string = 'SELECT * FROM purchases WHERE purchase_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$purchase->set_id($row[0]);
					$purchase->set_submitted_by($row[1]);
					$purchase->set_item_title($row[2]);
					$purchase->set_product_id($row[3]);
					$purchase->set_date_ordered($row[4]);
					$purchase->set_date_expected($row[5]);
					$purchase->set_date_received($row[6]);
					$purchase->set_invoice_number($row[7]);
					$purchase->set_order_number($row[8]);
					$purchase->set_cost($row[9]);
					$purchase->set_cost_shipping($row[10]);
					$purchase->set_cost_tax($row[11]);
					$purchase->set_ordered_by($row[12]);
					$purchase->set_vendor_name($row[13]);
					$purchase->set_price($row[14]);
					$purchase->set_price_shipping($row[15]);
					$purchase->set_price_tax($row[16]);
					$purchase->set_notes($row[17]);
				
				}
				
			}
			
			return $purchase;
		
		} // end function get_purchase_by_purchase_id
		
		public function get_purchases_by_employee_id($id) {
		
			global $db;
			
			$connection_string = 'SELECT * FROM purchases WHERE ordered_by = ' . $db->quote($id, 'integer') . ' ORDER BY date_ordered ';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the purchase_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$purchase_array = array();
			
				while($row = $result->fetchRow()) {
			
					$purchase_row = new Purchase;
					$purchase_row->set_id($row[0]);
					$purchase_row->set_submitted_by($row[1]);
					$purchase_row->set_item_title($row[2]);
					$purchase_row->set_product_id($row[3]);
					$purchase_row->set_date_ordered($row[4]);
					$purchase_row->set_date_expected($row[5]);
					$purchase_row->set_date_received($row[6]);
					$purchase_row->set_invoice_number($row[7]);
					$purchase_row->set_order_number($row[8]);
					$purchase_row->set_cost($row[9]);
					$purchase_row->set_cost_shipping($row[10]);
					$purchase_row->set_cost_tax($row[11]);
					$purchase_row->set_ordered_by($row[12]);
					$purchase_row->set_vendor_name($row[13]);
					$purchase_row->set_price($row[14]);
					$purchase_row->set_price_shipping($row[15]);
					$purchase_row->set_price_tax($row[16]);
					$purchase_row->set_notes($row[17]);
					
					// add the current purchase object to its respective index in the array
					$purchase_array[$counter] = $purchase_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Purchases
			return $purchase_array;
		
		} // end function get_purchases_by_employee_id
		
		// adds a single new purchase to the database, taking required properties as arguments
		public function add_new_purchase($submitted_by, $item_title, $product_id, $date_ordered, $date_expected, $date_received, $invoice_number, $order_number, $cost,
											$cost_shipping, $cost_tax, $ordered_by, $vendor, $price, $price_shipping, $price_tax, $notes, $modified, $submitted) {
		
			global $db;	
		
			$connection_string = 'INSERT INTO purchases (submitted_by, item_title, product_id, date_ordered, date_expected, date_received, invoice_number, order_number, 
					cost, cost_shipping, cost_tax, ordered_by, vendor_name, price, price_shipping, price_tax, notes, modified, submitted) VALUES (' . $db->quote($submitted_by, 'integer') . 
					', ' . $db->quote($item_title, 'text') . ', ' . $db->quote($product_id, 'text') . ', ' . $db->quote($date_ordered, 'date') . ', ' . $db->quote($date_expected, 'date') . 
					', ' . $db->quote($date_received, 'date') . ', ' . $db->quote($invoice_number, 'text') . ', ' . $db->quote($order_number, 'text') . ', ' . $db->quote($cost, 'text') . 
					', ' . $db->quote($cost_shipping, 'text') . ', ' . $db->quote($cost_tax, 'text') . ', ' . $db->quote($ordered_by, 'integer') . ', ' . $db->quote($vendor, 'text') . 
					', ' . $db->quote($price, 'text') . ', ' . $db->quote($price_shipping, 'text') . ', ' . $db->quote($price_tax, 'text') . ', ' . $db->quote($notes, 'text') . 
					', ' . $db->quote($modified, 'timestamp') . ', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
				
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_purchase
		
		// updates a single purchase record in the database based on $id argument, taking required properties
		public function update_purchase_by_purchase_id($submitted_by, $item_title, $product_id, $date_ordered, $date_expected, $date_received, $invoice_number, $order_number, $cost,
											$cost_shipping, $cost_tax, $ordered_by, $vendor, $price, $price_shipping, $price_tax, $notes, $modified, $id) {
		
			global $db;	
		
			$connection_string = 'UPDATE purchases SET item_title = ' . $db->quote($item_title, 'text') . ', product_id = ' . $db->quote($product_id, 'text') . ', date_ordered = ' . 
					$db->quote($date_ordered, 'date') . ', date_expected = ' . $db->quote($date_expected, 'date') . ', date_received = ' . $db->quote($date_received, 'date') . 
					', invoice_number = ' . $db->quote($invoice_number, 'text') . ', order_number = ' . $db->quote($order_number, 'text') . ', cost = ' . $db->quote($cost, 'text') . 
					', cost_shipping = ' . $db->quote($cost_shipping, 'text') . ', cost_tax = ' . $db->quote($cost_tax, 'text') . ', ordered_by = ' . $db->quote($ordered_by, 'integer') . 
					', vendor_name = ' . $db->quote($vendor, 'text') . ', price = ' . $db->quote($price, 'text') . ', price_shipping = ' . $db->quote($price_shipping, 'text') . 
					', price_tax = ' . $db->quote($price_tax, 'text') . ', notes = ' . $db->quote($notes, 'text') . ', modified = ' . $db->quote($modified, 'timestamp') . 
					' WHERE purchase_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function update_purchase_by_purchase_id
		
		// deletes a single purchase from the database, taking purchase id as the single argument
		public function delete_purchase_by_purchase_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM purchases WHERE purchase_id = "' . $db->quote($id, 'integer') . '"';
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_purchase_by_purchase_id
	
	}

?>