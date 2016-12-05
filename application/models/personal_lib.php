<?php
	class personal_lib extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function fetch_book(){
			$query = $this->db->get('book');
			return $query->result_array();	
		}
		
		public function fetch_user(){
			$query = $this->db->get('user');
			return $query->result_array();
		}

		public function book_detail($id) {
			$sql ="SELECT * FROM book WHERE book_id = $id";
			$query = $this->db->query($sql);
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function book_review($id){
			$sql ="SELECT * FROM review WHERE book_id = $id";
			$query = $this->db->query($sql);	
			return $query->result();
		}

		public function getUsernameId($username){
			$sql = "SELECT * FROM user WHERE username = '$username'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->user_id;
		
		}

		public function getBookId($title){
			$sql = "SELECT * FROM book WHERE title = '$title'";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row->book_id;
		}	

		public function login_admin($username,$password){
			$sql = "SELECT * from user WHERE username = '$username' and password='$password' and role='admin'";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}

		public function login_non_admin($username,$password){
			$sql = "SELECT * from user WHERE username = '$username' and password='$password'";
			$query = $this->db->query($sql);
			return $query->num_rows();	
		}

		public function checkBookNameExist($title){
			$sql = "SELECT * FROM book WHERE title = '$title'";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}

		public function insert_book($data){
			$this->db->insert('book',$data);
		}
		public function insert_review($data){
			$this->db->insert('review',$data);
		}

		public function fetch_loan($user_id){
			$sql = "SELECT * FROM loan WHERE user_id='$user_id'";
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function book_return($book_id){
			$this->db->where('book_id',$book_id);
			$this->db->delete('loan');
		}

		public function book_delete($book_id){
			$this->db->where('book_id',$book_id);
			$this->db->delete('book');
		}

		public function book_increment($book_id){
			$sql = "UPDATE book SET quantity=quantity+1 WHERE book_id='$book_id'";
			$this->db->query($sql);
		}

		public function book_increment_by_name($title,$quantity){
			$sql = "UPDATE book SET quantity=quantity+$quantity WHERE title='$title'";
			$this->db->query($sql);
		}
		
		public function book_decrement($book_id){
			$sql = "UPDATE book SET quantity=quantity-1 WHERE book_id='$book_id'";
			$this->db->query($sql);
		}

		public function pinjam($data){
			$this->db->insert('loan',$data);
		}

		public function loanExist($book_id, $user_id){
			$sql = "SELECT * FROM loan WHERE book_id = '$book_id' and user_id = '$user_id' ";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}
	}