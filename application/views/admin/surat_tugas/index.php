<!-- Header -->
<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
    <div class="row mt-0">
        <div class="col mb-0 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0"></h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary" onclick="javascript:history.back()"><i class="fas fa-angle-double-left"></i> Kembali</a>
                            <a href="<?= base_url('admin/surat_tugas_trash'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-trash-alt text-white"></i> Trash</a>
                            <a href="<?= base_url('admin/surat_tugas/tambah'); ?>" class="btn btn-sm btn-primary"><i class="ni ni-paper-diploma text-white">
                                    Tambah Data</i></a>
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
                        <tbody>
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
                                    <?php if ($st['path']) : ?>
                                    <a href=# class="download_st" data-toggle="modal" data-target="#download_st" data-placement="top" data-id="<?= $st['id_surat']; ?>" title="download"><i class="far fa-file-pdf fa-lg text-danger mr-1"></i></a>
                                    <?php else : ?>
                                    <a href=# class="upload_st" data-toggle="modal" data-target="#upload_st" title="Upload" data-placement="top" data-id="<?= $st['id_surat']; ?>"><i class="far fa-file-pdf fa-lg text-dark mr-1"></i></a>
                                    <?php endif; ?>
                                    <a href="<?= base_url('admin/surat_tugas/edit/' . $st["id_surat"]); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit fa-lg text-primary mr-1"></i></a>
                                    <a href="<?= base_url('admin/reports/surat_tugas/' . $st["id_surat"]); ?>" data-toggle="tooltip" data-placement="bottom" title="Print" target="_blank"><i class="fas fa-print fa-lg text-success mr-1"></i></a>
                                    <a href="<?= base_url('admin/surat_tugas/hapus/' . $st["id_surat"]); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
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