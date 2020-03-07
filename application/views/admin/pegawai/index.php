    <!-- Header -->
  <div class="header bg-gradient-success pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
      <div class="row mt-0">
        <div class="col mb-0 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"><?=$judul;?></h3>
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
                      <th scope="col">Foto</th>
                      <th scope="col">Nama Pegawai</th>
                      <th scope="col">Tanggal Lahir</th>
                      <th scope="col">Kontak</th>
                      <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i= 1; ?>
                  <?php foreach ($pegawai as $pgw) : ?>
                  <tr>
                    <td>
                      <?=$i++;?>
                    </td>
                    <td>
                      <img src="<?=base_url();?>assets/img/pgw/<?=$pgw['foto_pegawai'];?>" class="rounded-circle" width="75" height="75"> 
                    </td>
                    <td>
                      <strong><?=$pgw['nama_pegawai'];?></strong><br>
                      NIP <?=$pgw['nip_pegawai'];?><br>
                      <?=$pgw['nama_pangkat'];?><br>
                      <?=$pgw['nama_jabatan'];?>
                    </td>
                    <td>
                        Tanggal 
                        <?php
                          echo $this->librari->getUmurPegawai($pgw['nip_pegawai']);
                          echo '<br>';
                          echo $this->librari->hitungUmur($pgw['nip_pegawai']);
                        ?>
                    </td>
                    <td>
                      <?=$pgw['hp_pegawai'];?>
                    </td>
                    <td>
                      <a href="<?=base_url('admin/pegawai/detail/'.$pgw['no_pgw']);?>" class="badge badge-primary">Detail</a>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
      