<?php

	/*
	 * dao.script.php
	 * Author: Michael Langlais
	 * This is the Repair Script Data Access Object class to handle data operations
	 *
	 */
	
	class ScriptDAO {
	
		public function get_all_scripts() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM repair_scripts';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the script_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$script_array = array();
			
				while($row = $result->fetchRow()) {
			
					$script_row = new Script;
					$script_row->set_script_id($row[0]);
					$script_row->set_script_name($row[1]);
					$script_row->set_script_description($row[2]);
					$script_row->set_script_filename($row[3]);
					$script_row->set_script_status($row[4]);
					
					// add the current script object to its respective index in the array
					$script_array[$counter] = $script_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Scripts
			return $script_array;
		
		} // end function get_all_scripts
		
		public function get_all_active_scripts() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM repair_scripts WHERE repair_script_status = "active"';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the script_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$script_array = array();
			
				while($row = $result->fetchRow()) {
			
					$script_row = new Script;
					$script_row->set_script_id($row[0]);
					$script_row->set_script_name($row[1]);
					$script_row->set_script_description($row[2]);
					$script_row->set_script_filename($row[3]);
					$script_row->set_script_status($row[4]);
					
					// add the current script object to its respective index in the array
					$script_array[$counter] = $script_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Scripts
			return $script_array;
		
		} // end function get_all_active scripts
		
		public function get_script_by_script_id($id) {
		
			global $db;
			$script = new Script;
			$connection_string = 'SELECT * FROM repair_scripts WHERE repair_script_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$script->set_script_id($row[0]);
					$script->set_script_name($row[1]);
					$script->set_script_description($row[2]);
					$script->set_script_filename($row[3]);
					$script->set_script_status($row[4]);
				
				}
				
			}
			
			return $script;
		
		} // end function get_script_by_script_id
		
		public function add_new_script($name, $description, $filename, $status, $modified, $submitted) {
		
			global $db;
		
			$connection_string = 'INSERT INTO repair_scripts (repair_script_name, repair_script_description, repair_script_filename, repair_script_status, submitted, modified) VALUES (' . 
				$db->quote($name, 'text') . ', ' . $db->quote($description, 'text') . ', ' . $db->quote($filename, 'text') . ', ' . $db->quote($status, 'text') . 
				', ' . $db->quote($modified, 'timestamp') . ', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_script
		
		public function update_script_by_script_id($name, $description, $status, $modified, $id) {
		
			global $db;	
		
			$connection_string = 'UPDATE repair_scripts SET repair_script_name = ' . $db->quote($name, 'text') . ', repair_script_description = ' . 
					$db->quote($description, 'text') . ', repair_script_status = ' . $db->quote($status, 'text') . 
					', modified = ' . $db->quote($modified, 'timestamp') . ' WHERE repair_script_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function update_script_by_script_id
		
		public function delete_script_by_script_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM repair_scripts WHERE repair_script_id = ' . $db->quote($id, 'integer');
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_script_by_script_id
		
		public function upload_script($filename) {
		
			
		
		} // end function upload_script
		
	}
	
?>