<?php  
  class connect
  {  
       var $koneksi;  
              
       public function openConnection()
       {  
            $server   = 'localhost';         
            $user     = 'root';  
            $password = '';  
            $database = 'senyawa';
            $this->koneksi = mysql_connect($server,$user,$password) or die (mysql_error());  
            if($this->koneksi)
            {  
                 mysql_select_db($database) or die (mysql_error());  
            }
            else
            {  
                 echo "koneksi ke database gagal";       
            }  
       }
       
      public function closeConnection()
       {  
            mysql_close($this->koneksi);       
       }   
  }  
?>  