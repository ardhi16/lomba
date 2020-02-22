<?php

/**
 * 
 */
class HomeModel extends CI_Model
{
	function register()
	{
		$id = uniqid();
		$query = $this->db->query("SELECT * FROM user where username='" . $_POST['username'] . "'");
		$data = [
			'id_user' => $id,
			'username' => trim($_POST['username']),
			'level' => 'user',
			'password' => trim($_POST['password']),
			'display' => trim(lcfirst($_POST['display'])),
			'no_telpon' => trim($_POST['no_telpon']),
			'email' => trim($_POST['email']),
			'wallet' => 0,
			'foto_user' => 'default.png',
		];
		$confirm = $_POST['confirm'];
		if ($confirm != $data['password']) {
			echo "password is not same";
			echo anchor('home/register', 'Coba Lagi');
		} elseif ($query->num_rows() > 0) {
			echo "username sudah ada ";
			echo anchor('home/register', 'Coba Lagi');
		} else {
			$this->db->insert('user', $data);
			echo anchor('home/login', 'Silahkan Login');
			// redirect('home/register');
		}
	}
	function login()
	{
		$query = $this->db->query("SELECT * from user where username='" . $_POST['username'] . "' or email='" . $_POST['username'] . "' and password='" . $_POST['password'] . "' and level='user'");
		$data = $query->row();
		$row = $query->num_rows();
		if ($row > 0) {
			// session_start();
			$_SESSION['id_user']  = $data->id_user;
			$_SESSION['username']  = $data->username;
			// $this->session->set_userdata($session);
			redirect('home');
		} else {
			redirect('home/login_gagal');
		}
	}
	function buy($id)
	{
		$uniq = uniqid();
		$user = $this->db->query("SELECT * FROM user where id_user='" . $_SESSION['id_user'] . "'")->row();
		$data = $this->db->query("SELECT * from produk where id_produk='$id'")->row();
		$jumlah_pembelian = intval($_POST['jumlah_pembelian']);
		$insert['id_invoice'] = $uniq;
		$insert['id_user'] = $_SESSION['id_user'];
		$insert['id_produk'] = $data->id_produk;
		$tz = 'Asia/Jakarta';
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone($tz));
		$dt->setTimestamp($timestamp);
		$date = $dt->format('Y-m-d H:i:s');
		$insert['tanggal_transaksi'] = $date;
		$insert['jumlah_pembelian'] = $jumlah_pembelian;
		$insert['jasa_kurir'] = $_POST['jasa_kurir'];
		$insert['tujuan_pengiriman'] = $_POST['tujuan_pengiriman'];
		if ($jumlah_pembelian > $data->quantity) {
			echo "jumlah barang kami hanya" . $data->quantity;
			echo anchor('home/etalase', 'Balik Ke Beranda');
		} else {

			$hitung_diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
			$diskon = intval($data->harga_produk) - $hitung_diskon;

			if (intval($data->diskon) > 0) {
				$jumlah_a = $diskon * $jumlah_pembelian;
				if (intval($user->wallet) < $jumlah_a) {
					redirect('home/saldo_tidak_cukup');
					// echo anchor('home', 'balik ke beranda');
				} else {
					// $a = intval($data->quantity) - $jumlah_pembelian;
					// $b = intval($user->wallet) - $jumlah_a;
					// echo "a";
					// echo "b";
					// debug($a);
					// debug($b);
					$this->db->update('produk', ['quantity' => intval($data->quantity) - $jumlah_pembelian], ['id_produk' => $id]);
					$this->db->update('user', ['wallet' => intval($user->wallet) - $jumlah_a], ['id_user' => $_SESSION['id_user']]);
					$this->db->insert('invoice', $insert);
					$this->db->query("DELETE from keranjang where id_produk='$id'");
					redirect('home/invoice');
				}
			} else {
				$jumlah_b = intval($data->harga_produk) * $jumlah_pembelian;
				if (intval($user->wallet) < $jumlah_b) {
					echo "saldo anda tidak cukup";
					echo anchor('home', 'balik ke beranda');
				} else {
					// echo "d";
					// echo "c";
					// $c = intval($data->quantity) - $jumlah_pembelian;
					// $d = intval($user->wallet) - $jumlah_b;
					// debug($c);
					// debug($d);
					$this->db->update('produk', ['quantity' => intval($data->quantity) - $jumlah_pembelian], ['id_produk' => $id]);
					$this->db->update('user', ['wallet' => intval($user->wallet) - $jumlah_b], ['id_user' => $_SESSION['id_user']]);
					$this->db->insert('invoice', $insert);
					$this->db->query("DELETE from keranjang where id_produk='$id'");
					redirect('home/invoice');
				}
			}
		}
	}
	function top_up()
	{
		$query =  $this->db->query("SELECT * from user where id_user='" . $_SESSION['id_user'] . "'")->row();
		// $bug = $_POST['wallet'] + $query->wallet;
		$update = $this->db->update('user', ['wallet' => $_POST['wallet'] + $query->wallet], ['id_user' => $_SESSION['id_user']]);
		// debug($query);
		// debug($bug);
		// debug($update);
		redirect('home/tambah_saldo');
	}

	function update_profile()
	{
		$query = $this->db->query("SELECT * from user where id_user='".$_SESSION['id_user']."'")->row();
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
			$this->db->update("user", $data, ['id_user' => $_SESSION['id_user']]);
			// echo "kondisi 1";
			debug($_POST);
			debug($_FILES);
			// echo $this->upload->display_errors();
			// debug($update);
			redirect('home/profile');
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
				$query = $this->db->update("user", $data, ['id_user' => $_SESSION['id_user']]);
				redirect('home/profile');
			}
			debug($_POST);
			debug($_FILES);
		}
	}
	function keranjang($id)
	{
		$query = $this->db->query("SELECT * from produk where id_produk='" . $id . "'")->row();
		$keranjang = $this->db->query("SELECT * from keranjang where id_produk='" . $id . "'");
		// debug();
		if ($keranjang->num_rows() > 0) {
			echo "item sudah ada di keranjang";
			echo anchor('home/etalase', 'Balik ke etalase');
		} elseif ($_SESSION == null) {
			redirect('home/login');
		} else {
			$insert['id_user'] = $_SESSION['id_user'];
			$insert['id_produk'] = $query->id_produk;
			$this->db->insert('keranjang', $insert);
			redirect('home/keranjang');
		}
	}
	function pencarian($keyword)
	{
	}

	function profile()
	{
		// $query = $this->db->query("SELECT * FROM user where username='" . $_SESSION['id_user'] . "'");
		// $data = [
		// 	'id_user' => $id,
		// 	'username' => trim($_POST['username']),
		// 	'level' => 'user',
		// 	'password' => trim($_POST['password']),
		// 	'display' => trim(lcfirst($_POST['display'])),
		// 	'no_telpon' => trim($_POST['no_telpon']),
		// 	'email' => trim($_POST['email']),
		// 	'wallet' => 0,
		// 	'foto_user' => 'default.png',
		// ];
		// $confirm = $_POST['confirm'];
		// if ($confirm != $data['password']) {
		// 	echo "password is not same";
		// 	echo anchor('home/register', 'Coba Lagi');
		// } elseif ($query->num_rows() > 0) {
		// 	echo "username sudah ada ";
		// 	echo anchor('home/register', 'Coba Lagi');
		// } else {
		// 	$this->db->update('user', $data);
		// 	echo anchor('home/login', 'Silahkan Login');
		// 	// redirect('home/register');
		// }

		// if($_POST){
		// 	$id_user = $this->db->get('user');
        //     $data['profile'] = $this->input->post('profile');
        //     $this->db->update('user', $data, ['id_user' => $id_user]);
        //     redirect('home');
        // } else{
        //     $data['user'] = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        // }
		 
	}
}
