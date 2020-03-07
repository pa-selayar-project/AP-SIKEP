  <!-- Header -->
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
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
              </div>
              <div class="col text-right">
                <strong class="text-danger"><i class="ni ni-calendar-grid-58 text-danger"></i> Cuti Tahunan 2018 = 12</strong>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>    
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Sisa Cuti <br> Tahun Lalu</th>
                    <th scope="col">Sisa Cuti <br> Tahun Ini</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i= 1; ?>             
                <?php foreach ($pegawai as $gb) : ?>
                <tr>
                  <td>
                    <?=$i++;?>
                  </td>
                  <td>
                    <?=$gb['nama_pegawai'];?>
                  </td>
                  <td>
                    0
                  </td>
                   <td>
                    0
                  </td>
                   <td>
                   <a href="<?=base_url('admin/surat_cuti/detail/'.$gb["no_pgw"]);?>" class="btn btn-sm btn-primary"><i class="ni ni-laptop text-white"></i> Detail</a>
                    <a href="<?=base_url('admin/surat_cuti/tambah/'.$gb["no_pgw"]);?>" class="btn btn-sm btn-success"><i class="ni ni-plus text-white"></i> Tambah</a>
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