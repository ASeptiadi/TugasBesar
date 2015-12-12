<?php
/**********************************************************
** Nama file .....: Fungsi.php                          ***
** Copyright .....: A.SEPTIADI                          ***
** Tanggal   .....: 13-September-2015                   ***
** Penjeasan .....: KAMUS KIMIA                         ***
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
            mysql_select_db('kamus_kimia');
            return true;
        }
        
        
}

    //fungsi untuk menyaring string selain alpabet, numerik dan _
  function filter_str($string)
    {
        $filter = ereg_replace('[^a-zA-z0-9_]', '', $string);
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

    


?>