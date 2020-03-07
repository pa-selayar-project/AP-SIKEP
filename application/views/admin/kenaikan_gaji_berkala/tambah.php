<!-- Header -->
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
	<div class="row mt-0">
		<div class="col mb-0 mb-xl-0">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col">
							<?php foreach ($pegawai as $pegawai) : ?>
							<h3 class="mb-0">
								<?=$pegawai['nama_pegawai'];?>
							</h3>
						</div>
						<div class="col text-right">
							<a href="#!" class="btn btn-sm btn-primary"><i class="ni ni-paper-diploma text-white"></i> Print</a>
						</div>
					</div>
				</div>
				<div class="row pr-2 pl-2">
					<div class="col-sm-6 pr-0">
						<div class="card">
							<div class="card-body">
								<?=validation_errors();?>
								<h5 class="card-title">Informasi KGB yang lalu :</h5>
								<form method="POST" action="<?=base_url();?>admin/kenaikan_gaji_berkala/tambah/<?=$pegawai['no_pgw'];?>">
									<div class="form-group">
										<label for="no_kgb">Nomor Surat KGB yang lalu</label>
										<input type="hidden" name="id_pegawai" value="<?=$pegawai['no_pgw'];?>">
										<input type="text" class="form-control form-control-sm" id="no_kgb_lama" name="no_kgb_lama" aria-describedby="kgb">
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="tgl_lama">Tanggal</label>
											<input type="date" class="form-control form-control-sm" id="tgl_lama" name="tgl_lama" aria-describedby="tgl_lama">
										</div>
										<div class="form-group col-md-6">
											<label for="tmt_lama">TMT</label>
											<input type="date" class="form-control form-control-sm" id="tmt_lama" name="tmt_lama" aria-describedby="tmt_lama">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="mk_gol_lama">Masa Kerja Golongan</label>
											<input type="text" class="form-control form-control-sm" id="mk_gol_lama" name="mk_gol_lama" aria-describedby="mk_gol_lama">
										</div>
										<div class="form-group col-md-6">
											<label for="gaji_lama">Gaji Lama</label>
											<input type="number" class="form-control form-control-sm" id="gaji_lama" name="gaji_lama" aria-describedby="gaji_lama"
											 placeholder="Rp......">
										</div>
									</div>
									<div class="form-group">
										<label for="satker_lama">Satuan Kerja</label>
										<input type="text" class="form-control form-control-sm" id="satker_lama" name="satker_lama" aria-describedby="satker_lama">
									</div>
									<div class="form-group">
										<label for="pjbt_lama">Pejabat Penandatangan</label>
										<input type="text" class="form-control form-control-sm" id="pjbt_gaji_lama" name="pjbt_gaji_lama"
										 aria-describedby="pjbt_lama">
									</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 pl-1">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Pengusulan KGB saat ini :</h5>
								<form method="POST" action="">
									<label for="no_kgb_lama">Nomor Surat KGB saat ini</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text form-control-sm" id="kgb">W20-A17 / </span>
										</div>
										<input type="number" name="no_kgb" id="no_kgb" class="form-control form-control-sm" placeholder="Nomor Surat"
										 aria-label="Username" aria-describedby="kgb">
										<div class="input-group-append">
											<span class="input-group-text form-control-sm" id="kgb2">/ KP.04.2 /
												<?=$this->librari->getRomawi(date('m'));?> /
												<?=date('Y');?></span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="tgl">Tanggal</label>
											<input type="date" class="form-control form-control-sm" id="tgl" name="tgl" aria-describedby="tgl">
										</div>
										<div class="form-group col-md-6">
											<label for="tmt">TMT</label>
											<input type="date" class="form-control form-control-sm" id="tmt" name="tmt" aria-describedby="tmt">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="mk_gol">Masa Kerja Golongan</label>
											<input type="text" class="form-control form-control-sm" id="mk_gol" name="mk_gol" aria-describedby="mk_gol">
										</div>
										<div class="form-group col-md-6">
											<label for="gaji">Gaji Baru</label>
											<input type="number" class="form-control form-control-sm" id="gaji" name="gaji" aria-describedby="gaji"
											 placeholder="Rp......">
										</div>
									</div>
									<div class="form-group">
										<label for="satker">Satuan Kerja</label>
										<input type="text" class="form-control form-control-sm" id="satker" name="satker" aria-describedby="satker"
										 value="Pengadilan Agama Selayar" readonly>
									</div>
									<div class="form-group">
										<label for="pjbt">Pejabat Penandatangan</label>
										<input type="text" class="form-control form-control-sm" name="pjbt" value="Ketua Pengadilan Agama Selayar" id="pjbt"
										 aria-describedby="pjbt" readonly>
									</div>
									<button type="submit" class="btn btn-success">Kirim</button>
									<button type="reset" class="btn btn-danger">Reset</button>
							</div>
							</form>
						</div>
					</div>
					<?php endforeach;?>
				</div>
