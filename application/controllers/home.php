<?php

/**
 * 
 */

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->view('home/navbar');
		// $explode = explode('/',$_SERVER['REQUEST_URI']);
		// debug(array_values($explode));
		// debug($explode);
		session_start();
		ob_start();
		$this->load->view('css');
		$this->load->model('HomeModel');
		// debug($_SESSION);
	}
	function delete_komentar($id_komentar)
	{
		$this->db->query("DELETE * FROM komentar where id_komentar='$id_komentar'");
		// $insert['id_produk'] = $produk->id_produk;
		// $insert['id_user'] = $_SESSION['id_user'];
		// $insert['komentar'] = trim($_POST['komentar']);
		// $this->db->insert('komentar', $insert);
		redirect('home');
	}
	function delete_komentar_etalase($id_komentar)
	{
		$this->db->query("DELETE * FROM komentar where id_komentar='$id_komentar'");
		// $insert['id_produk'] = $produk->id_produk;
		// $insert['id_user'] = $_SESSION['id_user'];
		// $insert['komentar'] = trim($_POST['komentar']);
		// $this->db->insert('komentar', $insert);
		redirect('home/etalase');
	}
	function delete_komentar_keranjang($id_komentar)
	{
		$this->db->query("DELETE * FROM komentar where id_komentar='$id_komentar'");
		// $insert['id_produk'] = $produk->id_produk;
		// $insert['id_user'] = $_SESSION['id_user'];
		// $insert['komentar'] = trim($_POST['komentar']);
		// $this->db->insert('komentar', $insert);
		redirect('home/keranjang');
	}
	function komentar($id_produk)
	{
		$produk = $this->db->query("SELECT * FROM produk where id_produk='$id_produk'")->row();
		$insert['id_komentar'] = uniqid();
		$insert['id_produk'] = $produk->id_produk;
		$insert['id_user'] = $_SESSION['id_user'];
		$insert['komentar'] = trim($_POST['komentar']);
		$this->db->insert('komentar', $insert);
		redirect('home');
	}
	function komentar_etalase($id_produk)
	{
		$produk = $this->db->query("SELECT * FROM produk where id_produk='$id_produk'")->row();
		$insert['id_komentar'] = uniqid();
		$insert['id_produk'] = $produk->id_produk;
		$insert['id_user'] = $_SESSION['id_user'];
		$insert['komentar'] = trim($_POST['komentar']);
		$this->db->insert('komentar', $insert);
		redirect('home/etalase');
	}
	function komentar_keranjang($id_produk)
	{
		$produk = $this->db->query("SELECT * FROM produk where id_produk='$id_produk'")->row();
		$insert['id_komentar'] = uniqid();
		$insert['id_produk'] = $produk->id_produk;
		$insert['id_user'] = $_SESSION['id_user'];
		$insert['komentar'] = trim($_POST['komentar']);
		$this->db->insert('komentar', $insert);
		redirect('home/keranjang');
	}
	function delete_invoice($id_invoice)
	{
		$this->db->query("DELETE from invoice where id_invoice='$id_invoice'");
		redirect('home/invoice');
	}
	public function index()
	{
		// $row_diskon = $this->db->query("SELECT * FROM produk")->row();
		$diskon = $this->db->query("SELECT * from produk order by diskon desc limit 3 ")->result();
		$termurah = $this->db->query("SELECT * from produk order by harga_produk asc limit 3 ")->result();
		$data['diskon'] = $diskon;
		$data['termurah'] = $termurah;
		
		$this->load->view('home/navbar');
		// $server = explode('/',$_SERVER['REQUEST_URI']);
		// debug($server);
		// echo array_column($server,'home');
		$this->load->view('home/index', $data);
	}
	public function etalase()
	{
		$this->load->view('home/navbar');
		// $this->load->view('home/navbar');
		$query = $this->db->get('produk')->result();
		$data['hasil'] = $query;
		$this->load->view('home/etalase', $data);
		return $query;
	}
	public function login()
	{
		$this->load->view('home/navbar');
		$this->load->view('home/login');
	}
	public function login_gagal()
	{
		$data['title'] = 'Login Gagal';
		$this->load->view('home/navbar');
		$this->load->view('home/login_gagal');
	}
	public function loginku()
	{
		$this->HomeModel->login();
	}
	public function register()
	{
		$this->load->view('home/navbar');
		$this->load->view('home/register');
	}
	function profile()
	{
		$tampil['main'] = 'home/profile';
		$tampil['data'] = $this->db->query("SELECT * from user where id_user='" . $_SESSION['id_user'] . "'")->row();
		// $this->HomeModel->update($id);
		$this->load->view('home/navbar', $tampil);
	}
	public function registerku()
	{
		echo "<h2>";
		echo "register berhasil<br>";
		$this->HomeModel->register();
		echo "</h2>";
	}
	public function invoice()
	{
		$tampil['query'] = $this->db->query("SELECT * from invoice inner join user using (id_user) inner join produk using (id_produk) where id_user='" . $_SESSION['id_user'] . "' order by tanggal_transaksi desc ")->result();
		// debug($tampil['query']);
		$this->load->view('home/navbar');
		$this->load->view('home/invoice', $tampil);
	}
	public function invoiceku($id)
	{
		$this->HomeModel->buy($id);
	}
	public function keranjang()
	{
		$this->load->view('home/navbar');
		$tampil['query'] = $this->db->query("SELECT * from keranjang inner join produk using (id_produk) inner join user using (id_user) where id_user='" . $_SESSION['id_user'] . "'")->result();
		// $tampil['query'] = $this->db->query("SELECT * from produk ")->result();
		$this->load->view('home/keranjang', $tampil);
	}
	
	public function keranjangku($id)
	{
		$this->HomeModel->keranjang($id);
	}
	public function hapus_keranjang($id)
	{
		// debug($this->db->query("DELETE from keranjang where id_produk='" . $id . "'"));
		$this->db->delete('keranjang', ['id_produk' => $id]);
		redirect('home/keranjang');
	}
	public function search()
	{
		$this->load->view('home/navbar');
		$keyword = @$_GET['keyword'];
		// debug($keyword);
		$query = $this->db->query("SELECT * from produk where 
		nama_produk like '%$keyword%'");
		$tampil['query'] = $query->result();
		$tampil['affected'] = $query->affected_rows();
		// $data = $this->homeModel->pencarian($keyword);
		
		// debug($tampil['query']);
		// echo uri_string($_SERVER['REQUEST_URI']);
		url_title($_SERVER['REQUEST_URI']);
		$tampil['keyword'] = $keyword;
		$this->load->view('home/pencarian', $tampil);
	}
	public function product($id)
	{
		$query['tampil'] = $this->db->query("SELECT * from produk where id_produk='$id'")->row();
		
		$this->load->view('home/produk');
	}
	
	function tambah_saldo()
	{
		$query = $this->db->query("SELECT * from user where id_user='" . $_SESSION['id_user'] . "'")->row();
		$data['data'] = $query;
		$data['title'] = 'Tambah Saldo';
		$data['main'] = 'home/tambah_saldo';
		$this->load->view('home/navbar', $data);
	}
	function top_up()
	{
		$this->HomeModel->top_up();
	}
	function update_profile()
	{
		$this->HomeModel->update_profile();
	}
	function about(){
		$this->load->view('home/navbar');
		$this->load->view('home/about');
	}
	function print($id)
	{
		$tampil['main'] = 'home/print';
		$tampil['data'] = $this->db->query("SELECT * FROM invoice inner join user using (id_user) inner join produk USING (id_produk) where id_invoice='$id'")->row();
		// debug($tampil['data']);
		$this->load->view('home/navbar', $tampil);
	}
	function saldo_tidak_cukup()
	{
		$query = $this->db->query("SELECT * from user where id_user='" . $_SESSION['id_user'] . "'")->row();
		$data['main'] = 'home/saldo_tidak_cukup';
		$this->load->view('home/navbar', $data);
	}
}
