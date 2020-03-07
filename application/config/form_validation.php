<?php

$config = array(
        'register' => array(
                array('field' => 'email','label' => 'Email','rules' => 'required|trim|valid_email|is_unique[tb_user.email]'),
                array('field' => 'username','label' => 'Username','rules' => 'required|trim'),
                array('field' => 'password','label' => 'Password','rules' => 'required|matches[password2]'),
                array('field' => 'password2','label' => 'Ulang Password','rules' => 'required|matches[password]'),
        ),
        'login' => array(
                array('field' => 'username','label' => 'Username','rules' => 'required|trim'),
                array('field' => 'password','label' => 'Password','rules' => 'required|trim'),
        ),
        'tambah' => array(
                array('field' => 'no_surat','label' => 'Nomor Surat','rules' => 'numeric'),
                array('field' => 'tgl_st','label' => 'Tanggal Surat','rules' => 'required'),
                array('field' => 'ditugaskan[]','label' => 'Yang Ditugaskan','rules' => 'required'),
                array('field' => 'dasar_st','label' => 'Dasar Surat','rules' => 'required'),
                array('field' => 'pertimbangan','label' => 'Pertimbangan','rules' => 'required'),
                array('field' => 'maksud','label' => 'Maksud Surat','rules' => 'required'),
                array('field' => 'ket','label' => 'Keterangan','rules' => 'required'),
                array('field' => 'penandatangan','label' => 'Penandatangan','rules' => 'required')
        ),
                /*surat cuti*/
        'tambah_surat_cuti' => array(
                array('field' => 'tgl_sc','label' => 'Tanggal Surat','rules' => 'required'),
                array('field' => 'sejak','label' => 'Tanggal Mulai','rules' => 'required'),
                array('field' => 'sampai','label' => 'Tanggal Akhir','rules' => 'required'),
                array('field' => 'alamat','label' => 'Alamat','rules' => 'required')
        ),
                 /*surat Surat Tugas*/
        'tambah_surat_tugas' => array(
                 array('field' => 'pertimbangan','label' => 'Pertimbangan','rules' => 'required'),
                 array('field' => 'dasar_st','label' => 'Dasar Surat Tugas','rules' => 'required'),
                 array('field' => 'maksud','label' => 'Maksud Surat Tugas','rules' => 'required')
        ),
                 /*surat KGB*/
        'tambah_kgb' => array(
                 array('field' => 'tgl','label' => 'Tanggal Surat','rules' => 'required'),
                 array('field' => 'id_pegawai','label' => 'id_pegawai','rules' => 'required'),
                 array('field' => 'gaji_lama','label' => 'Gaji Lama','rules' => 'required'),
                 array('field' => 'pjbt_gaji_lama','label' => 'Pejabat Gaji Lama','rules' => 'required'),
                 array('field' => 'no_kgb_lama','label' => 'Nomor Surat Gaji Lama','rules' => 'required'),
                 array('field' => 'tgl_lama','label' => 'Tanggal Surat Gaji Lama','rules' => 'required'),
                 array('field' => 'tmt_lama','label' => 'TMT Gaji Lama','rules' => 'required'),
                 array('field' => 'mk_gol_lama','label' => 'Masa Kerja Golongan Lama','rules' => 'required'),
                 array('field' => 'satker_lama','label' => 'Satker Lama','rules' => 'required'),
                 array('field' => 'gaji','label' => 'Gaji Baru','rules' => 'required'),
                 array('field' => 'mk_gol','label' => 'Masa Kerja Golongan','rules' => 'required'),
                 array('field' => 'tmt','label' => 'Tanggal Mulai Tugas','rules' => 'required'),
        ),
        'edit_kgb' => array(
                 array('field' => 'tgl','label' => 'Tanggal Surat','rules' => 'required'),
                 array('field' => 'id_pgw','label' => 'id_pegawai','rules' => 'required'),
                 array('field' => 'gaji_lama','label' => 'Gaji Lama','rules' => 'required'),
                 array('field' => 'pjbt_gaji_lama','label' => 'Pejabat Gaji Lama','rules' => 'required'),
                 array('field' => 'no_kgb_lama','label' => 'Nomor Surat Gaji Lama','rules' => 'required'),
                 array('field' => 'tgl_lama','label' => 'Tanggal Surat Gaji Lama','rules' => 'required'),
                 array('field' => 'tmt_lama','label' => 'TMT Gaji Lama','rules' => 'required'),
                 array('field' => 'mk_gol_lama','label' => 'Masa Kerja Golongan Lama','rules' => 'required'),
                 array('field' => 'satker_lama','label' => 'Satker Lama','rules' => 'required'),
                 array('field' => 'gaji','label' => 'Gaji Baru','rules' => 'required'),
                 array('field' => 'mk_gol','label' => 'Masa Kerja Golongan','rules' => 'required'),
                 array('field' => 'tmt','label' => 'Tanggal Mulai Tugas','rules' => 'required'),
        )
);