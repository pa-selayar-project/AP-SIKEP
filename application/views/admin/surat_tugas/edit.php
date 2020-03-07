<!-- Header --> 
<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8"></div>
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
                            <a href="javascript:history.back()" class="btn btn-sm btn-primary"><i class="ni ni-paper-diploma text-white"> Kembali</i></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <form method="POST" action="">
                    <?php foreach ($st as $st) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div>
                                    <label for="ditugaskan">Pegawai yang ditugaskan :</label>
                                </div>
                            <?php foreach ($pegawai as $peg) : ?>   						
                                <div> 
                                    <input type="hidden" name="id_surat" value="<?=$st['id_surat'];?>">
                                    <input type="checkbox" name="ditugaskan[]" value="<?=$peg['nip_pegawai'];?>">&nbsp;<?=$peg['nama_pegawai'];?>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <div class="form-row col-md-8">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="no_st" class="form-control"  placeholder="No" value="<?=$st['no_surat'];?>">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group text-center align-text-bottom">
                                        Tgl.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <input type="text" class="form-control pull-right" name="tgl_srt" id="tanggal" value="<?=$st['tgl_srt'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="2" type="text" name="pertimbangan" class="form-control"><?=$st['menimbang'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="dasar_st" class="form-control" value="<?=$st['dasar_surat'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12">    
                                    <div class="form-group">
                                        <textarea rows="2" type="text" name="maksud" class="form-control"><?=$st['maksud'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="radios">Keterangan  :</label>
                                        <label class="radio-inline mr-3 ml-5" for="radios-0">
                                            <input type="radio" name="ket" id="radios-0" value="1" checked="checked">DIPA
                                        </label> 
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="ket" id="radios-1" value="2">Non DIPA
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-inline">
                                        <label class="control-label" for="penandatangan">Penandatangan :</label>
                                        <div class="col">
                                            <select class="form-control" name="penandatangan" required>
                                                <option value="" selected>---Pilih---</option>
                                                <option value="Ketua">Ketua</option>
                                                <option value="Sekretaris">Sekretaris</option>
                                                <option value="Panitera">Panitera</option>
                                            </select>
                                        </div>
                                        <?php endforeach;?>
                                        <div class="col">
                                            <button type="submit" name="kirim" class="btn btn-success mr-5">
                                                Kirim 
                                            </button>	
                                            <button type="reset" name="reset" class="btn btn-warning">
                                                Reset
                                            </button>		
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
