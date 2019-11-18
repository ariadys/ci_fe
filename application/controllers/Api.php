<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('date');
    $this->load->model('api_model');
    $this->load->library('form_validation');
  }

  function fetch_barang()
  {
    $data = $this->api_model->fetch_barang();
    echo json_encode($data->result_array());
  }

  function fetch_transaksi()
  {
    $data = $this->api_model->fetch_transaksi();
    echo json_encode($data->result_array());
  }

  function fetch_user()
  {
    $data = $this->api_model->fetch_user();
    echo json_encode($data->result_array());
  }

  function insert_barang()
  {
    $this->form_validation->set_rules("nama_barang", "Nama Barang", "required");
    $this->form_validation->set_rules("harga", "Harga", "required");
    $this->form_validation->set_rules("stok", "Stok", "required");
    $array = array();
    if ($this->form_validation->run()) {
      $data = array(
        'nama_barang' => trim($this->input->post('nama_barang')),
        'harga'  => trim($this->input->post('harga')),
        'stok'  => trim($this->input->post('stok'))
      );
      $this->api_model->insert_barang($data);
      $array = array(
        'success'  => true
      );
    } else {
      $array = array(
        'error'    => true,
        'barang_error' => form_error('nama_barang'),
        'harga_error' => form_error('harga'),
        'stok_error' => form_error('stok')
      );
    }
    echo json_encode($array, true);
  }

  function insert_user()
  {
    $this->form_validation->set_rules("username", "Username", "required");
    $this->form_validation->set_rules("password", "Password", "required");
    $this->form_validation->set_rules("nama_lengkap", "Nama Lengkap", "required");
    $this->form_validation->set_rules("tgl_lahir", "Tgl Lahir", "required");
    $array = array();
    if ($this->form_validation->run()) {
      $data = array(
        'username' => trim($this->input->post('username')),
        'password'  => trim($this->input->post('password')),
        'nama_lengkap'  => trim($this->input->post('nama_lengkap')),
        'tgl_lahir'  => trim($this->input->post('tgl_lahir'))
      );
      $f = $this->api_model->insert_user($data);
      if ($f) {
        $array = array(
          'success'  => true
        );
      } else {
        $array = array(
          'error'    => true,
          'msg'      => 'username has taken'
        );
      }
    } else {
      $array = array(
        'error'    => true
      );
    }
    echo json_encode($array, true);
  }

  function insert_transaksi()
  {
    $this->form_validation->set_rules("user", "User", "required");
    $this->form_validation->set_rules("barang", "Barang", "required");
    $this->form_validation->set_rules("qty", "Qty", "required");
    $array = array();
    if ($this->form_validation->run()) {
      $data = array(
        'user' => trim($this->input->post('user')),
        'barang'  => trim($this->input->post('barang')),
        'qty'  => trim($this->input->post('qty'))
      );
      $f = $this->api_model->insert_transaksi($data);
      if ($f) {
        $array = array(
          'success'  => true
        );
      } else {
        $array = array(
          'error'    => true,
          'msg'      => 'stok tidak cukup'
        );
      }
    } else {
      $array = array(
        'error'    => true
      );
    }
    echo json_encode($array, true);
  }

  function fetch_single()
  {
    $array = array();
    if ($this->input->post('id_barang')) {
      $data = $this->api_model->fetch_single_barang($this->input->post('id_barang'));
      if ($data) {
        foreach ($data as $row) {
          $output['nama_barang'] = $row["nama_barang"];
          $output['harga'] = $row["harga"];
          $output['stok'] = $row["stok"];
        }
        echo json_encode($output);
      } else {
        $array = array(
          'error'    => true,
          'msg'      => 'not found'
        );
        echo json_encode($array, true);
      }
    } else if ($this->input->post('id_user')) {
      $data = $this->api_model->fetch_single_user($this->input->post('id_user'));
      if ($data) {
        foreach ($data as $row) {
          $output['username'] = $row["username"];
          $output['password'] = $row["password"];
          $output['nama_lengkap'] = $row["nama_lengkap"];
          $output['tgl_lahir'] = $row["tgl_lahir"];
        }
        echo json_encode($output);
      } else {
        $array = array(
          'error'    => true,
          'msg'      => 'not found'
        );
        echo json_encode($array, true);
      }
    } else {
      $data = $this->api_model->fetch_single_transaksi($this->input->post('id_transaksi'));
      if ($data) {
        foreach ($data as $row) {
          $output['barang'] = $row["id_barang"];
          $output['user'] = $row["user"];
          $output['qty'] = $row["qty"];
        }
        echo json_encode($output);
      } else {
        $array = array(
          'error'    => true,
          'msg'      => 'not found'
        );
        echo json_encode($array, true);
      }
    }
  }

  function update()
  {
    if ($this->input->post('id_barang')) {
      $this->form_validation->set_rules("nama_barang", "Nama Barang", "required");
      $this->form_validation->set_rules("harga", "Harga", "required");
      $this->form_validation->set_rules("stok", "Stok", "required");
      $array = array();
      if ($this->form_validation->run()) {
        $data = array(
          'nama_barang' => trim($this->input->post('nama_barang')),
          'harga'  => trim($this->input->post('harga')),
          'stok'  => trim($this->input->post('stok'))
        );
        $this->api_model->update_barang($this->input->post('id_barang'), $data);
        $array = array(
          'success'  => true
        );
      } else {
        $array = array(
          'error'    => true,
          'barang_error' => form_error('nama_barang'),
          'harga_error' => form_error('harga'),
          'stok_error' => form_error('stok')
        );
      }
    } else if ($this->input->post('id_user')) {
      $this->form_validation->set_rules("username", "Username", "required");
      $this->form_validation->set_rules("password", "Password", "required");
      $this->form_validation->set_rules("nama_lengkap", "Nama Lengkap", "required");
      $this->form_validation->set_rules("tgl_lahir", "Tgl Lahir", "required");
      $array = array();
      if ($this->form_validation->run()) {
        $data = array(
          'username' => trim($this->input->post('username')),
          'password'  => trim($this->input->post('password')),
          'nama_lengkap'  => trim($this->input->post('nama_lengkap')),
          'tgl_lahir'  => trim($this->input->post('tgl_lahir'))
        );
        $this->api_model->update_user($this->input->post('id_user'), $data);
        $array = array(
          'success'  => true
        );
      } else {
        $array = array(
          'error'    => true
        );
      }
    } else {
      $this->form_validation->set_rules("barang", "Barang", "required");
      $this->form_validation->set_rules("user", "User", "required");
      $this->form_validation->set_rules("qty", "Qty", "required");
      $array = array();
      if ($this->form_validation->run()) {
        $query = $this->db->get_where('Tbl_Barang', array('id_barang' => $this->input->post('barang')));
        $b = $query->result_array();

        $querys = $this->db->get_where('Tbl_Transaksi', array('no_transaksi' => $this->input->post('id_transaksi')));
        $t = $querys->result_array();

        if ($this->input->post('qty') >= $t[0]['qty']) {
          if ($this->input->post('qty') <= $b[0]['stok']) {
            $upStok = $b[0]['stok'] - $this->input->post('qty');

            $this->db->where("id_barang", $this->input->post('barang'));
            $this->db->update("Tbl_Barang", array('stok' => $upStok));

            $data = array(
              'id_barang' => trim($this->input->post('barang')),
              'user'  => trim($this->input->post('user')),
              'qty'  => trim($this->input->post('qty')),
              'updated_by' => 'Admin',
              'updated_date' => date('Y-m-d H:i:s')
            );
            $this->api_model->update_transaksi($this->input->post('id_transaksi'), $data);
            $array = array(
              'success'  => true
            );
          } else {
            $array = array(
              'error'    => true,
              'msg'      => 'stok tidak cukup'
            );
          }
        } else {
          if ($this->input->post('qty') <= $b[0]['stok']) {
            $up = $t[0]['qty'] - $this->input->post('qty');
            $upStok = $up + $b[0]['stok'];

            $this->db->where("id_barang", $this->input->post('barang'));
            $this->db->update("Tbl_Barang", array('stok' => $upStok));

            $data = array(
              'id_barang' => trim($this->input->post('barang')),
              'user'  => trim($this->input->post('user')),
              'qty'  => trim($this->input->post('qty')),
              'updated_by' => 'Admin',
              'updated_date' => date('Y-m-d H:i:s')
            );
            $this->api_model->update_transaksi($this->input->post('id_transaksi'), $data);
            $array = array(
              'success'  => true
            );
          } else {
            $array = array(
              'error'    => true,
              'msg'      => 'stok tidak cukup'
            );
          }
        }
      } else {
        $array = array(
          'error'    => true
        );
      }
    }
    echo json_encode($array, true);
  }

  function delete()
  {
    if ($this->input->post('id_barang')) {
      if ($this->api_model->delete_barang($this->input->post('id_barang'))) {
        $array = array(
          'success' => true
        );
      } else {
        $array = array(
          'error' => true
        );
      }
      echo json_encode($array);
    } else if ($this->input->post('id_user')) {
      if ($this->api_model->delete_user($this->input->post('id_user'))) {
        $array = array(
          'success' => true
        );
      } else {
        $array = array(
          'error' => true
        );
      }
      echo json_encode($array);
    } else {
      if ($this->api_model->delete_transaksi($this->input->post('id_transaksi'))) {
        $array = array(
          'success' => true
        );
      } else {
        $array = array(
          'error' => true
        );
      }
      echo json_encode($array);
    }
  }
}
