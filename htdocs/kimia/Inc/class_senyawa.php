<?php
require("../inc/connect.php");

class senyawa
{
  
    
   function simpan($Id, $Rumus, $Nama, $Keterangan)
   {
         
       $namafolder="../Gambar/"; //folder tempat menyimpan file
        if (!empty($_FILES["Gambar"]["tmp_name"]))
        {
            $jenis_gambar=$_FILES['Gambar']['type'];
            if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
        {           
            $gambar = $namafolder .basename($_FILES['Gambar']['name']);               
            if (move_uploaded_file($_FILES['Gambar']['tmp_name'], $gambar)) 
            {
                mysql_query("insert into senyawa values ('$Id', '$gambar', '$Rumus', '$Nama','$Keterangan')") or die (mysql_error()); 
		      ?>

    				<script type="text/javascript">
                        alert('Berhasil menambahkan');
                        window.location.href="?page=lnews&action=lihatnews";
                    </script>
                    
                <?php
            } 
                else 
                {
             	?>
    			
                	<script type="text/javascript">
                        alert('Gagal menambahkan');
                        window.location.href="?page=news&action=tambahnews";
                    </script>
       			
                <?php
                }
           } 
            else 
           {
                ?>
        			<script type="text/javascript">
                        alert('Gambar harus berformat .jpg .png .gif');
                        window.location.href="?page=news&action=tambahnews";
                    </script>
                <?php
           }
        }
    }
   
   
   function editsenyawa($Rumus,$Nama,$Keterangan,$Id)
    {
        $sumber = @$_FILES['Gambar']['tmp_name'];
        $target = '../gambar/';
        $Gambar = @$_FILES['Gambar']['name'];
        if(((!$Rumus)|| (!$Nama) || (!$Keterangan)))
        {
                    ?>
                
            <script type="text/javascript">
            alert("input tidak boleh kosong");
            </script>
                
                <?php
                    
                }
                    else
                {
            if(!$Gambar)
            {
            mysql_query("update senyawa set Rumus='$Rumus',Nama='$Nama', Keterangan='$Keterangan' where Id='$Id'") or die (mysql_error());
                     
                ?>
                        
                    <script type="text/javascript">
                    alert("Berhasil Di Edit");
                    window.location.href="?page=lihat&action=lihattd";
                    </script>
                    
                <?php
                     
            }
                else
            {
                $pindah = move_uploaded_file($sumber, $target.$Gambar);    
                if($pindah)
                    {
                    mysql_query("update senyawa set Rumus = '$Rumus', Nama = '$Nama', Keterangan = '$Keterangan', Gambar = '$Gambar' where Id='$Id'") or die (mysql_error());
                      
                ?>
                        
                    <script type="text/javascript">
                    alert("Berhasil Di Edit");
                    window.location.href="?page=lihat&action=lihattd";
                    </script>
                    
                    <?php    
                    }       
                                     
            else
            {                                
                    ?>            
                    
                        <script type="text/javascript">
                        alert("Gagal Upload gambar");
                        </script>
                    
                    <?php
                }
            }
        }
    }
    
}

   ?>