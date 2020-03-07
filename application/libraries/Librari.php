<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Librari {
        public $nip;
        public $tahun_ini;

        public function getUmurPegawai($nip)
	    {
                $tahun   = substr($nip,0,4);
                $bulan   = substr($nip,4,2);
                $tanggal = substr($nip,6,2);
                return $tanggal.'-'.$bulan.'-'.$tahun;
        }
        
        public function hitungUmur($nip)
        {
                $tahun   = substr($nip,0,4);
                $bulan   = substr($nip,4,2);
                $tanggal = substr($nip,6,2);
                
                $tanggal_lahir = $tahun.'-'.$bulan.'-'.$tanggal;
                // tanggal lahir
                $tanggal = new DateTime($tanggal_lahir);
                // tanggal hari ini
                $today = new DateTime('today');
                // tahun
                $y = $today->diff($tanggal)->y;
                // bulan
                $m = $today->diff($tanggal)->m;
                // hari
                $d = $today->diff($tanggal)->d;
                echo 'Umur '.$y.' Tahun';    
        }

        public function tmtKgb($nip, $id)
        {
                $tahun_ini = date('Y');        
                if((substr($nip,8,4) + $tahun_ini) % 2 == 0)
                {
                      return 
                      "<strong class='text-warning'>KGB tahun ini!</strong> tanggal 01-".substr($nip,12,2)."-".$tahun_ini."<a href='".base_url('admin/kenaikan_gaji_berkala/tambah/'.$id)."' class='btn btn-secondary btn-sm float-right' role='button' aria-pressed='true'>Usul KGB</a>";
                }else{
                      return '<strong>KGB tahun depan!</strong> tanggal 01-'.substr($nip,12,2).'-'.($tahun_ini + 1);
                }
        }

         public function tmtKp($tmt_terakhir, $id)
        {
                $tahun_ini = date('Y');        
                if(substr($tmt_terakhir, 6, 10) + 4 == $tahun_ini)
                {
                      return 
                      "<strong class='text-warning'>Kenaikan Pangkat tahun ini!</strong><br> tanggal 01-".substr($tmt_terakhir,2,4)."-".$tahun_ini."<a href='".base_url('admin/kp/tambah/'.$id)."' class='btn btn-secondary btn-sm float-right' role='button' aria-pressed='true'>Usul Pangkat</a>";
                }else{
                      $kp = substr($tmt_terakhir, 6, 10) + 4;
                      return '<strong>Kenaikan Pangkat YAD!</strong><br> tanggal 01-'.substr($tmt_terakhir,2,4).'-'.($kp);
                }
        }

        public function tampilanst($data)
        {
                $data = explode(',', $data);
                return $data;
        }

        public function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
        }

        public function terbilang($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        
        if($nilai<0) {
            $hasil = "minus ". trim($temp);
        } else {
            $hasil = trim($temp);
        }     		
        return $hasil;
	}
    
    public function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    public function jumlahCuti($awal, $akhir){

        $awal = strtotime($awal);
        $akhir = strtotime($akhir);
        $haricuti = array();
        $sabtuminggu = array();
        
        for ($i=$awal; $i <= $akhir; $i += (60 * 60 * 24)) {
            if (date("w", $i) !== '0' && date("w", $i) !== '6') {
                $haricuti[] = $i;
            } else {
                $sabtuminggu[] = $i;
            }
        
        }
        $jumlah_cuti = count($haricuti);
        return $jumlah_cuti;
    }

    public function getTglLahir($nip)
     {
         $thn_lhr= substr($nip, 0, 4);
         $bln_lhr= substr($nip, 4, 2);
         $tgl_lhr= substr($nip, 6, 2);
         $tgl =  $thn_lhr.'-'.$bln_lhr.'-'.$tgl_lhr;
         return $this->tgl_indo($tgl); 
     }

    public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
}