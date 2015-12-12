<?php
/**********************************************************
** Nama file .....: Fungsi.php                          ***
** Copyright .....: Adriyana Putra Pratama              ***
** Tanggal   .....: 13-September-2015                   ***
** Penjeasan .....: Kumpulan Fungsi Untuk Polling       ***
***********************************************************/


// Cegah Pengaksesan Langsung Dari Dari Browser
if (eregi('fungsi.php', $_SERVER['PHP_SELF']))
    exit('Error: Akses Ditolak.');
    
// Fungsi untuk mengkoneksi dengan mysql server
function konek_db()
{
        
      @ $koneksi = mysql_connect('localhost', 'root', '');
        // jika gagal meakukan koneksi kembalikan ke false
        if (!$koneksi)
        return false;
        else
        {
            mysql_select_db('private');
            return true;
        }
        
        
}

    //fungsi untuk menyaring string selain alpabet, numerik dan _
    function filter_str($string)
    {
	if ($lainnya == '')
        $filter = ereg_replace('[^a-zA-z0-9_]', '', $string);
       else
		$filter = ereg_replace('[^a-zA-z0-9_$lainnya]', '', $string);
		return $filter;
    }
//fungsi untuk mengenkrips string dengan metode MD5
// dan membalikan urutannya

function balik_md5($string)
{
    //untuk memballikan urutan string digunakan fungsi strrev()
    $chiper_text = strrev( md5( $string));
    return $chiper_text;
}
   
    // fungsi untuk mengecek sesion
    function cek_session($nama_ses)
    {
        //jika session kosong
        if (!isset($_SESSION[$nama_ses]))
            return false; // kembalikan nilai false
        else    //jika tidak kosong
        return true; //kembalikan nilai true
    }
    
// fungsi untuk login
function login($table, $username, $password)
{
	$hasil = mysql_query("select * from $table where username='$username'
			and password='$password'");
	if (mysql_num_rows($hasil) == 0)
		return false;
	else
		return true;
}

	// fungsi untuk membuat password acak
	// digunakan untuk mengirim ke form lupa password
	function pass_acak($panjang=8)
	{
		$kar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		srand((double)microtime() * 1000000);
		for ($i=0; $i<$panjang; $i++)
		{
			$nom_acak = rand() % 53; // unutk mendapatkan no acak, pd substr
			$pass .=substr($kar, $nom_acak, 1);
		}
		return $pass;
	}
	
	
//fungsi untuk logout (menghapus session)
function logout($nama_ses)
{
    //jiika session kosong
    if (!isset($_SESSION[$nama_ses]))
        return false; //kembalikan false
    else
    {
        //jika tidak kosong hancurkan session tersebut
        unset($_SESSION[$nama_ses]);
        session_destroy();
        return true; //kembalikan nilai true
    }
}

    //fungsi untuk menampilkan daftar polling sesuai parameter
    function daftar_poll($table, $field)
    {
        //lakukan query untuk mendapatkan daftar
        $hasil = mysql_query("select * from $table");
        // tammpilkan daftar dengan looping
        while ($data = mysql_fetch_array($hasil))
        {
            @$daftar .= '<input type = "radio" name="' .$field.'" value="'
                        .$data[0]. '">' .$data[0]. '<br>';
                        
        }
            $daftar .='<br><input type="submit" value="POLLING">';
        //kemballikan hasil dari daftar 
        return $daftar;
    }
//fungsi untuk mengecek kecocokan alamat ip dan jenis polling

function cek_ip($jenis_poll, $letak='log/ip.dat')
{
    $ip_user = $_SERVER['REMOTE_ADDR']; //dapatkan alamat ip user
    // buka dengan file () untuk mengubah setiap baris menjadi array
    $daftar_ip = file($letak);
    //hitung jumlah baris berguna untuk looping for
    $jml_baris = count($daftar_ip);
    //lakukan looping untuk mencocokan setiap ip dan polling
    for ($i=0; $i<$jml_baris; $i++)
        {
            $bagian = explode('#-#', $daftar_ip[$i]); //pecah setiap bagian
            $ip = $bagian[0]; //untuk alamat ip
            $nama_poll = $bagian[1]; //untuk jenis polling
            
            // jika alamat ip dan jenis polling cocok maka ia pernah
            // mengikuti polling pada katagori tersebut
            // jadi kembalikan false
            if (ereg($ip_user, $ip) && ereg($jenis_poll, $nama_poll))
            return false;
        }
        return true; //jika tidak ada kesalahan kembalikan ke true
}


?>