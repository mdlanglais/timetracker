<?php

	/*
	 * class.timetrack.php
	 * Author: Michael Langlais
	 *
	 */

	class Timetrack {
	 
		/* Timetrack class properties */
		private $timetrack_id;
		private $project_id;
		private $task_id;
		private $employee_id;
		private $start_time;
		private $end_time;
		private $notes;
		private $submitted;
		private $modified;
		
		/* Timetrack class functions */
		public function get_id() {
			return $this->timetrack_id;
		}
		
		public function set_id($timetrack_id) {
			$this->timetrack_id = $timetrack_id;
		}
		
		public function get_project_id(){
			return $this->project_id;
		}

		public function set_project_id($project_id){
			$this->project_id = $project_id;
		}

		public function get_task_id(){
			return $this->task_id;
		}

		public function set_task_id($task_id){
			$this->task_id = $task_id;
		}

		public function get_employee_id(){
			return $this->employee_id;
		}

		public function set_employee_id($employee_id){
			$this->employee_id = $employee_id;
		}

		public function get_start_time(){
			return $this->start_time;
		}

		public function set_start_time($start_time){
			$this->start_time = $start_time;
		}

		public function get_end_time(){
			return $this->end_time;
		}

		public function set_end_time($end_time){
			$this->end_time = $end_time;
		}

		public function get_notes(){
			return $this->notes;
		}

		public function set_notes($notes){
			$this->notes = $notes;
		}

		public function get_submitted(){
			return $this->submitted;
		}

		public function set_submitted($submitted){
			$this->submitted = $submitted;
		}

		public function get_modified(){
			return $this->modified;
		}

		public function set_modified($modified){
			$this->modified = $modified;
		}
		
	}

?>