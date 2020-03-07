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
							<?php endforeach;?>
						</div>
						<div class="col text-right">
							<a href="#!" class="btn btn-sm btn-primary"><i class="ni ni-paper-diploma text-white"></i> Print</a>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Nomor Surat</th>
								<th scope="col">TMT</th>
								<th scope="col">Masa Kerja Gol</th>
								<th scope="col">Tahun</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<?php if(!empty($detail)) : ?>
						<?php $c=1; ?>
						<?php foreach ($detail as $kgb) : ?>
						<tbody>
							<tr>
								<td>
									<?=$c++;?>
								</td>
								<td>
									<?=$kgb['no_surat'];?><br>
									Tanggal
									<?=$this->librari->tgl_indo($kgb['tgl_surat']);?>
								</td>
								<td>
									<?=$this->librari->tgl_indo($kgb['tmt']);?>
								</td>
								<td>
									<?=$kgb['mk_gol'];?>
								</td>
								<td>
									<?=date('Y', strtotime($kgb['tmt']));?>
								</td>
								<td>
									<?php if ($kgb['path']) : ?>
									<a href=# class="download_kgb" data-toggle="modal" data-target="#download_kgb" data-id="<?=$kgb['id_kgb'];?>" data-placement="top" title="download"><i class="far fa-file-pdf fa-lg text-danger mr-1"></i></a>
									<?php else : ?>
									<a href="#" class="upload_kgb" data-toggle="modal" data-target="#upload_kgb" data-id="<?=$kgb['id_kgb'];?>" title="Upload" data-placement="top"><i class="far fa-file-pdf fa-lg text-dark mr-1"></i></a>
									<?php endif;?>
									<a class="edit-st" href="<?=base_url('admin/kenaikan_gaji_berkala/edit/'.$kgb["id_kgb"]);?>"  data-id="<?=$kgb["id_kgb"];?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit fa-lg text-primary mr-1"></i></a>
									<a href="<?=base_url('admin/reports/kenaikan_gaji_berkala/'.$kgb["id_kgb"]);?>" data-toggle="tooltip" data-placement="bottom" title="Print" target="_blank"><i class="fas fa-print fa-lg text-success mr-1"></i></a>
									<a href="<?=base_url('admin/kenaikan_gaji_berkala/hapus/'.$kgb["id_kgb"]);?>" data-toggle="tooltip"
										data-placement="top" title="Hapus"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
								</td>
							</tr>
						</tbody>
						<?php endforeach;?>
						<?php else : ?>
						<tbody>
							<tr>
								<td colspan="6" class="pt-5 pb-5 text-center">
									<h3>DATA TIDAK ADA</h3>
								</td>
							</tr>
						</tbody>
						<?php endif;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
