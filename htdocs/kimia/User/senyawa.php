<html>
<head>
    <title> Daftar </title>
    
</head>
<body>
<fieldset>
    <legend><b>Tabel Data Senyawa</b></legend>
    
    <table  width="100%" border="10px"  style="border-collapse:collapse;">
    <tr style="background-color: #ff9; ">
        <th width="60px">Gambar</th>
        <th width="100px">Rumus</th>
        <th width="20px">Nama</th>
        <th width="20px">Keterangan</th>
    </tr>
    
      <?php
    
    $sql = mysql_query("select * from senyawa") or die (mysql_error());
    while ($data = mysql_fetch_array($sql))
    {
    
    ?>
    
    <tr align="center">
        <td><?php echo $data['Gambar'];?></td>
        <td><?php echo $data['Rumus'];?></td>
        <td><?php echo $data['Nama'];?></td>
        <td><?php echo $data['Keterangan'];?></td>
       
    </tr>
    
    <?php
    
    }
    
    ?>
    </table>
</fieldset>

</body>
</html>
    
    