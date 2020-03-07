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
                  <h3 class="mb-0"><?=$pegawai['nama_pegawai'];?></h3>
                  <?php endforeach;?>
                </div>
                <div class="col text-right">
                  <strong class="text-danger"></strong>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                      <th scope="col">No.</th>    
                      <th scope="col">Nomor Surat</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Tanggal Mulai</th>
                      <th scope="col">Tanggal Akhir</th>
                      <th scope="col">Arsip File</th>
                  </tr>
                </thead>
                <?php if(!empty($sc)) : ?>
                <?php $c=1; ?>
                <?php foreach ($sc as $sc) : ?>
                <tbody>
                  <tr>
                      <td><?=$c++;?></td>    
                      <td><?=$sc['nomor_surat'];?></td>
                      <td><?=$this->librari->tgl_indo($sc['tgl_surat']);?></td>
                      <td><?=$this->librari->tgl_indo($sc['tgl_sejak']);?></td>
                      <td><?=$this->librari->tgl_indo($sc['tgl_sampai']);?></td>
                      <td>
                       <?php if ($sc['path']) : ?> 
                        <a href=# class="download_sc" data-toggle="modal" data-target="#download_sc" data-id="<?=$sc['id_sc'];?>" data-placement="top" title="download"><i class="far fa-file-pdf fa-lg text-danger mr-1"></i></a>
                       <?php else : ?>
                        <a href=# class="upload_sc" data-toggle="modal" data-target="#upload_sc" data-id="<?=$sc['id_sc'];?>" title="Upload"><i class="far fa-file-pdf fa-lg text-dark mr-1"></i></a>
                       <?php endif;?>
                        <a href="<?=base_url('admin/surat_cuti/edit/'.$sc["id_sc"]);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit fa-lg text-primary mr-1"></i></a>
                        <a href="<?=base_url('admin/reports/surat_cuti/'.$sc["id_sc"]);?>" data-toggle="tooltip" data-placement="bottom" title="Print" target="_blank"><i class="fas fa-print fa-lg text-success mr-1"></i></a>
                        <a href="<?=base_url('admin/surat_cuti/hapus/'.$sc["id_sc"]);?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
                      </td>
                  </tr>
                <?php endforeach;?>
                </tbody>
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