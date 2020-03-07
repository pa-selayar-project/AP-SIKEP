<!-- Header -->
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
	<div class="row mt-0">
		<div class="col mb-0 mb-xl-0">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col">
							<?=$judul;?>
						</div>
						<div class="col text-right">
							<a href="#!" class="btn btn-sm btn-primary" onclick="javascript:history.back()"><i class="fas fa-angle-double-left"></i> Kembali</a>
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
						<?php if(!empty($param)) : ?>
						<?php $c=1; ?>
						<?php foreach ($param as $kgb) : ?>
						<tbody class="text-danger">
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
									<a href="<?=base_url('admin/kenaikan_gaji_berkala/pemulihan/'.$kgb["id_kgb"]);?>" data-toggle="tooltip" data-placement="bottom" title="Pulihkan"><i class="fas fa-recycle fa-lg mr-1"></i></a>
									<a href="<?=base_url('admin/kenaikan_gaji_berkala/hapus_permanen/'.$kgb["id_kgb"]);?>" data-toggle="tooltip" data-placement="top" title="Hapus Permanent"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
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
