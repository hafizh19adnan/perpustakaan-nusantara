<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

class Library extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('personal_lib');
		$this->load->helper('url_helper');
	}
	
	public function logout(){
		session_destroy();
		header("location: index");
	}
	public function login(){
		
		if($_POST['username']!== null &&$_POST['password']!=null){

			$username = $_POST['username'];
			$password = $_POST['password'];

			$admin_row = $this->personal_lib->login_admin($username,$password);
			$user_row = $this->personal_lib->login_non_admin($username,$password);
			$user_id = $this->personal_lib->getUsernameId($username);
			
			if($admin_row==1){
				$_SESSION['user_id']= $user_id;
				$_SESSION['username'] = $username;
				header("location: admin");
			}else if($user_row==1){
				$_SESSION['user_id']= $user_id;
				$_SESSION['username'] = $username;
				header("location: user");
				
			}else{
				$_SESSION['message'] = "Login gagal. Harap Coba Lagi";
				header("location: index");
			}
		}else{
			$_SESSION['message']="Harap login terlebih dahulu";;
			header("location: index");
		}
		
	}

	public function index(){
		$this->load->helper('url');
		if(isset($_SESSION['username'])){
			if($_SESSION['username']==='admin'||$_SESSION['username']==='owner'){
				header("location:library/index_admin");
			}else{
				header("location:library/index_user");
			}
		}else{
			$this->load->helper('url');
			$data['book'] = $this->personal_lib->fetch_book();
			$this->load->view("header");
			$this->load->view("navbar-default");
			$this->load->view("home",$data);
			$this->load->view("footer");	
		}
	}

	public function detail($id){
		$this->load->helper('url');
		$data['buku'] = $this->personal_lib->book_detail($id);
		$data['review']=$this->personal_lib->book_review($id);
		$data['user']=$this->personal_lib->fetch_user();
		$this->load->view('header');
		if(isset($_SESSION['username'])){		
			if($_SESSION['username']==='admin'||$_SESSION['username']==='owner'){
				$this->load->view("navbar-auth");
				$this->load->view('detail-admin',$data);
			}else{
				$this->load->view("navbar-auth");
				$this->load->view('detail-auth',$data);
			}	
			
		}else{
			$this->load->view("navbar-default");
			$this->load->view('detail',$data);		
		}
		$this->load->view('footer');

	}

	public function index_user(){
		$this->load->helper('url');
		$data['book'] = $this->personal_lib->fetch_book();
		$data['loan'] = $this->personal_lib->fetch_loan($_SESSION['user_id']);
 		$this->load->view("header");
 		$this->load->view("navbar-auth");
		$this->load->view("home-user",$data);
		$this->load->view("footer");
	}
	public function index_admin(){
		$this->load->helper('url');
		$data['book'] = $this->personal_lib->fetch_book();
		$this->load->view("header");
		$this->load->view("navbar-auth");
		$this->load->view("home-admin",$data);
		$this->load->view("footer");
	}
	public function insertBook(){
		$data = array(
				'img_path' =>$this->input->post('img_src'),
				'title' => $this->input->post('title'),
				'author' => $this->input->post('author'),
				'publisher' => $this->input->post('publisher'),
				'description' => $this->input->post('deskripsi'),
				'quantity' => $this->input->post('quantity')
				);
		$bookName = $_POST['title'];
		$quantity = $_POST['quantity'];
		$bookExist = $this->personal_lib->checkBookNameExist($bookName);
		$_SESSION['message'] = "Buku berhasil ditambahkan";
		if($bookExist>0){
			$this->personal_lib->book_increment_by_name($bookName,$quantity);
		}else{
			$this->personal_lib->insert_book($data);
		}
		$bookId = $this->personal_lib->getBookId($bookName);
		
		header("location:detail/$bookId");
	}

	public function insertReview($book_id){
		$this->load->helper('url');
		$data = array(
				'book_id' =>$book_id,
				'user_id' => $_SESSION['user_id'],
				'date' => date('y-m-d'),
				'content' => $this->input->post('message')
				
		);
		
		$this->personal_lib->insert_review($data);
		$_SESSION['message'] = "Review berhasil ditambahkan";
	
		header("location:../detail/$book_id");
	}
	public function returnbook($book_id){
		$this->load->helper('url');
		$this->personal_lib->book_return($book_id);
		$this->personal_lib->book_increment($book_id);
		$_SESSION['message']="Buku berhasil dikembalikan";
		header('location:../index_user');
	}

	public function deletebook($book_id){
		$this->load->helper('url');
		$this->personal_lib->book_delete($book_id);	
		$_SESSION['message'] ="Buku berhasil dihapus";
		header('location:../index_admin');
	
	}

	public function pinjam($book_id){
		$this->load->helper('url');
		$data = array(
				'book_id' => $book_id,
				'user_id' => $_SESSION['user_id']		
		);
		$user_id = $_SESSION['user_id'];
		$rowLoan = $this->personal_lib->loanExist($book_id, $user_id);
		if($rowLoan>0){
			$_SESSION['message']="Maaf. Buku telah dipinjam sebelumnya";
		}else{
			$this->personal_lib->pinjam($data);
			$this->personal_lib->book_decrement($book_id);
			$_SESSION['message']="Buku berhasil dipinjam";
			
		}
		header('location:../index_user');
	}
}