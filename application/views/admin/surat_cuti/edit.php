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
            
            <form method="POST" action="">
              <?php foreach ($sc as $sc) : ?> 
                <div class="form-row mr-5 ml-5">
                    <div class="col-md-4">
                        <div class="form-group has-success">
                            <label for="nama">Nama Pegawai</label>
                            <input type="hidden" name="idPegawai" value="<?=$sc['id_sc'];?>">
                            <input type="text" class="form-control form-control-alternative is-valid" name="namaPegawai" id="nama" value="<?=$sc['nama_pegawai'];?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-success">
                            <label for="nipPegawai">NIP</label>
                            <input type="text" class="form-control form-control-alternative is-valid" name="nipPegawai" id="nipPegawai" value="<?=$sc['nip_pegawai'];?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="noSurat">No. Surat</label>
                            <input type="number" class="form-control form-control-alternative" name="no_surat" id="noSurat" value="<?=$sc['nomor_surat'];?>" placeholder="Harus angka">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tgl_sc">Tanggal Surat</label>
                            <input type="date" name="tgl_sc" class="form-control" id="tgl_sc" placeholder="Tgl" value="<?=$sc['tgl_surat'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-row mr-5 ml-5">
                    <div class="col-md-3">      
                        <div class="form-group">
                            <label for="sejak">Tanggal Cuti</label>
                            <input type="date" name="sejak" class="form-control" id="sejak" value="<?=$sc['tgl_sejak'];?>">
                        </div>
                        <div class="form-group">
                            <input type="date" name="sampai" class="form-control" value="<?=$sc['tgl_sampai'];?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_merah">Tanggal Merah</label>
                            <input type="number" name="tgl_merah" class="form-control" id="tanggal_merah" placeholder="Harus angka">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="alamat">Alamat Selama Cuti :</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="9"><?=$sc['alamat_cuti'];?></textarea>
                        </div>
                    </div>
                </div> 
              <?php endforeach;?> 
              <div class="form-group mr-5 ml-5 float-right">
                    <button class="btn btn-success" type="submit" name="kirim">Kirim</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>  
            </form>


     