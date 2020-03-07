<head>   
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/mine.css" />
</head>
<body>
   <img src="./assets/img/pgw/kop_surat.png"/>

<?php foreach ($data as $data) : ?>
<table class="table_luar" width="715px"> 
    <tr>
        <td class="rentang">
            <center>  
            <b>SURAT TUGAS</b><br>
            Nomor : <?=$data['no_surat'];?> <br>
            <?=strtoupper($data['penandatangan']);?> PENGADILAN AGAMA SELAYAR
            </center>
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>
<table class="table_luar" width="715px">  
    <tr>
        <td width="100px">Menimbang</td>
        <td width="20px">:</td>
        <td colspan="5"><?=$data['menimbang'];?></td>
    </tr>
    <tr>
        <td width="100px">Dasar</td>
        <td width="20px">:</td>
        <td width="30px"> 1</td>
        <td colspan="4"><?=$data['dasar_surat'];?></td>
    </tr>
    <tr>
        <td width="100px"></td>
        <td width="20px"></td>
        <td width="30px"> 2.</td>
        <td colspan="4">Daftar Isian Pelaksanaan Anggaran (DIPA) Pengadilan Agama Selayar Tahun Anggaran 2019 Nomor : SP DIPA-005.01.2.307562/ 2019;</td>
    </tr>
    <tr>
        <td colspan=7 align="center"><center><strong>MEMBERIKAN TUGAS</strong></center></td>
    </tr>
</table>

<table class="table_luar rentang">
    <tr>
        <td width="100px">Kepada</td>
        <td width="20px">:</td>                    
    </tr>
</table>

<table class="table_dalam rentang" style="margin-left: 135px;margin-top: -100px;">
    <?php 
    $c = 1.;
    foreach ($ditugaskan as $ditugaskan) : ?>
    <tr>
        <td width="20px"><?=$c;?></td>
        <td width="120px">Nama</td>
        <td width="20px">:</td>
        <td width="150px"><?=$ditugaskan['nama_pegawai'];?></td>
    </tr>
    <tr>
        <td width="20px"></td>
        <td width="120px">Nip</td>
        <td width="20px">:</td>
        <td width="150px"><?=$ditugaskan['nip_pegawai'];?></td>
    </tr>
    <tr>
        <td width="20px"></td>
        <td width="120px">Pangkat</td>
        <td width="20px">:</td>
        <td width="150px"><?=$ditugaskan['nama_pangkat'];?></td>
    </tr>
    <tr>
        <td width="20px"></td>
        <td width="120px">Jabatan</td>
        <td width="20px">:</td>
        <td width="150px"><?=$ditugaskan['nama_jabatan'];?></td>
    </tr>
    <?php $c++; endforeach;?>
</table>

  
<table class="table_luar rentang" width="715px"> 
    <tr>
        <td width="100px">Maksud</td>
        <td width="20px">:</td>
        <td colspan="5"><?=$data['maksud'];?></td>
    </tr>
</table>
<table class="table_luar rentang" width="715px">
    <tr>
        <td width="100px">Keterangan</td>
        <td width="20px">:</td>
        <td colspan="5"><?=($data['ket'] == 1)?'Biaya kegiatan ini dibebankan kepada DIPA Pengadilan Agama Selayar Tahun Anggaran 2019;':'-';?></td>
    </tr>
</table>
<table class="table_luar rentang" width="715px">
    <tr>
        <td colspan="7">Demikian surat tugas ini diberikan kepada yang bersangkutan untuk dilaksanakan.</td>
    </tr>
    <tr>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td colspan="2">selayar,<?=$this->librari->tgl_indo($data['tgl_srt']);?></td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td colspan="2"><?=$data['penandatangan'];?></td>
    </tr>
    <tr>
        <td colspan="5"><br></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="5"><br></td>
        <td colspan="2"></td>
    </tr>
    <?php foreach($penandatangan as $ttd) : ?>
    <tr>
        <td colspan="5"></td>
        <td colspan="2"><?=$ttd['nama_pegawai'];?>
        <br>NIP <?=$ttd['nip_pegawai'];?>
        </td>           
    </tr>           
    <?php endforeach;?>
</table>
<?php endforeach;?>