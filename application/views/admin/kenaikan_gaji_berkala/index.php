    <!-- Header -->
<div class="header bg-gradient-info pb-8 pt-5 pt-md-8"></div>
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
              <a href="<?=base_url('admin/trash/kenaikan_gaji_berkala');?>" class="btn btn-sm btn-warning"><i class="fas fa-trash-alt text-white"></i> Trash</a>
              <a href="#!" class="btn btn-sm btn-primary" onclick="javascript:history.back()"><i class="fas fa-angle-double-left"></i> Kembali</a>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                  <th scope="col">No.</th>    
                  <th scope="col">Nama Pegawai</th>
                  <th scope="col">KGB</th>
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
                  <?=$pgw['nama_pegawai'];?>
                </td>
                <td>
                  <?=$this->librari->tmtKgb($pgw['nip_pegawai'], $pgw['no_pgw'] );?>
                </td>
                <td>
                  <a href="<?=base_url();?>admin/kenaikan_gaji_berkala/detail/<?=$pgw['no_pgw'];?>" class="btn btn-primary btn-sm float-right" role='button' aria-pressed='true'>Detail</a>
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
