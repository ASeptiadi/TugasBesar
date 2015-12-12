<?php
include("../inc/class_senyawa.php");
        
        $tambah = new senyawa();
?>
<html>
<head>
    <title> Daftar </title>
    <link href="../inc/materialize.css" rel="stylesheet" type="text/css" />
</head>
<body>

<fieldset>
    <legend><b>Tambah Senyawa</b></legend>
    
    <?php
    


        $cariid = mysql_query("select max(Id) from senyawa") or die (mysql_error());
        $dataid = mysql_fetch_array($cariid);
            if($dataid)
            {
                $nilaiid = substr($dataid[0], 2);
                $id = (int) $nilaiid;
                $id = $id + 1;
                $hasilid = "SN" .str_pad($id, 3, "0", STR_PAD_LEFT);
                
            }
                else
                {
                    $hasilid = "SN01";
                }
    ?>
    
    
    <form class="form-horizontal" method="post" action="" name="frmBerita" enctype="multipart/form-data">

  <div class="control-group">
    <label class="control-label" for="inputId">Id</label>
    <div class="controls">
      <input type="text" class="span12" name="Id" value="<?php echo $hasilid; ?>" required >
    </div>
  </div>
  
    <div class="control-group">
    <label class="control-label" for="Gambar">Gambar</label>
    <div class="controls">
      <input type="file" id="Gambar" name="Gambar" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="inputRumus">Rumus</label>
    <div class="controls">
      <input type="text" class="span12" placeholder="Rumus" name="Rumus" required >
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="inputNama">Nama</label>
    <div class="controls">
      <textarea rows="5" cols="40" class="span12" name="Nama" required></textarea>
    </div>
  </div>
  
  
  <div class="control-group">
    <label class="control-label" for="inputKeterangan">Keterangan</label>
    <div class="controls">
      <textarea rows="5" cols="40" class="span12" name="Keterangan" required></textarea>
    </div>
  </div>
  

  
  <div class="control-group">
    <div class="controls">
      <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
      <button type="reset" class="btn btn-inverse">Cancel</button>
    </div>
  </div>
  
</form>

<?php
if(isset($_POST['tambah']))
{
    $Id = @$_POST['Id'];
    $Rumus = @$_POST['Rumus'];
    $Nama = @$_POST['Nama'];
    $Keterangan	= @$_POST['Keterangan'];
    $tambah->simpan($Id, $Rumus, $Nama, $Keterangan, $tgl_berita);
}
                
?>
  
</fieldset>
        
</body>
</html>