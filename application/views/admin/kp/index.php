  <!-- Header -->
  <div class="header bg-gradient-default pb-8 pt-5 pt-md-8"></div>
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
                <a href="#!" class="btn btn-sm btn-primary"><i class="ni ni-paper-diploma text-white"> Print</i></a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Pangkat YAD</th>
                    <th scope="col">Keterangan</th>
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
                    <?=$gb['nama_pegawai'];?><br>
                    <?=$gb['nama_pangkat'];?><br>
                    TMT. <?=$gb['tmt_pangkat_terakhir'];?>
                  </td>
                  <td>
                   <?=substr($gb['tmt_pangkat_terakhir'], 0, 6);?>
                   <?=substr($gb['tmt_pangkat_terakhir'], 6, 10)+4;?>
                  </td>
                  <td>
                   <?=$this->librari->tmtKp($gb['tmt_pangkat_terakhir'], $gb['no_pgw']);?>
                  </td>
                  <td>
                    <a href="<?=base_url('admin/kp/detail/'.$gb["no_pgw"]);?>" class="btn btn-sm btn-primary"><i class="ni ni-laptop text-white"></i> Detail</a>
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