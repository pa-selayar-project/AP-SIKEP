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
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col text-right">
                            <a href="javascript:history.back()" class="btn btn-sm btn-primary"><i class="ni ni-paper-diploma text-white"> Kembali</i></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <div class="text-center"><?=validation_errors();?></div>
                
                    <form method="POST" action="">
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <div>
                                        <label for="ditugaskan">Pegawai yang ditugaskan :</label>
                                    </div>
                                <?php foreach ($pegawai as $peg) : ?>   						
                                    <div> 
                                        <input type="checkbox" name="ditugaskan[]" value="<?=$peg['nip_pegawai'];?>">&nbsp;<?=$peg['nama_pegawai'];?>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td>
                                                    W20-A17/&nbsp;
                                                </td>
                                                <td>
                                                    <input type="text" name="no_st" class="form-control" style="width:70px;" placeholder="No" value="">
                                                </td>
                                                <td>
                                                    &nbsp;/&nbsp;
                                                </td>
                                                <td>
                                                    <select class="form-control" name="kode_st" require="required">
                                                        <option value="" selected="selected">Pilih</option>
                                                        <?php foreach ($kode as $kode) : ?>
                                                        <option value="<?=$kode['kode_surat'];?>"><?=$kode['kode_surat'];?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </td>
                                                <td>
                                                    &nbsp;/ <?=$this->librari->getRomawi(date("m"));?> / <?=date("Y");?>
                                                </td>
                                                <td>
                                                    &nbsp;&nbsp;Tgl.&nbsp;&nbsp;
                                                </td>
                                                <td>
                                                    <div class="input-group date">
                                                        <input type="date" name="tgl_srt" class="form-control" id="tgl_srt" placeholder="Tgl">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>	
                                    <div class="form-group">
                                        <textarea rows="2" type="text" name="pertimbangan" class="form-control" placeholder="Pertimbangan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="dasar_st" class="form-control" placeholder="Dasar Surat">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="2" type="text" name="maksud" class="form-control" placeholder="Maksud Surat Tugas"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="radios">Keterangan  :</label>
                                        <label class="radio-inline mr-3 ml-5" for="radios-0">
                                            <input type="radio" name="ket" id="radios-0" value="1" checked="checked">DIPA
                                        </label> 
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="ket" id="radios-1" value="2">Non DIPA
                                        </label> 
                                    </div>
                                    <div class="form-group form-inline">
                                        <label class="control-label" for="penandatangan">Penandatangan :</label>
                                        <div class="col">
                                            <?php 
                                                $penandatangan = ['Ketua','Panitera','Sekretaris'];
                                            ?>
                                            <select class="form-control" name="penandatangan" required>
                                            <?php foreach($penandatangan as $value) { ?>
                                                <option value="<?=$value;?>"><?=$value;?></option>
                                            <?php } ?>    
                                            </select>
                                        </div>
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
