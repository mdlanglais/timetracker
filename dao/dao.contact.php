<?php 

	/*
	 * dao.contact.php
	 * Author: Michael Langlais
	 * This is the Contact Data Access Object class to handle data operations
	 *
	 */

	class ContactDAO {
	
		// returns the entire contacts result set from the database in the form of a Contacts array
		public function get_all_contacts($id) {
			
			global $db;
			
			$connection_string = 'SELECT * FROM contacts WHERE client_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the contact_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$contact_array = array();
			
				while($row = $result->fetchRow()) {
			
					$contact_row = new Contact;
					$contact_row->set_id($row[0]);
					$contact_row->set_first_name($row[1]);
					$contact_row->set_last_name($row[2]);
					$contact_row->set_address($row[3]);
					$contact_row->set_city($row[4]);
					$contact_row->set_state($row[5]);
					$contact_row->set_zip($row[6]);
					$contact_row->set_primary_phone($row[7]);
					$contact_row->set_email($row[8]);
					$contact_row->set_cell_phone($row[9]);
					$contact_row->set_contact_method($row[10]);
					$contact_row->set_notes($row[11]);
					$contact_row->set_status($row[12]);
					$contact_row->set_client_id($row[13]);
					$contact_row->set_account_rep($row[14]);
					
					// add the current Contact object to its respective index in the array
					$contact_array[$counter] = $contact_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of contacts
			return $contact_array;
			
		} // end function get_all_contacts
		
		// returns a single Contact from the database by contact_id
		public function get_contact_by_contact_id($id) {
		
			global $db;
			$contact = new Contact;
			$connection_string = 'SELECT * FROM contacts WHERE contact_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$contact->set_id($row[0]);
					$contact->set_first_name($row[1]);
					$contact->set_last_name($row[2]);
					$contact->set_address($row[3]);
					$contact->set_city($row[4]);
					$contact->set_state($row[5]);
					$contact->set_zip($row[6]);
					$contact->set_primary_phone($row[7]);
					$contact->set_email($row[8]);
					$contact->set_cell_phone($row[9]);
					$contact->set_contact_method($row[10]);
					$contact->set_notes($row[11]);
					$contact->set_status($row[12]);
					$contact->set_client_id($row[13]);
					$contact->set_account_rep($row[14]);
				
				}
				
			}
			
			return $contact;
		
		} // end function get_contact_by_contact_id
		
		public function get_contact_id_by_name($first_name, $last_name) {
		
			global $db;
			$contact = new Contact;
			$connection_string = 'SELECT contact_id FROM contacts WHERE first_name = ' . $db->quote($first_name, 'text') . ' AND last_name = ' . $db->quote($last_name, 'text');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$contact->set_id($row[0]);
					$contact_id = $contact->get_id();
				
				}
				
			}
			
			return $contact_id;
		
		} // end function get_contact_id_by_name
		
		// adds a single new Contact to the database, taking required properties as arguments
		public function add_new_contact($first_name, $last_name, $address, $city, $state, $zip, $phone, $email, $cell, $contact_method, $notes, $status, $client_id, $account_rep, $modified, 
				$submitted) {
		
			global $db;	
		
			$connection_string = 'INSERT INTO contacts (first_name, last_name, address, city, state, zip, primary_phone, email, work_phone, contact_method, notes, status, client_id, 
					account_rep, submitted) VALUES (' . $db->quote($first_name, 'text') . ', ' . $db->quote($last_name, 'text') . ', ' . $db->quote($address, 'text') . 
					', ' . $db->quote($city, 'text') . ', ' . $db->quote($state, 'text') . ', ' . $db->quote($zip, 'integer') . ', ' . $db->quote($phone, 'text') . 
					', ' . $db->quote($email, 'text') . ', ' . $db->quote($cell, 'text') . ', ' . $db->quote($contact_method, 'text') . ', ' . $db->quote($notes, 'text') . 
					', ' . $db->quote($status, 'text') . ', ' . $db->quote($client_id, 'integer') . ', ' . $db->quote($account_rep, 'integer') . ', ' . $db->quote($modified, 'timestamp') . 
					', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_contact
		
		// updates a single Contact record in the database based on $id argument, taking required properties
		public function update_contact_by_contact_id($first_name, $last_name, $address, $city, $state, $zip, $phone, $email, $cell, $contact_method, $notes, $status, 
				$account_rep, $modified, $id) {
		
			global $db;	
	
			$connection_string = 'UPDATE contacts SET first_name = ' . $db->quote($first_name, 'text') . ', last_name = ' . $db->quote($last_name, 'text') . 
						', address = ' . $db->quote($address, 'text') . ', city = ' . $db->quote($city, 'text') . ', state = ' . $db->quote($state, 'text') . 
						', zip = ' . $db->quote($zip, 'integer') . ', primary_phone = ' . $db->quote($phone, 'text') . ', email = ' . $db->quote($email, 'text') . 
						', work_phone = ' . $db->quote($cell, 'text') . ', contact_method = ' . $db->quote($contact_method, 'text') . ', notes = ' . $db->quote($notes, 'text') . 
						', status = ' . $db->quote($status, 'text') . ', account_rep = ' . $db->quote($account_rep, 'integer') . ' , modified = ' . $db->quote($modified, 'timestamp') . 
						' WHERE contact_id = ' . $db->quote($contact_id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return false;
				
			} else {
			
				return;
				
			}
		
		} // end function update_contact
		
		// deletes a single Contact from the database, taking contact id as the single argument
		public function delete_contact_by_contact_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM contacts WHERE contact_id = ' . $db->quote($id, 'integer');
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_contact_by_contact_id
	
	}

?>