<?php  

	/*
	 * class.officetime.php
	 * Author: Michael Langlais
	 *
	 */

	class Officetime {
	 
		/* Officetime class properties */
		private $officetime_id;
		private $employee_id;
		private $start_time;
		private $end_time;
		private $submitted;
		private $modified;
		
		/* Officetime class functions */
		public function get_officetime_id() {
			return $this->officetime_id;
		}
		
		public function set_officetime_id($officetime_id) {
			$this->officetime_id = $officetime_id;
		}
		
		public function get_employee_id() {
			return $this->employee_id;
		}
		
		public function set_employee_id($employee_id) {
			$this->employee_id = $employee_id;
		}
		
		public function get_start_time() {
			return $this->start_time;
		}
		
		public function set_start_time($start_time) {
			$this->start_time = $start_time;
		}
		
		public function get_end_time() {
			return $this->end_time;
		}
		
		public function set_end_time($end_time) {
			$this->end_time = $end_time;
		}

		public function get_modified(){
			return $this->modified;
		}

		public function set_modified($modified){
			$this->modified = $modified;
		}
		
		public function get_submitted(){
			return $this->submitted;
		}

		public function set_submitted($submitted){
			$this->submitted = $submitted;
		}
		
	}
		
?>