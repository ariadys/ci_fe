<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_api extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }

  function index()
  {
    $this->load->view('api_view');
  }

  public function action()
  {
    if ($this->input->post('data_action')) {
      $data_action = $this->input->post('data_action');

      if ($data_action == "delete") {
        $api_url = base_url() . "index.php/api/delete";

        if ($this->input->post('id_barang')) {
          $form_data = array(
            'id_barang'  => $this->input->post('id_barang')
          );
        } else if ($this->input->post('id_user')) {
          $form_data = array(
            'id_user'  => $this->input->post('id_user')
          );
        } else {
          $form_data = array(
            'id_transaksi'  => $this->input->post('id_transaksi')
          );
        }

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "edit_barang") {
        $api_url = base_url() . "index.php/api/update";

        $form_data = array(
          'nama_barang'  => $this->input->post('nama_barang'),
          'harga'   => $this->input->post('harga'),
          'stok'   => $this->input->post('stok'),
          'id_barang'    => $this->input->post('id_barang')
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "edit_user") {
        $api_url = base_url() . "index.php/api/update";

        $form_data = array(
          'username'  => $this->input->post('username'),
          'password'   => $this->input->post('password'),
          'nama_lengkap'   => $this->input->post('nama_lengkap'),
          'tgl_lahir'    => $this->input->post('tgl_lahir'),
          'id_user'    => $this->input->post('id_user')
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "edit_transaksi") {
        $api_url = base_url() . "index.php/api/update";

        $form_data = array(
          'user'  => $this->input->post('user'),
          'barang'   => $this->input->post('barang'),
          'qty'   => $this->input->post('qty'),
          'id_transaksi'   => $this->input->post('no_transaksi')
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "fetch_single") {
        $api_url = base_url() . "index.php/api/fetch_single";

        if ($this->input->post('id_barang')) {
          $form_data = array(
            'id_barang'  => $this->input->post('id_barang')
          );
        } else if ($this->input->post('id_user')) {
          $form_data = array(
            'id_user'  => $this->input->post('id_user')
          );
        } else {
          $form_data = array(
            'id_transaksi'  => $this->input->post('id_transaksi')
          );
        }

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "insert_barang") {
        $api_url = base_url() . "index.php/api/insert_barang";


        $form_data = array(
          'nama_barang'  => $this->input->post('nama_barang'),
          'harga'   => $this->input->post('harga'),
          'stok'   => $this->input->post('stok')
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "insert_user") {
        $api_url = base_url() . "index.php/api/insert_user";


        $form_data = array(
          'username'  => $this->input->post('username'),
          'password'   => $this->input->post('password'),
          'nama_lengkap'   => $this->input->post('nama_lengkap'),
          'tgl_lahir'   => $this->input->post('tgl_lahir')
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "insert_transaksi") {
        $api_url = base_url() . "index.php/api/insert_transaksi";

        $form_data = array(
          'user'  => $this->input->post('user'),
          'barang'   => $this->input->post('barang'),
          'qty'   => $this->input->post('qty')
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        echo $response;
      }

      if ($data_action == "fetch_barang") {
        $api_url = base_url() . "index.php/api/fetch_barang";

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_decode($response);

        $output = '';

        if (count($result) > 0) {
          $i = 1;
          foreach ($result as $row) {
            $output .= '
            <tr>
            <td>' . $i . '</td>
            <td>' . $row->nama_barang . '</td>
            <td>' . $row->harga . '</td>
            <td>' . $row->stok . '</td>
            <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="' . $row->id_barang . '" data-x="barang">Edit</button></td>
            </tr>
            ';
            $i++;
          }
        } else {
          $output .= '
          <tr>
            <td colspan="5" align="center">No Data Found</td>
          </tr>
          ';
        }

        echo $output;
      }

      if ($data_action == "fetch_user") {
        $api_url = base_url() . "index.php/api/fetch_user";

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_decode($response);

        $output = '';

        if (count($result) > 0) {
          $i = 1;
          foreach ($result as $row) {
            $output .= '
            <tr>
            <td>' . $i . '</td>
            <td>' . $row->username . '</td>
            <td>' . $row->nama_lengkap . '</td>
            <td>' . $row->tgl_lahir . '</td>
            <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="' . $row->id_user . '" data-x="user">Edit</button></td>
            </tr>
            ';
            $i++;
          }
        } else {
          $output .= '
          <tr>
            <td colspan="5" align="center">No Data Found</td>
          </tr>
          ';
        }

        echo $output;
      }

      if ($data_action == "fetch_transaksi") {
        $api_url = base_url() . "index.php/api/fetch_transaksi";

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_decode($response);

        $output = '';

        if (count($result) > 0) {
          $i = 1;
          foreach ($result as $row) {
            $query = $this->db->get_where('Tbl_User', array('id_user' => $row->user));
            $u = $query->result_array();

            $querys = $this->db->get_where('Tbl_Barang', array('id_barang' => $row->id_barang));
            $b = $querys->result_array();

            $total = $b[0]['harga'] * $row->qty;

            $str = '';
            $action = '';
            if ($row->deleted_status == 'n') {
              $str .= 'actived';
              $action .= '<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="' . $row->no_transaksi . '" data-x="transaksi">Edit</button> <button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row->no_transaksi . '" data-x="transaksi">Delete</button></td>';
            } else {
              $str .= 'deleted';
              $action = '<td></td>';
            }

            $output .= '
            <tr>
            <td>' . $i . '</td>
            <td>' . $row->no_transaksi . '</td>
            <td>' . $u[0]['nama_lengkap'] . '</td>
            <td>' . $b[0]['nama_barang'] . '</td>
            <td>' . $b[0]['harga'] . '</td>
            <td>' . $row->qty . '</td>
            <td>' . $total . '</td>
            <td>' . $str . '</td>
            ' . $action . '
            </tr>
            ';
            $i++;
          }
        } else {
          $output .= '
          <tr>
            <td colspan="9" align="center">No Data Found</td>
          </tr>
          ';
        }

        echo $output;
      }

      if ($data_action == "fetch_barang_transaksi") {
        $api_url = base_url() . "index.php/api/fetch_barang";

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_decode($response);

        $output = '';

        if (count($result) > 0) {
          $output .= '<option>- Pilih Barang-</option>';
          foreach ($result as $row) {
            $output .= '
            <option value=' . $row->id_barang . '>
            ' . $row->nama_barang . ' - [' . $row->harga . ']
            </option>
            ';
          }
        } else {
          $output .= '
          <option>Tidak ada Data</option>
          ';
        }

        echo $output;
      }

      if ($data_action == "fetch_user_transaksi") {
        $api_url = base_url() . "index.php/api/fetch_user";

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_decode($response);

        $output = '';

        if (count($result) > 0) {
          $output .= '<option>- Pilih Pembeli-</option>';
          foreach ($result as $row) {
            $output .= '
            <option value=' . $row->id_user . '>
            ' . $row->nama_lengkap . '
            </option>
            ';
          }
        } else {
          $output .= '
          <option>Tidak ada Data</option>
          ';
        }

        echo $output;
      }
    }
  }
}
