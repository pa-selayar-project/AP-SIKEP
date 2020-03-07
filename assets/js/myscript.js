$(document).ready(function () {
	// ------------------------Download---------------------------//
	$('.download_st').on('click', function () {
		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/ci_kepeg/admin/modal/surat_tugas/',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('embed').attr('src', 'http://localhost/ci_kepeg/assets/uploads/pdf/' + data[0].path);
				$('.hapus-download').attr('href', 'http://localhost/ci_kepeg/admin/hapuspdf/surat_tugas/' + data[0].id_surat);
			}
		})
	});

	$('.download_kgb').on('click', function () {
		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/ci_kepeg/admin/modal/kenaikan_gaji_berkala',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('embed').attr('src', 'http://localhost/ci_kepeg/assets/uploads/pdf/' + data[0].path);
				$('.hapus-download').attr('href', 'http://localhost/ci_kepeg/admin/hapuspdf/kenaikan_gaji_berkala/' + data[0].id_kgb);
			}
		})
	});

	$('.download_sc').on('click', function () {
		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/ci_kepeg/admin/modal/surat_cuti',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('embed').attr('src', 'http://localhost/ci_kepeg/assets/uploads/pdf/' + data[0].path);
				$('.hapus-download').attr('href', 'http://localhost/ci_kepeg/admin/hapuspdf/surat_cuti/' + data[0].id_sc);
			}
		})
	});

	// ------------------------Upload---------------------------//
	$('.upload_st').click(function () {
		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/ci_kepeg/admin/modal/surat_tugas',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.uploading-st form').attr('action', 'http://localhost/ci_kepeg/admin/upload/surat_tugas/' + data[0].id_surat);
			}
		})
	});

	$('.upload_sc').click(function () {
		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/ci_kepeg/admin/modal/surat_cuti',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.uploading-sc form').attr('action', 'http://localhost/ci_kepeg/admin/upload/surat_cuti/' + data[0].id_sc);
			}
		})
	});

	$('.upload_kgb').click(function () {
		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/ci_kepeg/admin/modal/kenaikan_gaji_berkala',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.uploading-kgb form').attr('action', 'http://localhost/ci_kepeg/admin/upload/kenaikan_gaji_berkala/' + data[0].id_kgb);
			}
		})
	});

	//---------------------------Pengaturan--------------------------//
	$('#rubah').click(function () {
		$('.tab-pane input[type=text]').prop('readonly', false);
	})

	$(function () {
		loadData();

		$('.isikodesurat').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: $(this).attr('method'),
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function () {
					loadData();
					formFocus();
				}
			})
		})
	})

	function loadData() {
		$.get('http://localhost/ci_kepeg/pengaturan/kode_surat', function (data) {
			$('#content').html(data);
		})
	}

	function formFocus() {
		$('[type=text]').val('');
		$('[name=kodesurat]').focus();
	}

});
