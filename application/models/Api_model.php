<?php
class Api_model extends CI_Model
{
  function fetch_barang()
  {
    $this->db->order_by('id_barang', 'DESC');
    return $this->db->get('Tbl_Barang');
  }

  function fetch_user()
  {
    $this->db->order_by('id_user', 'DESC');
    return $this->db->get('Tbl_User');
  }

  function fetch_transaksi()
  {
    $this->db->order_by('no_transaksi', 'DESC');
    return $this->db->get('Tbl_Transaksi');
  }

  function insert_barang($data)
  {
    $this->db->insert('Tbl_Barang', $data);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function insert_user($data)
  {
    $this->db->where("username", $data['username']);
    $cek = $this->db->get('Tbl_User');
    if ($cek->num_rows() == 0) {
      $this->db->insert('Tbl_User', $data);
      if ($this->db->affected_rows() > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function insert_transaksi($data)
  {
    $id = rand();

    $this->db->where("id_barang", $data['barang']);
    $query = $this->db->get('Tbl_Barang');
    $v = $query->result_array();

    if ($data['qty'] < $v[0]['stok']) {
      $upStok = $v[0]['stok'] - $data['qty'];

      $this->db->where("id_barang", $data['barang']);
      $this->db->update("Tbl_Barang", array('stok' => $upStok));

      $dataInput = array(
        'no_transaksi' => $id,
        'id_barang' => trim($data['barang']),
        'user' => trim($data['user']),
        'harga'  => $v[0]['harga'],
        'qty'  => trim($data['qty']),
        'created_by'  => trim('Admin'),
        'created_date'  => date('Y-m-d H:i:s'),
        'deleted_status' => 'n'
      );
      $this->db->insert('Tbl_Transaksi', $dataInput);
      if ($this->db->affected_rows() > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function fetch_single_barang($id_barang)
  {
    $this->db->where("id_barang", $id_barang);
    $cek = $this->db->get('Tbl_Barang');
    if ($cek->num_rows() == 1) {
      $this->db->where("id_barang", $id_barang);
      $query = $this->db->get('Tbl_Barang');
      return $query->result_array();
    } else {
      return false;
    }
  }

  function fetch_single_user($id_user)
  {
    $this->db->where("id_user", $id_user);
    $cek = $this->db->get('Tbl_User');
    if ($cek->num_rows() == 1) {
      $this->db->where("id_user", $id_user);
      $query = $this->db->get('Tbl_User');
      return $query->result_array();
    } else {
      return false;
    }
  }

  function fetch_single_transaksi($id_transaksi)
  {
    $this->db->where("no_transaksi", $id_transaksi);
    $cek = $this->db->get('Tbl_Transaksi');
    if ($cek->num_rows() == 1) {
      $this->db->where("no_transaksi", $id_transaksi);
      $query = $this->db->get('Tbl_Transaksi');
      return $query->result_array();
    } else {
      return false;
    }
  }

  function update_barang($id_barang, $data)
  {
    $this->db->where("id_barang", $id_barang);
    $this->db->update("Tbl_Barang", $data);
  }

  function update_user($id_user, $data)
  {
    $this->db->where("id_user", $id_user);
    $this->db->update("Tbl_User", $data);
  }

  function update_transaksi($id_transaksi, $data)
  {
    $this->db->where("no_transaksi", $id_transaksi);
    $this->db->update("Tbl_Transaksi", $data);
  }

  function delete_barang($id_barang)
  {
    $this->db->where("id_barang", $id_barang);
    $this->db->delete("Tbl_Barang");
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  function delete_user($id_user)
  {
    $this->db->where("id_user", $id_user);
    $this->db->delete("Tbl_User");
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  function delete_transaksi($id_transaksi)
  {
    $data = array(
      'deleted_by' => 'Admin', 'deleted_date' => date('Y-m-d H:i:s'), 'deleted_status' => 'y'
    );
    $this->db->where("no_transaksi", $id_transaksi);
    $this->db->update("Tbl_Transaksi", $data);
    return true;
  }
}
