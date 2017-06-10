<?php

	/*
	 * dao.project.php
	 * Author: Michael Langlais
	 * This is the Project Data Access Object class to handle data operations
	 *
	 */
	
	class ProjectDAO {
	
		public function get_all_projects() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM projects';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the project_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$project_array = array();
			
				while($row = $result->fetchRow()) {
			
					$project_row = new Project;
					$project_row->set_id($row[0]);
					$project_row->set_client_id($row[1]);
					$project_row->set_project_name($row[2]);
					$project_row->set_description($row[3]);
					$project_row->set_start_date($row[4]);
					$project_row->set_end_date($row[5]);
					$project_row->set_due_date($row[6]);
					$project_row->set_on_hold($row[7]);
					
					// add the current project object to its respective index in the array
					$project_array[$counter] = $project_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Projects
			return $project_array;
		
		} // end function get_all_projects
		
		public function get_project_by_project_id($id) {
		
			global $db;
			$project = new Project;
			$connection_string = 'SELECT * FROM project WHERE project_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$project->set_id($row[0]);
					$project->set_client_id($row[1]);
					$project->set_project_name($row[2]);
					$project->set_description($row[3]);
					$project->set_start_date($row[4]);
					$project->set_end_date($row[5]);
					$project->set_due_date($row[6]);
					$project->set_on_hold($row[7]);
				
				}
				
			}
			
			return $project;
		
		} // end function get_project_by_project_id
		
		public function get_projects_by_client_id($id) {
		
			global $db;
			$connection_string = 'SELECT * FROM project WHERE client_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the project_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$project_array = array();
			
				while($row = $result->fetchRow()) {
			
					$project_row = new Project;
					$project_row->set_id($row[0]);
					$project_row->set_client_id($row[1]);
					$project_row->set_project_name($row[2]);
					$project_row->set_description($row[3]);
					$project_row->set_start_date($row[4]);
					$project_row->set_end_date($row[5]);
					$project_row->set_due_date($row[6]);
					$project_row->set_on_hold($row[7]);
					
					// add the current employee object to its respective index in the array
					$project_array[$counter] = $project_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Projects
			return $project_array;
		
		} // end function get_projects_by_client_id
		
		public function add_new_project($client_id, $name, $description, $start_date, $end_date, $due_date, $on_hold, $modified, $submitted) {
		
			global $db;
		
			$connection_string = 'INSERT INTO projects (client_id, project_name, description, start_date, end_date, due_date, on_hold, submitted, modified) VALUES (' . 
				$db->quote($client_id, 'integer') . ', ' . $db->quote($name, 'text') . ', ' . $db->quote($description, 'text') . ', ' . $db->quote($start_date, 'date') . ', ' . 
				$db->quote($end_date, 'date') . ', ' . $db->quote($due_date, 'date') . ', ' . $db->quote($on_hold, 'integer') . ', ' . $db->quote($submitted, 'date') . ', ' . 
				$db->quote($modified, 'timestamp') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_project
		
		public function update_project_by_project_id($client_id, $name, $description, $start_date, $end_date, $due_date, $on_hold, $modified, $id) {
		
			global $db;	
		
			$connection_string = 'UPDATE projects SET client_id = ' . $db->quote($client_id, 'integer') . ', project_name = ' . $db->quote($name, 'text') . ', description = ' . 
					$db->quote($description, 'text') . ', start_date = ' . $db->quote($start_date, 'date') . ', end_date = ' . $db->quote($end_date, 'date') . 
					', due_date = ' . $db->quote($due_date, 'date') . ', on_hold = ' . $db->quote($on_hold, 'integer') . ', modified = ' . $db->quote($modified, 'timestamp') . 
					' WHERE project_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function update_project_by_project_id
		
		public function delete_project_by_project_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM projects WHERE project_id = ' . $db->quote($id, 'integer');
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_project_by_project_id
		
	}
	
?>