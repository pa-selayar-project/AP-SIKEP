<div class="header bg-gradient-info pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
    <div class="row mt-0">
        <div class="col mb-0 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">
                                <?= $judul; ?>
                            </h3>
                        </div>
                        <div class="col text-right">
                            <button type="submit" id="simpan" class="btn bg-gradient-primary">Simpan</button>
                            <a href="#" id="rubah" class="btn bg-gradient-green rubah">Ubah</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- <div class="container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link pr-4 pl-4" href="#profil" role="tab" data-toggle="tab">Profil Pengadilan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pr-4 pl-4" href="#setting_user" role="tab" data-toggle="tab">Setting User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pr-4 pl-4" href="#setting_app" role="tab" data-toggle="tab">Setting App</a>
                            </li>
                        </ul>
                        <br>
                       
                    <div class="tab-content">
                       
                        <div role="tabpanel" class="tab-pane fade" id="profil">
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Nama Pengadilan</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3"><strong>Pengadilan Agama Selayar</strong></div>
                            </div>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Alamat</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-6">
                                    Jalan Jend. Ahmad Yani No. 133, Kelurahan Benteng, Kecamatan Benteng, Kabupaten Kepulauan Selayar
                                </div>
                            </div>
                            <hr>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Kop Surat</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3">
                                    <input type="file" class="file-control">
                                </div>
                            </div>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Kop Surat SK</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3">
                                    <input type="file" class="file-control">
                                </div>
                            </div>
                        </div>
                       
                        <div role="tabpanel" class="tab-pane fade" id="setting_user">
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Username</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="rizaldy112" readonly>
                                </div>
                            </div>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Password</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3">
                                    <input type="password" class="form-control" value="password" readonly>
                                </div>
                            </div>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Level</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Admin" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Tingkat Banding</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="Pengadilan Tinggi Agama Makassar" readonly>
                                </div>
                            </div>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Nama Pengadilan</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="PENGADILAN AGAMA SELAYAR" readonly>
                                </div>
                            </div>
                            <div class="row pl-4 pb-2">
                                <div class="col-md-2">Alamat</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-5">
                                    <textarea rows=3 class="form-control">Jalan Jend. Ahmad Yani No. 133, Kelurahan Benteng, Kecamatan Benteng, Kabupaten Kepulauan Selayar
										</textarea>
                                </div>
                            </div>

                        </div>
                       
                        <div role="tabpanel" class="tab-pane fade" id="setting_app">
                            <div class="row pl-4">
                                <div class="col-md-2">TA</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2019" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <div class="container">
                        <h1>Membuat Navigasi Tabs dan Pills Bootstrap | www.malasngoding.com</h1>
                        <br />
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                            <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>HOME</h3>
                                <p>www.malasngoding.com</p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Tutorial pemrograman web, mobile dan design</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Membuat navigasi tabs dan pills bootstrap.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 