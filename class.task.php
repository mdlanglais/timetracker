<?php

	/*
	 * class.task.php
	 * Author: Michael Langlais
	 *
	 */

	class Task {
	 
		/* Task class properties */
		private $id;
		private $task_name;
		private $notes;
		private $due_date;
		private $category;
		private $priority;
		private $customer_id;
		private $employee_id;
		private $complete;
		private $submitted_by;
		private $modified;
		private $submitted;
		
		/* Task class functions */
		public function get_id() {
			return $this->id;
		}
		
		public function set_id($id) {
			$this->id = $id;
		}
		
		public function get_task_name() {
			return $this->task_name;
		}

		public function set_task_name($task_name) {
			$this->task_name = $task_name;
		}

		public function get_notes() {
			return $this->notes;
		}

		public function set_notes($notes) {
			$this->notes = $notes;
		}

		public function get_due_date() {
			return $this->due_date;
		}

		public function set_due_date($due_date) {
			$this->due_date = $due_date;
		}
		
		public function get_category() {
			return $this->category;
		}
		
		public function set_category($category) {
			$this->category = $category;
		}
		
		public function get_priority() {
			return $this->priority;
		}

		public function set_priority($priority) {
			$this->priority = $priority;
		}

		public function get_customer_id() {
			return $this->customer_id;
		}

		public function set_customer_id($customer_id) {
			$this->customer_id = $customer_id;
		}

		public function get_employee_id() {
			return $this->employee_id;
		}

		public function set_employee_id($employee_id) {
			$this->employee_id = $employee_id;
		}
		
		public function get_complete() {
			return $this->complete;
		}
		
		public function set_complete($complete) {
			$this->complete = $complete;
		}

		public function get_submitted_by() {
			return $this->submitted_by;
		}
		
		public function set_submitted_by($submitted_by) {
			$this->submitted_by = $submitted_by;
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
			$str = 'Task: ';
			$str .= $this->task_name . ' | ' . $this->notes . ' | ' . $this->due_date;
			
			return $str;			
			
		}
		
	}

?>