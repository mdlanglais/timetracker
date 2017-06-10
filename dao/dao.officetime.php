<?php

	/*
	 * dao.officetime.php
	 * Author: Michael Langlais
	 * This is the OfficeTime Data Access Object class to handle data operations
	 *
	 */
	
	class OfficetimeDAO {
		
		public function get_all_officetime() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM officetime';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the officetime_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$officetime_array = array();
			
				while($row = $result->fetchRow()) {
			
					$officetime_row = new Officetime;
					$officetime_row->set_officetime_id($row[0]);
					$officetime_row->set_employee_id($row[1]);
					$officetime_row->set_start_time($row[2]);
					$officetime_row->set_end_time($row[3]);
					$officetime_row->set_modified($row[4]);
					$officetime_row->set_submitted($row[5]);
					
					// add the current officetime object to its respective index in the array
					$officetime_array[$counter] = $officetime_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Officetime
			return $officetime_array;
		
		} // end function get_all_officetime
		
	}
	
?>