<!DOCTYPE html>
<html>
<head>
   
   <link type="text/css" href="<?=base_url();?>assets/css/mine.css" rel="stylesheet">
</head>
<body>
    <div class="kop">
        <img src="./assets/img/pgw/kop_surat.png" alt="kop">
    </div>
    <div class="judul">
        <b>SURAT IZIN CUTI TAHUNAN </b><br>
        Nomor : W20-A17/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/KP.05.2/<?=$this->librari->getRomawi(date("m"));?>/<?=date("Y");?>
    </div> 
    <div class="badan">
        <table width="500px">
            <?php foreach ($data as $data) : ?>
            <tr>
                <td width="30px">1.</td>
                <td colspan="3">
                    Memberikan cuti tahunan untuk tahun <?=date("Y");?> kepada Pegawai Negeri Sipil :
                </td>
            </tr>
            <tr>
                <td width="30px"></td>
                <td width="160px">Nama</td>
                <td width="30px">:</td>
                <td width="385px"><strong><?=$data['nama_pegawai'];?></strong></td>
            </tr>
            <tr>
                <td width="30px"></td>
                <td width="160px">NIP</td>
                <td width="30px">:</td>
                <td width="385px"><?=$data['nip_pegawai'];?></td>
            </tr>
            <tr>
                <td width="30px"></td>
                <td width="160px">Pangkat/Gol. Ruang</td>
                <td width="30px">:</td>
                <td width="385px"><?=$data['nama_pangkat'];?></td>
            </tr>
            <tr>
                <td width="30px"></td>
                <td width="160px">Jabatan</td>
                <td width="30px">:</td>
                <td width="385px"><?=$data['nama_jabatan'];?></td>
            </tr>
            <tr>
                <td width="30px"></td>
                <td width="160px">Satuan Organisasi</td>
                <td width="30px">:</td>
                <td width="385px">Pengadilan Agama Selayar</td>
            </tr>
            <tr>
                <td width="30px"></td>
                <td class="paragraph" colspan="3">
                <?php
                    $jumlah = $this->librari->jumlahCuti($data['tgl_sejak'], $data['tgl_sampai']);
                ?>
                Selama <?=$jumlah;?> (<?=$this->librari->terbilang($jumlah);?>) hari kerja , terhitung mulai tanggal <?=$this->librari->tgl_indo($data['tgl_sejak']);?> s/d <?=$this->librari->tgl_indo($data['tgl_sampai']);?>, selama menjalankan cuti beralamat di <?=$data['alamat_cuti'];?>, dengan ketentuan sebagai berikut :          
                </td>
            </tr>
             <tr>
                <td width="30px"></td>
                <td colspan="3">
                    <ol class="paragraph" type='a'>
                        <li>Sebelum menjalankan cuti tahunan wajib menyerahkan pekerjaannya kepada atasan langsungnya;</li>
                        <li>Setelah menjalankan cuti tahunan wajib melaporkan diri kepada atasan langsungnya dan bekerja sebagaimana mestinya.</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="30px">2.</td>
                <td class="paragraph" colspan="3">
                    Demikian surat izin cuti tahunan ini dibuat untuk dapat digunakan sebagaimana mestinya.
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="kaki">
       Selayar, <?=$this->librari->tgl_indo($data['tgl_surat']);?><br>
       Ketua<br><br><br><br><br>
            <?php foreach ($ketua as $ketua) : ?>
            <strong><?=$ketua['nama_pegawai'];?></strong><br>
            NIP <?=$ketua['nip_pegawai'];?>
            <?php endforeach;?>
    </div>
</body>
</html>