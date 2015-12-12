<?php
ob_start();
session_start();
include "../inc/fungsi.php";

if (!konek_db())
exit('Error: gagal melakukan koneksi ke mysql server. <br>
cek kembali setting untuk host, username dan password ');

if(isset($_SESSION['user']))
{
    header("Location:index.php");
}
    else
    {

?>
    
<html>
<head>
    <title> Admin </title>
    <link href="../inc/sty.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div id="kotak">
            <div id="atas">
                LOGIN ADMIN
            </div>
            <div id="bawah">
                <form method="post" action="">
                    <input class="masuk" type="text" autocomplete="off" placeholder="Username .." name="user"><br/>
                    <input class="masuk" type="password" autocomplete="off" placeholder="Password .." name="pass"><br/>
                    <input id="tombol" type="submit"  name="login" value="Login">
                </form>
            </div>
        </div>    
                
    <?php
        $user = @$_POST['user'];
        $pass = @$_POST['pass'];
        $login = @$_POST['login'];
        
        if($login) 
        {
            if($user == "" || $pass == "")
            {
                echo "Username Dan Password Tidak Boleh Kosong";
            }
                else
                {
                    $sql = mysql_query("select * from admin where user= '$user' and password= md5('$pass')") or die (mysql_error());
                    $data = mysql_fetch_array($sql);
                    $cek = mysql_num_rows($sql);                    
                    if($cek > 0)
                    {
                        @$_SESSION['user'] = $_POST['user'];
                        header("location:index.php");
                       
                    }
                        else
                        {
                            echo "Login gagal";
                        }
                }   
                
        }
    ?>
    </div>
    </div>
    
</body>
</html>
<?php
}
?>