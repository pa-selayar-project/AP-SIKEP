<?php 
$i=1; 
?>
<table>
    <tr>
        <th>No.</th><th>Kode Surat</th><th>Keterangan</th>
    </tr>
    <?php foreach ($data as $data) :   ?>
    <tr>
        <td><?=$i;?></td>
        <td><?=$data['kode_surat'];?></td>
        <td><?=$data['Ket_kode_surat'];?></td>
    </tr>
    <?php $i++;?>
    <?php endforeach;?>
</table>