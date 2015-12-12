<?php
/**********************************************************
** Nama file .....: konfig.php                          ***
** Copyright .....: Adriyana Putra Pratama              ***
** Tanggal   .....: 13-September-2015                   ***
** Penjeasan .....: UNTUK MENAMPILKAN KONFIG HALAMAN    ***
***********************************************************/

//cegah pengaksesan langsung dari browser
if (eregi('konfig.php', $_SERVER['PHP_SELF']))
    exit('Error: Akses Ditolak');
    
// tentukan gambar yang digunakan untuk masing2 polling
$gambar['pemain'] = 'gambar/green_bar.jpg'; //grafik untuk polling pemain
$gambar['club'] = 'gambar/red_bar.jpg'; //grafik untuk polling klub
$gambar['negara'] = 'gambar/blue_bar.jpg'; //grafik untuk polling negara

//tentukan lebar maximal dari gambar grafik
$lebar_max = 400; //dalam pixel
//batasi user untuk memilih satu kali dengan cookie
$cek_cookie = 'no'; //yes atau no
//tentukan masa aktif cookie dalam detik
$masa_aktif = time() + 60 * 60 * 24 * 7; //1 minggu
//batasi user untuk memilih hanya satu kali dengan meilih alamat IP
$cek_ip = 'no'; //yes atau no
?>