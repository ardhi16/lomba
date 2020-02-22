<?php
curl_init('https://stackoverflow.com/questions/27844347/multiple-checkboxes-used-for-search-in-php-and-mysql');
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if ($basename == null || $basename == 'insert' || $basename == 'index') {
		// $this->load->view('admin/navbar');
		// }
		session_start();
		ob_start();
		$this->load->view('css');
		$this->load->model('AdminModel');
		// debug($_SESSION);
		// debug($_SESSION);
	}
	function index()
	{
		$data['title'] = 'Beranda';
		$data['main'] = 'admin/index';
		$this->load->view('admin/layout', $data);
		if (empty($_SESSION)) {
			redirect('admin/login');
		}


		// $tampil['hasil'] = $this->db->query("SELECT * from produk")->result();
		// $tampil['judul'] = 'Admin';
		// $tampil['main'] = 'admin/index';
		// $this->load->view('admin/layout', $tampil);
		// echo base_url();
	}
	function update_user($id){
		$this->AdminModel->update_user($id);
	}
	function insertku()
	{
		$this->AdminModel->entry_produk();
		// echo 'insertku';
	}
	function insert()
	{
		$this->load->view('admin/insert');
	}
	function edit($param)
	{
		$query['result'] = $this->db->query("SELECT * from produk where id_produk='$param'")->row();
		$this->load->view('admin/edit', $query);
	}
	function update($id)
	{
		$this->AdminModel->update($id);
	}
	function produk()
	{
		$tampil['hasil'] = $this->db->query("SELECT * from produk")->result();
		$tampil['judul'] = 'Index';
		$tampil['main'] = "admin/produk";
		$this->load->view('admin/layout', $tampil);
	}
	function kategori()
	{
		$tampil['judul'] = 'Kategori';
		$tampil['main'] = 'admin/kategori';
		$this->load->view('admin/layout', $tampil);
	}

	function pengguna()
	{
		// $id_user = $this->db->get('user', 'id_user')->row_array();
		$tampil['users'] = $this->db->get('user')->result_array();
		$tampil['judul'] = 'Pengguna';
		$tampil['main'] = 'admin/pengguna';
		$this->load->view('admin/layout', $tampil);
	}
	function ubah_pengguna($id_user)
	{
		$query = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['level'] = $this->input->post('level');
		$this->db->update('user', $data, ['id_user' => $id_user]);
		$data['title'] = 'Edit';
		$this->load->view('admin/ubah_pengguna', $data);
	}

	function hapus_pengguna($id_user)	
	{
		$data = $this->db->query("SELECT * FROM user where id_user='$id_user'")->row();
		unlink(base_url('assets/img/user/'.$data->foto_user));
		$this->db->delete('user', ['id_user' => $id_user]);
		$this->db->delete('komentar', ['id_user' => $id_user]);
		$this->db->delete('invoice', ['id_user' => $id_user]);
		$this->db->delete('keranjang', ['id_user' => $id_user]);
		redirect('admin/pengguna');
	}

	//batas pengguna

	function register()
	{
		// $id = uniqid();
		// if($_POST){
		// 	$data['id_user'] = $id;
		// 	$data['username'] = $this->input->post('username');
		// 	$data['display'] = $this->input->post('display');
		// 	$data['password'] = $this->input->post('password');
		// 	$data['level'] = 'admin';
		// 	$data['no_telpon'] = $this->input->post('no_telpon');
		// 	$data['email'] = $this->input->post('email');
		// 	// $this->db->insert('user', $data, ['id_user' => $id_user]);
		// 	redirect('admin/login');
		// }else{
		// $id_user = $this->db->get('user');
		$this->load->view('admin/register');
		// }
	}
	function registerku()
	{
		$this->AdminModel->register();
	}
	function delete($id)
	{
		$query = $this->db->query("SELECT * from produk where id_produk='$id'");
		$data = $query->row();
		unlink(base_url('assets/img/' . $data->foto));
		$this->db->query("DELETE FROM produk where id_produk='$id'");
		redirect('admin/produk');
	}
	function login()
	{
		$this->load->view('admin/login');
	}
	function loginku()
	{
		$this->AdminModel->login();
	}
}
