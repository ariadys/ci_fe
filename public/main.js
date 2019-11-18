function fetch_barang() {
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: {
			data_action: "fetch_barang"
		},
		success: function(data) {
			$("#barangBody").html(data);
		}
	});
}

function fetch_user() {
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: {
			data_action: "fetch_user"
		},
		success: function(data) {
			$("#userBody").html(data);
		}
	});
}

function fetch_transaksi() {
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: {
			data_action: "fetch_transaksi"
		},
		success: function(data) {
			$("#transaksiBody").html(data);
		}
	});
}

function fetch_barang_transaksi() {
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: {
			data_action: "fetch_barang_transaksi"
		},
		success: function(data) {
			$("#barangTransaksi").html(data);
		}
	});
}

function fetch_user_transaksi() {
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: {
			data_action: "fetch_user_transaksi"
		},
		success: function(data) {
			$("#userTransaksi").html(data);
		}
	});
}

fetch_barang();
fetch_user();
fetch_transaksi();
fetch_barang_transaksi();
fetch_user_transaksi();

$("#add_button_barang").click(function() {
	$("#formBarang")[0].reset();
	$(".modal-title").text("Tambah Data Barang");
	$(".action").val("Tambah Data");
	$(".data_action").val("insert_barang");
	$("#modalBarang").modal("show");
});

$("#add_button_user").click(function() {
	$("#formUser")[0].reset();
	$(".modal-title").text("Tambah Data User");
	$(".action").val("Tambah Data");
	$(".data_action").val("insert_user");
	$("#modalUser").modal("show");
});

$("#add_button_transaksi").click(function() {
	$("#formTransaksi")[0].reset();
	$(".modal-title").text("Tambah Data Transaksi");
	$(".action").val("Tambah Data");
	$(".data_action").val("insert_transaksi");
	$("#modalTransaksi").modal("show");
});

$(document).on("submit", "#formBarang", function(event) {
	console.log("sending..");
	event.preventDefault();
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: $(this).serialize(),
		dataType: "json",
		success: function(data) {
      $("#success_message").html('');
      $("#error_message").html('');
      $("#formBarang")[0].reset();
      $("#modalBarang").modal("hide");
      fetch_barang();
      fetch_user();
      fetch_transaksi();
      fetch_barang_transaksi();
      fetch_user_transaksi();
			if (data.success) {
				if ($(".data_action").val() == "insert_barang") {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Tambah</div>'
					);
				}
				if ($(".data_action").val() == "edit_barang") {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Perbarui</div>'
					);
				}
			}

			if (data.error) {
				$("#barang_error").html(data.barang_error);
				$("#harga_error").html(data.harga_error);
				$("#stok_error").html(data.stok_error);
			}
		}
	});
});

$(document).on("submit", "#formUser", function(event) {
	console.log("sending..");
	event.preventDefault();
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: $(this).serialize(),
		dataType: "json",
		success: function(data) {
      $("#success_message").html('');
      $("#error_message").html('');
      $("#formUser")[0].reset();
      $("#modalUser").modal("hide");
      fetch_barang();
      fetch_user();
      fetch_transaksi();
      fetch_barang_transaksi();
      fetch_user_transaksi();
			if (data.success) {
				if ($(".data_action").val() == "insert_user") {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Tambah</div>'
					);
				}
				if ($(".data_action").val() == "edit_user") {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Perbarui</div>'
					);
				}
			}

			if (data.error) {
				if (data.msg == "username has taken") {
					$("#error_message").html(
						'<div class="alert alert-danger">Username telah digunakan. Silahkan masukkan username lain.</div>'
					);
				} else {
					$("#username_error").html(data.username_error);
					$("#password_error").html(data.password_error);
					$("#nama_lengkap_error").html(data.nama_lengkap_error);
					$("#tgl_lahir_error").html(data.tgl_lahir_error);
				}
			}
		}
	});
});

$(document).on("submit", "#formTransaksi", function(event) {
	console.log("sending..");
	event.preventDefault();
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: $(this).serialize(),
		dataType: "json",
		success: function(data) {
      $("#success_message").html('');
      $("#error_message").html('');
      $("#formTransaksi")[0].reset();
      $("#modalTransaksi").modal("hide");
      fetch_barang();
      fetch_user();
      fetch_transaksi();
      fetch_barang_transaksi();
      fetch_user_transaksi();
			if (data.success) {
				if ($(".data_action").val() == "insert_transaksi") {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Tambah</div>'
					);
				}
				if ($(".data_action").val() == "edit_transaksi") {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Perbarui</div>'
					);
				}
			}

			if (data.error) {
				$("#error_message").html(
					'<div class="alert alert-danger">'+data.msg+'</div>'
				);
			}
		}
	});
});

$(document).on("click", ".edit", function() {
	var id = $(this).attr("id");
	var x = $(this).data("x");
	var sym = "id_" + x;
	var dataObject = {};
	dataObject[sym] = id;
	dataObject["data_action"] = "fetch_single";
	console.log(sym);
	$.ajax({
		url: "index.php/action",
		method: "POST",
		data: dataObject,
		dataType: "json",
		success: function(data) {
			if (sym == "id_barang") {
				$("#modalBarang").modal("show");
				$("#barang").val(data.nama_barang);
				$("#harga").val(data.harga);
				$("#stok").val(data.stok);
				$(".modal-title").text("Edit Barang");
				$(".action").val("Simpan");
				$("#id_barang").val(id);
				$(".data_action").val("edit_barang");
			} else if (sym == "id_user") {
				$("#modalUser").modal("show");
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#nama_lengkap").val(data.nama_lengkap);
				$("#tgl_lahir").val(data.tgl_lahir);
				$(".modal-title").text("Edit User");
				$(".action").val("Simpan");
				$("#id_user").val(id);
				$(".data_action").val("edit_user");
			} else {
        $("#modalTransaksi").modal("show");
        $("#qty").val(data.qty);
        $("#userTransaksi option[value="+data.user+"]").prop('selected', true);
        $("#barangTransaksi option[value="+data.barang+"]").prop('selected', true);
				$(".modal-title").text("Edit Transaksi");
				$(".action").val("Simpan");
				$("#no_transaksi").val(id);
				$(".data_action").val("edit_transaksi");
      }
		}
	});
});

$(document).on("click", ".delete", function() {
	console.log("sending..");
	var id = $(this).attr("id");
	var x = $(this).data("x");
	var sym = "id_" + x;
	var dataObject = {};
	dataObject[sym] = id;
	dataObject["data_action"] = "delete";
	if (confirm("Apa kamu yakin ingin menghapus data ini?")) {
		$.ajax({
			url: "index.php/action",
			method: "POST",
			data: dataObject,
			dataType: "JSON",
			success: function(data) {
				if (data.success) {
					$("#success_message").html(
						'<div class="alert alert-success">Data Berhasil di Hapus</div>'
					);
					fetch_barang();
					fetch_user();
					fetch_transaksi();
					fetch_barang_transaksi();
					fetch_user_transaksi();
				}
			}
		});
	}
});
