<?php
class AdminModel extends CI_Model
{
	function entry_produk()
	{
		$id = uniqid();
		// for ($i=0; $i < $count ; $i++) { 

		// 	# code...
		// 	$field['id_produk'] = $id;
		// 	$field['nama_produk'] = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
		// 	$this->db->insert('foto_produk',$field);
		// }
		$config = [
			'allowed_types' => "jpeg|jpg|png",
			'file_ext_tolower' => TRUE,
			'file_name' => $id,
			'upload_path' => './assets/img/',
		];
		$this->load->library('upload', $config);
		// $this->upload->initialize($config);
		$data = [
			'id_produk' => $id,
			'nama_produk' => trim($_POST['nama_produk']),
			'harga_produk' => trim($_POST['harga_produk']),
			'diskon' => trim($_POST['diskon']),
			'quantity' => trim($_POST['quantity']),
			'deskripsi' => trim($_POST['deskripsi']),
			// 'tanggal_tambah' => null,
			'foto' => $config['file_name'] . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
		];
		if (!$this->upload->do_upload('foto')) {
			echo $this->upload->display_errors();
		}
		if (empty($_POST['diskon'])) {
			$data['diskon'] = 0;
			$query = $this->db->insert('produk', html_escape($data), true);
			debug($data);
			debug($query);
			redirect('admin/produk');
		} else {
			$query1 = $this->db->insert('produk', html_escape($data), true);
			debug($data);
			debug($query1);
			redirect('admin/produk');
		}
	}
	function update($id)
	{
		$query = $this->db->query("SELECT * from produk where id_produk='$id'")->row();
		// debug($query);
		$data = [
			'nama_produk' => trim($_POST['nama_produk']),
			'harga_produk' => intval($_POST['harga_produk']),
			'diskon' => trim($_POST['diskon']),
			'quantity' => trim($_POST['quantity']),
			'deskripsi' => trim($_POST['deskripsi']),
			// 'tanggal_tambah' => null,
			// 'foto' => ,
		];
		$config = [
			'allowed_types' => "jpeg|jpg|png",
			'file_ext_tolower' => TRUE,
			'file_name' => $query->id_produk,
			'upload_path' => './assets/img/'
		];

		// debug($query);
		if ($_FILES['foto']['name'] == "" || $_FILES['foto']['name'] == null) {
			echo "tidak melakukan upload";
			$this->db->update("produk", $data, ['id_produk' => $id]);
			// echo "kondisi 1";
			debug($_POST);
			debug($_FILES);
			// echo $this->upload->display_errors();
			// debug($update);
			redirect('admin/produk');
		} else {
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo $this->upload->display_errors();
			} else {
				unlink('./assets/img/' . $query->foto);
				$data['foto'] = $this->upload->data('raw_name') . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
				debug($this->upload->data());
				$query = $this->db->update("produk", $data, ['id_produk' => $id]);
				redirect('admin/produk');
			}
			debug($_POST);
			debug($_FILES);
		}
	}
	function update_user($id)
	{
		$query = $this->db->query("SELECT * from user where id_user='$id'")->row();
		$data = [
			'username' => trim($_POST['username']),
			'password' => $_POST['password'],
			'display' => trim(lcfirst($_POST['display'])),
			'no_telpon' => $_POST['no_telpon'],
			'email' => trim($_POST['email']),
		];

		$config = [
			'allowed_types' => "jpeg|jpg|png",
			'file_ext_tolower' => TRUE,
			'file_name' => rand(),
			'upload_path' => './assets/img/user/'
		];

		// debug($query);
		if ($_FILES['foto']['name'] == "" || $_FILES['foto']['name'] == null) {
			echo "tidak melakukan upload";
			// $this->db->set($data);
			// $this->db->where("id_produk", $id);
			$this->db->update("user", $data, ['id_user' => $id]);
			// echo "kondisi 1";
			debug($_POST);
			debug($_FILES);
			// echo $this->upload->display_errors();
			// debug($update);
			redirect('admin/pengguna');
		} elseif ($_POST['confirm'] != $data['password']) {
			echo "password tidak sama";
			echo anchor('home/profile', 'Balik Ke Profile');
			# code...
			// } elseif ($data->username == $_POST['username']) {
			// 	$this->load->library('upload', $config);
			// 	if (!$this->upload->do_upload('foto')) {
			// 		echo $this->upload->display_errors();
			// 	} else {
			// 		unlink('./assets/img/user/' . $query->foto_user);
			// 		$data['foto'] = $this->upload->data('raw_name') . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
			// 		debug($this->upload->data());
			// 		$query = $this->db->update("user", $data, ['id_user' => $_SESSION['id_user']]);
			// 		redirect('home/profile');
			// 	}
			// 	debug($_POST);
			// 	debug($_FILES);
		} else {
			// $data['username'] = $_POST['username'];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo $this->upload->display_errors();
			} else {
				unlink('./assets/img/user/' . $query->foto_user);
				$data['foto_user'] = $this->upload->data('raw_name') . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
				debug($this->upload->data());
				$query = $this->db->update("user", $data, ['id_user' => $id]);
				redirect('admin/pengguna');
			}
			debug($_POST);
			debug($_FILES);
		}
	}
	function register()
	{
		$id = uniqid();
		$query = $this->db->query("SELECT * FROM user where username='" . $_POST['username'] . "'");
		$data = [
			'id_user' => $id,
			'username' => trim($_POST['username']),
			'level' => 'admin',
			'password' => trim($_POST['password']),
			'display' => trim($_POST['display']),
			'no_telpon' => trim($_POST['no_telpon']),
			'email' => trim($_POST['email']),
			'wallet' => 0,
			'foto_user' => 'default.png',
		];
		$confirm = $_POST['confirm'];
		if ($confirm != $data['password']) {
			echo "password is not same";
		} elseif ($query->num_rows() > 0) {
			echo "username sudah ada ";
		} else {
			$this->db->insert('user', $data);
			redirect('admin/login');
		}
	}
	function login()
	{
		$query = $this->db->query("SELECT * from user where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "' and level='admin'");
		$data = $query->row();
		$row = $query->num_rows();
		if ($row > 0) {
			session_start();
			$_SESSION['id_user']  = $data->id_user;
			$_SESSION['username']  = $data->username;
			// $this->session->set_userdata($session);
			// echo $_SESSION['user'];
			redirect('admin');
		} else {
			echo "Tidak ada di database";
		}
	}
}
