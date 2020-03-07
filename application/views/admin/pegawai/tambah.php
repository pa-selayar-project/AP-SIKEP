    <div class="header bg-gradient-light pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
      <div class="row mt-0">
        <div class="col mb-0 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-uppercase"><?=$judul;?></h3>
                </div>
                <div class="col text-right">
                </div>
              </div>
            </div>
            <div class="row align-items-center pl-5 pr-5">
              <div class="col-md-6 pb-5">
                <div class="card">
                  <div class="card-header bg-gradient-warning text-light">
                    <strong>Nama Pegawai</strong>
                  </div>
                  <?php foreach($pegawai as $pgw) : ?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?=$pgw['nama_pegawai'];?>
                      <a href="<?=base_url();?>admin/pegawai/hapus/<?=$pgw['no_pgw'];?>" class="badge badge-danger float-right">Hapus</a>
                      <a href="<?=base_url();?>admin/pegawai/edit/<?=$pgw['no_pgw'];?>" class="badge badge-success float-right mr-1">Edit</a>
                    </li>
                  </ul>
                  <?php endforeach;?>
                </div>
              </div>
              <div class="col-md-6 pb-5">
                <div class="card">
                  <div class="card border-dark mb-3 pb-8">
                    <div class="card-header bg-gradient-cyan text-darker">Tambah Pegawai</div>
                    <div class="card-body text-dark">
                      <form action="POST">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Pegawai</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                          <small id="emailHelp" class="form-text text-muted">Isi nama lengkap dengan titel</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">NIP</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="NIP">
                          <small id="emailHelp" class="form-text text-muted">Isi Jabatan</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Pangkat/Gol. Ruang :</label>
                            <select class="custom-select custom-select-sm">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jabatan</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                          <small id="emailHelp" class="form-text text-muted">Isi Jabatan</small>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Pilih</label>
                          </div>
                        </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

