<!DOCTYPE html>
<html>
<head>
   <link type="text/css" href="./assets/css/mine.css" rel="stylesheet">
</head>
<body>
    <img class="kop-kecil" src="./assets/img/pgw/kop_kecil.png">
    <br><br><br><br><br>
    <center>
    <?php foreach($data as $data) : ?>
        <strong>
            SURAT PEMBERITAHUAN <br>
            KETUA PENGADILAN AGAMA SELAYAR <br>
            NOMOR : <?=$data['no_surat'];?>
        </strong>
    </center>
    <table class="table-luar rentang-kgb" width="700px">
        <tr><td><center>tentang</center></td></tr>
        <tr><td><center><strong>KENAIKAN GAJI BERKALA</strong></center></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Peraturan Pemerintah Republik lndonesia Nomor 30 Tahun 2015 tentang Perubahan Ketujuh Belas atas Peraturan Pemerintah Nomor 7 Tahun 1977 tentang Peraturan Gaji Pegawai Negeri Sipil dan dengan telah dipenuhinya masa kerja dan syarat-syarat lain, bersama ini diberitahukan kepada:</td></tr>
    </table>
    <table class="table-luar rentang-kgb" width="700px">
        <tr>
            <td width="20px">1.</td>
            <td width="250px">Nama</td>
            <td width="20px">:</td>
            <td width="350px"><strong><?=$data['nama_pegawai'];?></strong></td>
        </tr>
        <tr>
            <td>2.</td>
            <td> Tempat / Tanggal lahir</td>
            <td>:</td>
            <td><?=$data['tempat_lahir'];?>, <?=$this->librari->getTglLahir($data['nip_pegawai']);?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>NIP</td>
            <td>:</td>
            <td><?=$data['nip_pegawai'];?></td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Pangkat/Golongan ruang</td>
            <td>:</td>
            <td><?=$data['nama_pangkat'];?></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Satuan kerja</td>
            <td>:</td>
            <td>Pengadilan Agama Selayar</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Gaji pokok lama</td>
            <td>:</td>
            <td><?=$this->librari->rupiah($data['gaji_lama']);?></td>
        </tr>
    </table>
    <table class="table-luar rentang-kgb" width="700px">
        <tr><td>Diberikan Kenaikan Gaji Berkala hingga memperoleh :</td></tr>
    </table>
    <table class="table-luar rentang-kgb" width="700px">
        <tr>
            <td width="20px">7.</td>
            <td width="250px">Gaji pokok baru</td>
            <td width="20px">:</td>
            <td width="350px"><?=$this->librari->rupiah($data['gaji_baru']);?></td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Masa kerja golongan gaji</td>
            <td>:</td>
            <td><?=$data['mk_gol'];?></td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Pangkat/Golongan ruang</td>
            <td>:</td>
            <td><?=$data['nama_pangkat'];?></td>
        </tr>
        <tr>
            <td>10.</td>
            <td>TMT</td>
            <td>:</td>
            <td><?=$this->librari->tgl_indo($data['tmt']);?></td>
        </tr>
    </table>
    <table class="table-luar rentang-kgb" width="700px">
        <tr><td>Atas dasar surat keputusan terakhir tentang gaji/pangkat yang ditetapkan :</td></tr>
    </table>
    <table class="table-luar rentang-kgb" width="700px">
        <tr>
            <td width="100px">&nbsp;</td>
            <td width="20px">a.</td>
            <td width="120px">Oleh Pejabat</td>
            <td width="20px">:</td>
            <td width="320px"><?=$data['pjbt_gaji_lama'];?></td>
        </tr>
        <tr>
            <td width="100px">&nbsp;</td>
            <td width="20px">b.</td>
            <td width="120px">Nomor / tanggal</td>
            <td width="20px">:</td>
            <td width="320px"><?=$data['no_gaji_lama'];?>, Tanggal <?=$this->librari->tgl_indo($data['tgl_gaji_lama']);?></td>
        </tr>
        <tr>
            <td width="100px">&nbsp;</td>
            <td width="20px">c.</td>
            <td width="120px">TMT</td>
            <td width="20px">:</td>
            <td width="320px"><?=$this->librari->tgl_indo($data['tmt_gaji_lama']);?></td>
        </tr>
        <tr>
            <td width="100px">&nbsp;</td>
            <td width="20px">d.</td>
            <td width="120px">Masa kerja golongan</td>
            <td width="20px">:</td>
            <td width="320px"><?=$data['mk_gol_lama'];?></td>
        </tr>
    </table>
    <table class="table-luar rentang-kgb" width="700px">
        <tr>
            <td width="20px">11.</td>
            <td width="250px">Kenaikan Gaji Berkala berikutnya</td>
            <td width="20px">:</td>
            <td width="350px"><?=$this->librari->tgl_indo($data['tmt_yad']);?></td>
        </tr>
    </table>
    <br>
    <table class="table-luar rentang-kgb" width="700px">
        <tr><td>Keterangan :</td></tr>
    </table>
<?php endforeach;?>
    <table class="table-luar rentang-kgb" width="700px">
        <tr>
            <td width="20px">1.</td>
            <td width="620px">Surat Pemberitahuan ini disampaikan kepada yang bersangkutan untuk dapat dipergunakan seperlunya;</td>
        </tr>
        <tr>
            <td width="20px">2.</td>
            <td width="620px">Apabila dikemudian hari ternyata terdapat kekeliruan dalam surat pemberitahuan ini akan diadakan perbaikan dan perhitungan kembali sebagaimana mestinya;</td>
        </tr>
    </table>
    <br>
    <table class="table-luar rentang-kgb rapat" width="700px">
        <tr>
            <td rowspan="8" width="300px">Tembusan Yth:
                <ol type="1" width="80">
                    <li>Sekretaris Mahkamah Agung Rl, Jakarta;</li>
                    <li>Dirjen Badan Peradilan Agama MARI, Jakarta;</li>
                    <li>Kepala Badan Urusan Administrasi MARI, Jakarta;</li>
                    <li>Kepala Biro Kepegawaian MARI, Jakarta;</li>
                    <li>Ketua Pengadilan Tinggi Agama Makasar</li>
                    <li>Kepala Kantor Regional IV BKN Makassar</li>
                    <li>Kepala Kanwil XXlll Ditjen Perbendaharaan Dep. Keuangan Makassar;</li>
                    <li>Kepala Kantor Cabang Utama PT. Taspen Makassar;</li>
                    <li>PPABP Pengadilan Agama Selayar;</li>
                    <li>Pegawai yang bersangkutan.</li>
                </ol>
            </td>
            <td width="50px">&nbsp;</td>
            <td width="100px">Ditetapkan di <br>Pada Tanggal</td>
            <td width="20px">:<br>:</td>
            <td width="130px">Selayar<br><?=$this->librari->tgl_indo($data['tgl_surat']);?></td>
        </tr>
        <tr>
            <td width="50px">&nbsp;</td>
            <td colspan="3">Ketua Pengadilan Agama Selayar</td>
        </tr>
        <tr>
            <td width="50px">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td width="50px">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
        </tr>
        <?php foreach($ketua as $ketua) : ?>
        <tr>
            <td width="50px">&nbsp;</td>
            <td colspan="3"><strong><?=$ketua['nama_pegawai'];?></strong> <br>
            NIP <?=$ketua['nip_pegawai'];?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>