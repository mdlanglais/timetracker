<?php

	/*
	 * class.project.php
	 * Author: Michael Langlais
	 *
	 */

	class Project {
	 
		/* Project class properties */
		private $project_id;
		private $client_id;
		private $project_name;
		private $description;
		private $start_date;
		private $end_date;
		private $due_date;
		private $on_hold;
		private $submitted;
		private $modified;
		
		/* Project class functions */
		public function get_id() {
			return $this->project_id;
		}
		
		public function set_id($project_id) {
			$this->project_id = $project_id;
		}
		
		public function get_client_id(){
			return $this->client_id;
		}

		public function set_client_id($client_id){
			$this->client_id = $client_id;
		}

		public function get_project_name(){
			return $this->project_name;
		}

		public function set_project_name($project_name){
			$this->project_name = $project_name;
		}

		public function get_description(){
			return $this->description;
		}

		public function set_description($description){
			$this->description = $description;
		}

		public function get_start_date(){
			return $this->start_date;
		}

		public function set_start_date($start_date){
			$this->start_date = $start_date;
		}

		public function get_end_date(){
			return $this->end_date;
		}

		public function set_end_date($end_date){
			$this->end_date = $end_date;
		}

		public function get_due_date(){
			return $this->due_date;
		}

		public function set_due_date($due_date){
			$this->due_date = $due_date;
		}

		public function get_on_hold(){
			return $this->on_hold;
		}

		public function set_on_hold($on_hold){
			$this->on_hold = $on_hold;
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