<?php 

	/*
	 * dao.task.php
	 * Author: Michael Langlais
	 * This is the Task Data Access Object class to handle data operations
	 *	It also handles data operations for task comments. There is no dao.comment class
	 */
	
	class TaskDAO {
	
		public function get_all_tasks() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM tasks';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					$task_row->set_submitted($row[10]);
					
					// add the current task object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Tasks
			return $task_array;
		
		} // end function get_all_tasks
		
		public function get_all_incomplete_tasks() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM tasks WHERE complete = 0 ORDER BY due_date';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					$task_row->set_submitted($row[10]);
					
					// add the current task object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Tasks
			return $task_array;
		
		} // end function get_all_incomplete_tasks
		
		public function get_all_completed_tasks() {
		
			global $db;
			
			$connection_string = 'SELECT * FROM tasks WHERE complete = 1 ORDER BY due_date';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					$task_row->set_submitted($row[10]);
					
					// add the current task object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Tasks
			return $task_array;
		
		} // end function get_all_completed_tasks
		
		public function get_task_by_task_id($id) {
		
			global $db;
			$task = new Task;
			$connection_string = 'SELECT * FROM tasks WHERE task_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$task->set_id($row[0]);
					$task->set_task_name($row[1]);
					$task->set_notes($row[2]);
					$task->set_due_date($row[3]);
					$task->set_category($row[4]);
					$task->set_priority($row[5]);
					$task->set_customer_id($row[6]);
					$task->set_employee_id($row[7]);
					$task->set_complete($row[8]);
					$task->set_submitted_by($row[9]);
				
				}

				return $task;
			
			} else return FALSE;
		
		} // end function get_task_by_task_id
		
		public function no_results_found($id) {
		
			$task = $this->get_task_by_task_id($id);
			$task_id = $task->get_id();
			
			if ($task_id == null || empty($task_id)) {
			
				return true;
			
			} else return false;
		
		} // end function no_results_found
	
		// pass either a 1 (complete) or 0 (not complete) to retrieve the result set of either completed or incomplete tasks
		public function get_tasks_by_employee_id($id, $complete) {
		
			global $db;
			
			// set the default time zone and get current time in $now variable
			date_default_timezone_set('America/Thunder Bay');
			
			$now = date("Y-m-d");
			
			$connection_string = 'SELECT * FROM tasks WHERE employee_id = ' . $db->quote($id, 'integer') . ' AND complete = ' . $db->quote($complete, 'integer') .
									' ORDER BY due_date';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					$task_row->set_submitted($row[10]);
					
					// add the current task object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Tasks
			return $task_array;
		
		} // end function get_tasks_by_employee_id
		
		// pass either a 1 (complete) or 0 (not complete) to retrieve the result set of either completed or incomplete tasks
		public function get_tasks_by_client_id($client_id, $employee_id, $complete) {
		
			global $db;
			
			// set the default time zone and get current time in $now variable
			date_default_timezone_set('America/Thunder Bay');
			
			$now = date("Y-m-d");
			
			$connection_string = 'SELECT * FROM tasks WHERE customer_id = ' . $db->quote($client_id, 'integer') . ' AND employee_id = ' . $db->quote($employee_id, 'integer') . 
									' AND complete = ' . $db->quote($complete, 'integer') . ' ORDER BY due_date';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					$task_row->set_submitted($row[10]);
					
					// add the current task object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Tasks
			return $task_array;
		
		} // end function get_tasks_by_client_id
		
		// this function retrieves all incomplete tasks that were submitted by the logged in user
		// it does not retrieve all tasks ASSIGNED to this user, but those this user submitted
		// get_tasks_by_employee_id retrieves all tasks assigned to the user
		public function get_tasks_submitted_by_employee_id($id) {
		
			global $db;
			
			// set the default time zone and get current time in $date variable
			date_default_timezone_set('America/Thunder Bay');
			
			$now = date("Y-m-d");
			
			$connection_string = 'SELECT * FROM tasks WHERE submitted_by = ' . $db->quote($id, 'integer') . ' AND complete = 0 ORDER BY due_date';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					$task_row->set_submitted($row[10]);
					
					// add the current employee object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Employees
			return $task_array;
		
		} // end function get_tasks_submitted_by_employee_id
		
		public function get_completed_tasks_by_employee_id($id) {
		
			global $db;
			
			// set the default time zone and get current time in $date variable
			date_default_timezone_set('America/Thunder Bay');
			
			$now = date("Y-m-d");
			
			$connection_string = 'SELECT * FROM tasks WHERE employee_id = ' . $db->quote($id, 'integer') . ' AND complete = 1 AND due_date < ' . $db->quote($now, 'date') . ' ORDER BY due_date';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the task_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$task_array = array();
			
				while($row = $result->fetchRow()) {
			
					$task_row = new Task;
					$task_row->set_id($row[0]);
					$task_row->set_task_name($row[1]);
					$task_row->set_notes($row[2]);
					$task_row->set_due_date($row[3]);
					$task_row->set_category($row[4]);
					$task_row->set_priority($row[5]);
					$task_row->set_customer_id($row[6]);
					$task_row->set_employee_id($row[7]);
					$task_row->set_complete($row[8]);
					$task_row->set_submitted_by($row[9]);
					
					// add the current employee object to its respective index in the array
					$task_array[$counter] = $task_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of Tasks
			return $task_array;

		} // end function get_completed_tasks_by_employee_id
		
		public function add_new_task($name, $notes, $due_date, $category, $priority, $customer_id, $employee_id, $submitted_by, $modified, $submitted) {
		
			global $db;
		
			$connection_string = 'INSERT INTO tasks (task_name, notes, due_date, category_id, priority_id, customer_id, employee_id, submitted_by, modified, submitted) VALUES (' . $db->quote($name, 'text') . ', ' . 
				$db->quote($notes, 'text') . ', ' . $db->quote($due_date, 'text') . ', ' . $db->quote($category, 'integer') . ', ' . $db->quote($priority, 'integer') . ', ' . $db->quote($customer_id, 'integer') . ', ' . 
				$db->quote($employee_id, 'integer') . ', ' . $db->quote($submitted_by, 'integer') . ', ' . $db->quote($modified, 'timestamp') . ', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_task
		
		public function update_task_by_task_id($task_name, $notes, $due_date, $category, $priority, $customer_id, $employee_id, $modified, $id) {
		
			global $db;	
		
			$connection_string = 'UPDATE tasks SET task_name = ' . $db->quote($task_name, 'text') . ', notes = ' . $db->quote($notes, 'text') . ', due_date = ' . 
					$db->quote($due_date, 'date') . ', category_id = ' . $db->quote($category, 'integer') . ', priority_id = ' . $db->quote($priority, 'integer') . ', customer_id = ' . $db->quote($customer_id, 'integer') . 
					', employee_id = ' . $db->quote($employee_id, 'integer') . ', modified = ' . $db->quote($modified, 'timestamp') . ' WHERE task_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function update_task_by_task_id
		
		public function delete_task_by_task_id($id) {
		
			global $db;
			
			$connection_string = 'DELETE FROM tasks WHERE task_id = ' . $db->quote($id, 'integer');
		
			$result =& $db->exec($connection_string);
		
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function delete_task_by_task_id
		
		public function get_all_priority_levels() {
		
			global $db;
			
			$connection_string = 'SELECT priority_name FROM task_priority';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding results to the priority_levels_array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$priority_levels_array = array();
			
				while($row = $result->fetchRow()) {
			
					// add the current index's result to its respective index in the array
					$priority_levels_array[] = $row[0];
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of priority levels
			return $priority_levels_array;
		
		} // end function get_all_priority_levels
		
		public function get_priority_by_priority_id($id) {
		
			global $db;
			
			$connection_string = 'SELECT priority_name FROM task_priority WHERE priority_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$priority_name = $row[0];
					
				}
				
			}
			
			return $priority_name;
			
		
		} // end function get_priority_by_priority_id
		
		public function get_category_by_category_id($id) {
		
			global $db;
				
			$connection_string = 'SELECT category_name FROM categories WHERE category_id = ' . $db->quote($id, 'integer');
			$result = $db->query($connection_string);
				
			if(PEAR::isError($result)) {
		
				return FALSE;
		
			} else {
					
				$numRows = $result->numRows();
		
			}
		
			if($numRows > 0) {
					
				while($row = $result->fetchRow()) {
		
					$category_name = $row[0];
						
				}
		
			}
				
			return $category_name;
				
		
		} // end function get_category_by_category_id
		
		public function get_task_id_by_name($name) {
		
			global $db;
			
			$connection_string = 'SELECT task_id FROM tasks WHERE task_name = ' . $db->quote($name, 'text');
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
	
			if($numRows > 0) {
			
				while($row = $result->fetchRow()) {
				
					$task_id = $row[0];
					
				}
				
			}
			
			return $task_id;
			
		
		} // end function get_task_id_by_name
		
		public function get_priority_id_by_name($name) {
		
			switch($name) {
			
				case 'Free Time': 
					return 1;
					break;
				case 'Standard':
					return 2;
					break;
				case 'ASAP':
					return 3;
					break;
				case 'Critical':
					return 4;
					break;
			
			}
		
		} // end function get_priority_id_by_name
		
		public function mark_as_complete($id) {
		
			global $db;	
		
			// set the default time zone and get current time in $date variable
			date_default_timezone_set('America/Thunder Bay');
			
			$modified = date("Y-m-d H:i:s");
		
			$connection_string = 'UPDATE tasks SET complete = "1", modified = ' . $db->quote($modified, 'timestamp') . ' WHERE task_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function mark_as_complete
		
		public function mark_as_incomplete($id) {
		
			global $db;	
		
			// set the default time zone and get current time in $date variable
			date_default_timezone_set('America/Thunder Bay');
			
			$modified = date("Y-m-d H:i:s");
		
			$connection_string = 'UPDATE tasks SET complete = "0", modified = ' . $db->quote($modified, 'timestamp') . ' WHERE task_id = ' . $db->quote($id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function mark_as_incomplete
		
		public function add_new_comment($task_id, $comment, $submitted_by, $submitted) {
		
			global $db;
		
			$connection_string = 'INSERT INTO comments (task_id, comment, submitted_by, submitted) VALUES (' . $db->quote($task_id, 'integer') . ', ' . 
				$db->quote($comment, 'text') . ', ' . $db->quote($submitted_by, 'integer') . ', ' . $db->quote($submitted, 'date') . ')';
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
			
				return;
				
			}
		
		} // end function add_new_comment
		
		public function get_comments_by_task_id($id) {
		
			global $db;
			
			$connection_string = 'SELECT * FROM comments WHERE task_id = ' . $db->quote($id, 'integer') . ' ORDER BY submitted DESC';
			$result = $db->query($connection_string);
			
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				$numRows = $result->numRows();
				
			}	
			
			if($numRows > 0) {
			
				// initialize a counter to increment for adding objects to the comment_row array below
				$counter = 0;
				// initialize an array to the number of rows returned
				$comment_array = array();
			
				while($row = $result->fetchRow()) {
			
					$comment_row = new Comment;
					$comment_row->set_id($row[0]);
					$comment_row->set_task_id($row[1]);
					$comment_row->set_comment($row[2]);
					$comment_row->set_submitted_by($row[3]);
					$comment_row->set_submitted($row[4]);
					
					// add the current comment object to its respective index in the array
					$comment_array[$counter] = $comment_row;
					
					// increment the counter
					$counter++;
				
				}
				
			}
			
			// return the array of comments
			return $comment_array;
		
		} // end function get_comments_by_task_id
		
		public function get_commenters_by_task_id($id) {
		
			global $db;
			$connection_string = 'SELECT DISTINCT submitted_by FROM comments WHERE task_id = ' . $id;
			
			$result =& $db->exec($connection_string);
				
			if(PEAR::isError($result)) {
		
				return FALSE;
				
			} else {
			
				if($numRows > 0) {
				
					// initialize a counter to increment for adding objects to the task_row array below
					$counter = 0;
					// initialize an array to the number of rows returned
					$submitted_by_array = array();
				
					while($row = $result->fetchRow()) {
				
						$submitted_by_array[$counter] = $row[0];
						
						// increment the counter
						$counter++;
					
					}
					
				}
				
			}
			
			// return the array of Tasks
			return $submitted_by_array;
		
		} // end function get_commenters_by_task_id
		
		public function add_comment_view($employee_id, $task_id) {
			
			global $db;
			
			$connection_string = 'INSERT INTO comment_views (employee_id, task_id) VALUES (' . $db->quote($employee_id, 'integer') . ', ' .
					$db->quote($task_id, 'integer') . ')';
				
			$result =& $db->exec($connection_string);
				
			if(PEAR::isError($result)) {
					
				return FALSE;
					
			} else {
					
				return;
			
			}
			
		} // end function add_comment_view
		
		public function comments_have_been_viewed($employee_id, $task_id) {
			
			global $db;
				
			$connection_string = 'SELECT * FROM comment_views WHERE employee_id = ' . $employee_id . ' AND task_id = ' . $task_id;
			$result = $db->query($connection_string);
				
			if(PEAR::isError($result)) {
			
				return FALSE;
			
			} else {
					
				$numRows = $result->numRows();
			
			}
				
			if($numRows > 0) {
				
				return true;
				
			} else {
				
				return false;
				
			}
			
		} // end function comments_have_been_viewed
		
		// delete all comments from the comments_viewed table with the given task id to reset everyone's view of the
		// number of comments in the displayed task table. This way whenever a new comment is added, it will show blue for everyone
		public function delete_comment_views($employee_id, $task_id) {
			
			global $db;
				
			$connection_string = 'DELETE FROM comment_views WHERE employee_id != ' . $db->quote($employee_id, 'integer') . 
				' AND task_id = ' . $db->quote($task_id, 'integer');
			
			$result =& $db->exec($connection_string);
			
			if(PEAR::isError($result)) {
					
				return FALSE;
					
			} else {
					
				return;
			
			}
			
		} // end function delete_comment_views
		
	}