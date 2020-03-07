<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
    <div class="row mt-0">
        <div class="col mb-0 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0"><?= $judul; ?></h3>
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
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Yang Ditugaskan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-danger">
                            <?php $i = (int)$this->uri->segment(3) + 1; ?>
                            <?php foreach ($data as $st) : ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <?= $st['no_surat']; ?><br>
                                    Tanggal
                                    <?= $this->librari->tgl_indo($st['tgl_srt']); ?>
                                </td>
                                <td>
                                    <?php
																		$tampil = $this->librari->tampilanst($st['ditugaskan']);
																		foreach ($tampil as $tampil) {
																			echo $tampil . '<br>';
																		}
																		?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/surat_tugas/pemulihan/' . $st["id_surat"]); ?>" data-toggle="tooltip" data-placement="bottom" title="Pulihkan"><i class="fas fa-recycle fa-lg mr-1"></i></a>
                                    <a href="<?= base_url('admin/surat_tugas/hapus_permanen/' . $st["id_surat"]); ?>" data-toggle="tooltip" data-placement="top" title="Hapus Permanent"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="thead-light">
                            <tr>
                                <th colspan="2"> </th>
                                <th colspan="2" class="text-right">
                                    <?= $pagination; ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 