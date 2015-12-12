<?php
session_start();
include ('../inc/fungsi.php');

if (!konek_db())
exit('Error: gagal melakukan koneksi ke mysql server. <br>
cek kembali setting untuk host, Username dan Password ');

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
}
    else
    {
?>
<html>
<head>
    <title>Halaman Admin</title>
<link href="../Inc/Style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="canvas" >
    <div id="header"> 
    Kamus Kimia
    </div>
    
    <div id="menu">
        <ul>
           
            <li class="utama"><a href="">Home</a>
              <ul>
                    <li><a href="?page=lihat&action=lihattd">Lihat Data</a></li>
                    <li><a href="?page=tambah&action=tambahdat">Tambah Data</a></li>
                </ul>
            </li>
              
            <li class="utama"><a href="logout.php">Keluar </a>
            </li>
        </ul>    
    </div>

    <div id="isi">
           <?php
   $page = @$_GET['page'];
   $action = @$_GET['action'];
   
  if ($page == "tambah")
  {
    if ($action == "tambahdat")
    {
        include ("Tambah.php");
    }
  }
  
    if ($page == 'lihat')
    {
        if($action == "lihattd")
                    {
                        include("senyawa.php");
                    }
          else if($action == "hapus")
                    {
                        include "hapus.php";
                    } 
          else if($action == "edit")
                    {
                        include "edit.php";
                    }                         
    }
  
  
  
  
   
   ?>
    </div>

    <div id="footer">
        Copyright 2015 - A.SEPTIADI
    </div >
</div>

</body>
</html>
<?php
}
?>