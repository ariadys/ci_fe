<html>

<head>
  <title>FE TEST API</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
  <div class="container">
    <br />
    <h3 align="center">REST API CRUD</h3>
    <br />
    <span id="success_message"></span>
    <span id="error_message"></span>
    <br />
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h3 class="panel-title">Data Pengguna</h3>
          </div>
          <div class="col-md-6" align="right">
            <button type="button" id="add_button_user" class="btn btn-info btn-xs">Tambah</button>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Tgl Lahir</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="userBody">

          </tbody>
        </table>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h3 class="panel-title">Data Barang</h3>
          </div>
          <div class="col-md-6" align="right">
            <button type="button" id="add_button_barang" class="btn btn-info btn-xs">Tambah</button>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="barangBody">

          </tbody>
        </table>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h3 class="panel-title">Data Transaksi</h3>
          </div>
          <div class="col-md-6" align="right">
            <button type="button" id="add_button_transaksi" class="btn btn-info btn-xs">Tambah</button>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>No Transaksi</th>
              <th>Pembeli</th>
              <th>Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="transaksiBody">

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="public/main.js"></script>
</body>

</html>

<div id="modalUser" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="formUser">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <label>Username</label>
          <input type="text" name="username" id="username" class="form-control" required />
          <span id="username_error" class="text-danger"></span>
          <br />
          <label>Password</label>
          <input type="password" name="password" id="password" class="form-control" required />
          <span id="password_error" class="text-danger"></span>
          <br />
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required />
          <span id="nama_lengkap_error" class="text-danger"></span>
          <br />
          <label>Tgl Lahir</label>
          <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" required />
          <span id="tgl_lahir_error" class="text-danger"></span>
          <br />
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_user" id="id_user">
          <input type="hidden" name="data_action" class="data_action" />
          <input type="submit" name="action" class="btn btn-success action" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="modalBarang" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="formBarang">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <label>Nama Barang</label>
          <input type="text" name="nama_barang" id="barang" class="form-control" required />
          <span id="barang_error" class="text-danger"></span>
          <br />
          <label>Harga</label>
          <input type="text" name="harga" id="harga" class="form-control" required />
          <span id="harga_error" class="text-danger"></span>
          <br />
          <label>Stok</label>
          <input type="text" name="stok" id="stok" class="form-control" required />
          <span id="stok_error" class="text-danger"></span>
          <br />
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_barang" id="id_barang">
          <input type="hidden" name="data_action" class="data_action" />
          <input type="submit" name="action" class="btn btn-success action" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="modalTransaksi" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="formTransaksi">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <label>Pembeli</label>
          <select name="user" id="userTransaksi" class="form-control custom-select"></select>
          <br />
          <label>Barang</label>
          <select name="barang" id="barangTransaksi" class="form-control custom-select"></select>
          <br />
          <label>Qty</label>
          <input type="text" name="qty" id="qty" class="form-control" required />
          <span id="qty_error" class="text-danger"></span>
          <br />
        </div>
        <div class="modal-footer">
          <input type="hidden" name="no_transaksi" id="no_transaksi">
          <input type="hidden" name="data_action" class="data_action" />
          <input type="submit" name="action" class="btn btn-success action" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </form>
  </div>
</div>