<?php 

	/*
	 * dao.client.php
	 * Author: Michael Langlais
	 * This is the Client's Data Access Object class to handle data operations
	 *
	 */

	class ClientDAO {
	
		// returns the entire clients result set from the database in the form of a Clients array
		public function get_all_clients() {
			
			global $db;
			
			$connection_string = 'SELECT * FROM clients';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the client_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$client_array = array();
			
				while($row = $result->fetchRow()) {
			
					$client_row = new Client;
					$client_row->set_id($row[0]);
					$client_row->set_name($row[1]);
					$client_row->set_client_type($row[2]);
					$client_row->set_phone($row[3]);
					$client_row->set_status($row[4]);
					$client_row->set_notes($row[5]);
					$client_row->set_account_rep($row[6]);
					
					// add the current client object to its respective index in the array
					$client_array[$counter] = $client_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Clients
			return $client_array;
			
		} // end function get_all_clients
		
		// returns a single client from the database by client_id
		public function get_client_by_client_id($id) {
		
			global $db;
			$client = new Client;
			$connection_string = 'SELECT * FROM clients WHERE client_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$client->set_id($row[0]);
					$client->set_name($row[1]);
					$client->set_client_type($row[2]);
					$client->set_phone($row[3]);
					$client->set_status($row[4]);
					$client->set_notes($row[5]);
					$client->set_account_rep($row[6]);
				
				}
				
			}
			
			return $client;
		
		} // end function get_client_by_client_id
		
		public function get_client_id_by_name($name) {
		
			global $db;
			$client = new Client;
			$connection_string = 'SELECT client_id FROM clients WHERE client_name = ' . $db->quote($name, 'text');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$client->set_id($row[0]);
					$client_id = $client->get_id();
				
				}
				
			}
			
			return $client_id;
		
		} // end function get_client_id_by_name
		
		// this function returns an array of client objects associated with an employee id
		public function get_clients_by_employee_id($id) {
		
			global $db;
			
			$connection_string = 'SELECT * FROM clients WHERE account_rep = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the client_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$client_array = array();
			
				while($row = $result->fetchRow()) {
			
					$client_row = new Client;
					$client_row->set_id($row[0]);
					$client_row->set_name($row[1]);
					$client_row->set_client_type($row[2]);
					$client_row->set_phone($row[3]);
					$client_row->set_status($row[4]);
					$client_row->set_notes($row[5]);
					$client_row->set_account_rep($row[6]);
					
					// add the current client object to its respective index in the array
					$client_array[$counter] = $client_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Clients
			return $client_array;
		
		} // end function get_clients_by_employee_id
		
		// adds a single new client to the database, taking required properties as arguments
		public function add_new_client($name, $type, $phone, $status, $notes, $account_rep, $modified, $submitted) {
		
			global $db;	
		
			$connection_string = 'INSERT INTO clients (client_name, client_type, phone, status, notes, account_rep, modified, submitted) VALUES (' . $db->quote($name, 'text') . 
						', ' . $db->quote($type, 'text') . ', ' . $db->quote($phone, 'text') . ', ' . $db->quote($status, 'text') . ', ' . $db->quote($notes, 'text') . 
						', ' . $db->quote($account_rep, 'integer') . ', ' . $db->quote($modified, 'timestamp') . ', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_client
		
		// updates a single client record in the database based on $id argument, taking required properties
		public function update_client_by_client_id($name, $type, $phone, $status, $notes, $account_rep, $modified, $id) {
		
			global $db;	
	
			$connection_string = 'UPDATE clients SET client_name = ' . $db->quote($name, 'text') . ', client_type = ' . $db->quote($type, 'text') . 
					', phone = ' . $db->quote($phone, 'text') . ', status = ' . $db->quote($status, 'text') . ', notes = ' . $db->quote($notes, 'text') . 
					', account_rep = ' . $db->quote($account_rep, 'integer') . ' WHERE client_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return false;
				
			} else {
			
				return;
				
			}
		
		} // end function update_client
		
		// deletes a single client from the database, taking client id as the single argument
		public function delete_client_by_client_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM clients WHERE client_id = ' . $db->quote($id, 'integer');
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_client_by_client_id
	
	}

?>