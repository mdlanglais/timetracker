<?php

	/*
	 * class.comment.php
	 * Author: Michael Langlais
	 *
	 */

	class Comment {

		/* Comment class properties */
		private $comment_id;
		private $task_id;
		private $comment;
		private $submitted_by;
		private $submitted;
		
		/* Comment class functions */
		public function get_id() {
			return $this->comment_id;
		}
		
		public function set_id($comment_id) {
			$this->comment_id = $comment_id;
		}
		
		public function get_task_id() {
			return $this->task_id;
		}
		
		public function set_task_id($task_id) {
			$this->task_id = $task_id;
		}
		
		public function get_comment() {
			return $this->comment;
		}

		public function set_comment($comment) {
			$this->comment = $comment;
		}

		public function get_submitted_by() {
			return $this->submitted_by;
		}

		public function set_submitted_by($submitted_by) {
			$this->submitted_by = $submitted_by;
		}
		public function get_submitted() {
			return $this->submitted;
		}

		public function set_submitted($submitted) {
			$this->submitted = $submitted;
		}
		
	}
		
?>