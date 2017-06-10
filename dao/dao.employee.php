<?php 

	/*
	 * dao.employee.php
	 * Author: Michael Langlais
	 * This is the Employee Data Access Object class to handle data operations
	 *
	 */
	
	class EmployeeDAO {
	
		// returns the entire employees result set from the database in the form of an Employees array
		public function get_all_employees() {
			
			global $db;
			
			$connection_string = 'SELECT * FROM employees';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the employee_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$employee_array = array();
			
				while($row = $result->fetchRow()) {
			
					$employee_row = new Employee;
					$employee_row->set_id($row[0]);
					$employee_row->set_username($row[1]);
					$employee_row->set_active($row[3]);
					$employee_row->set_first_name($row[4]);
					$employee_row->set_last_name($row[5]);
					$employee_row->set_address($row[6]);
					$employee_row->set_city($row[7]);
					$employee_row->set_state($row[8]);
					$employee_row->set_zip($row[9]);
					$employee_row->set_primary_phone($row[10]);
					$employee_row->set_cell_phone($row[11]);
					$employee_row->set_email($row[12]);
					$employee_row->set_contact_method($row[13]);
					$employee_row->set_notes($row[14]);
					$employee_row->set_status($row[15]);
					
					// add the current employee object to its respective index in the array
					$employee_array[$counter] = $employee_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Employees
			return $employee_array;
			
		} // end function get_all_employees
		
		// returns a single employee from the database by employee_id
		public function get_employee_by_employee_id($id) {
		
			global $db;
			$employee = new Employee;
			$connection_string = 'SELECT * FROM employees WHERE employee_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
						$employee->set_id($row[0]);
						$employee->set_username($row[1]);
						$employee->set_active($row[3]);
						$employee->set_first_name($row[4]);
						$employee->set_last_name($row[5]);
						$employee->set_address($row[6]);
						$employee->set_city($row[7]);
						$employee->set_state($row[8]);
						$employee->set_zip($row[9]);
						$employee->set_primary_phone($row[10]);
						$employee->set_cell_phone($row[11]);
						$employee->set_email($row[12]);
						$employee->set_contact_method($row[13]);
						$employee->set_notes($row[14]);
						$employee->set_status($row[15]);
						$employee->set_security_level($row[16]);
				
				}
				
			}
			
			return $employee;
		
		} // end function get_employee_by_employee_id
		
		public function get_employee_id_by_name($first_name, $last_name) {
		
			global $db;
			$employee = new Employee;
			$connection_string = 'SELECT employee_id FROM employees WHERE first_name = ' . $db->quote($first_name, 'text') . ' AND last_name = ' . $db->quote($last_name, 'text');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
						$employee->set_id($row[0]);
						$employee_id = $employee->get_id();
				
				}
				
			}
			
			return $employee_id;
		
		} // end function get_employee_id_by_name
		
		// adds a single new employee to the database, taking required properties as arguments
		public function add_new_employee($username, $new_password, $first_name, $last_name, $address, $city, $state, $zip, $phone, $cell, $email, 
			$contact_method, $notes, $status, $modified, $submitted) {
		
			global $db;	
		
			$connection_string = 'INSERT INTO employees (username, password, first_name, last_name, address, city, state, zip, primary_phone, cell_phone, email, 
					contact_method, notes, status, modified, submitted) VALUES (' . $db->quote($username, 'text') . ', ' . $db->quote(password_hash($new_password), 'text') . 
					', ' . $db->quote($first_name, 'text') . ', ' . $db->quote($last_name, 'text') . ', ' . $db->quote($address, 'text') . ', ' . $db->quote($city, 'text') . 
					', ' . $db->quote($state, 'text') . ', ' . $db->quote($zip,  'integer') . ', ' . $db->quote($phone, 'text') . ', ' . $db->quote($cell, 'text') . 
					', ' . $db->quote($email, 'text') . ', ' . $db->quote($contact_method, 'text') . ', ' . $db->quote($notes, 'text') . ', ' . $db->quote($status, 'text') . 
					', ' . $db->quote($modified, 'timestamp') . ', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_employee
		
		// updates a single employee record in the database based on $id argument, taking required properties
		public function update_employee_by_employee_id($username, $first_name, $last_name, $address, $city, $state, $zip, $phone, $cell, $email, 
			$contact_method, $notes, $status, $sec_level, $modified, $id) {
		
			global $db;	
		
			$connection_string = 'UPDATE employees SET username = ' . $db->quote($username, 'text') . ', first_name = ' . $db->quote($first_name, 'text') . ', last_name = ' . 
					$db->quote($last_name, 'text') . ', address = ' . $db->quote($address, 'text') . ', city = ' . $db->quote($city, 'text') . ', state = ' . $db->quote($state, 'text') . ', zip = ' . 
					$db->quote($zip, 'integer') . ', primary_phone = ' . $db->quote($phone, 'text') . ', cell_phone = ' . $db->quote($cell, 'text') . ', email = ' . $db->quote($email, 'text') . ', contact_method = ' . 
					$db->quote($contact_method, 'text') . ', notes = ' . $db->quote($notes, 'text') . ', status = ' . $db->quote($status, 'text') . ', security_level = ' . $db->quote($sec_level, 'integer') . '
					, modified = ' . $db->quote($modified, 'timestamp') . ' WHERE employee_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function update_employee_by_employee_id
		
		// deletes a single employee from the database, taking employee id as the single argument
		public function delete_employee_by_employee_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM employees WHERE employee_id = ' . $db->quote($id, 'integer');
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_employee_by_employee_id
	
	}

?>