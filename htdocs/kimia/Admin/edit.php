<?php
include("../inc/class_senyawa.php");
        
        $edit = new senyawa();
?> 
 
 <html>
<head>
    <title> Daftar </title>
    <link href="../inc/materialize.css" rel="stylesheet" type="text/css" />
</head>
<body>
<fieldset>
    <legend><b>Edit senyawa</b></legend>
    
    <?php
    
    $Id = @$_GET['Id'];
    $sql = mysql_query("select * from senyawa where Id = '$Id'") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Id</td>
                <td>:</td>
                <td><input type="text" name="Id"  value="<?php
               echo $data['Id']; ?>" disabled="disabled" /> </td>
            </tr>
             <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="Gambar" /></td>
            </tr>
            
            <tr>
                <td>Rumus</td>
                <td>:</td>
                <td><input type="text" name="Rumus" value="<?php
               echo $data['Rumus']; ?>"/></td>
            </tr>
            
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="Nama" value="<?php
               echo $data['Nama']; ?>"/></td>
            </tr>
            
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                 <div class="control-group">
                 <td><div class="controls">
             `   <textarea rows="5" cols="40" class="span12" name="Keterangan" value="<?php
               echo $data['Keterangan']; ?>"/></textarea>

               </div>
               </div>
               </td>
            </tr>
            
           
            
            <tr>
                <td></td>
                <td></td>
                <td><button class="btn waves-effect waves-light green right" name="edit" value="Edit">Edit
                <td><button class="btn waves-effect waves-light green right" type="reset" >Batal</button></td> 
            </tr>
        </table>
        </form>
        
        <?php
        if(isset($_GET['Id']))
        {
            $query=mysql_query("select * from senyawa where Id=".$_GET['Id']."");
            $row = @mysql_fetch_array($query);
        }
        
        if(isset($_POST['edit']))
        {
        $Rumus = @$_POST['Rumus'];
        $Nama = @$_POST['Nama'];
        $Keterangan = @$_POST['Keterangan'];
        
        $sumber = @$_FILES['Gambar']['tmp_name'];
        $target = '../gambar/';
        $Gambar = @$_FILES['Gambar']['name'];
        $edit->editsenyawa($Rumus, $Nama, $Keterangan, $Id);
        }
        
        
       
                        
                        
                    ?>


        </fieldset>
        </body>
        </html>