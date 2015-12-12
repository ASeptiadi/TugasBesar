<html>
<body>

<fieldset>
    <legend>Tambah Data Senyawa</legend>
    
    <form action="" method="post" enctype="mulipart/form-data">
        <table>
            <tr>
                <td>Id</td>
                <td>:</td>
                <td><input type="text" name="Id" /></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="Gambar" /></td>
            </tr>
            <tr>
                <td>Rumus</td>
                <td>:</td>
                <td><input type="text" name="Rumus" /></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="Nama" /></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><input type="text" name="Keterangan" /></td>           
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="tambah" value="tambah"> 
                <td><input type="reset" name="reset" value="reset"></td>
            </tr> 
        </table> 
    </form>
    
    <?php
    $Id = @$_POST['Id'];
    $Gambar =@$_POST['Gambar'];
    $Rumus = @$_POST['Rumus'];
    $Nama =@$_POST['Nama'];
    $Keterangan = @$_POST['Keterangan'];
    $tambah = @$_POST['tambah'];
    
    $sumber = @$_FILES['Gambar']['tmp_name'];
    $target = '../gambar/';
    $nama_gambar = @$_FILES['gambar']['name'];
    
    $tambah_senyawa = @$_POST['tambah'];
    
    if($tambah){
        if('$Id == "" || $Gambar == "" || $Rumus == "" || $Nama== "" || $Keterangan == "" || $nama_gambar == ""') {
                ?>
                <script type="text/javascript">
                alert("Inputan tidak boleh ada yang kosong");
                </script>
                
                <?php
         } else
         $pindah = move_uploaded_file('$sumber, $target.$nama_gambar');
            if($pindah){
            mysql_query("Insert into senyawa values('$Id, $Gambar, $Rumus, $Nama, $Keterangan,$nama_gambar')") or die (mysql_error());
            ?>
            <script type="text/javascript">
            alert("Tambah data senyawa baru berhasil");
            window.location.href="?page senyawa";
            </script>            
            <?php 
            } else {
                ?>
                <script type="text/javascript">
                alert("Gambar gagal di upload");
                </script>
                <?php
                
            }
                 
     }       
    ?>
</fieldset>
</body>
</html>