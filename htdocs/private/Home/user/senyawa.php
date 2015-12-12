<fieldset>
    <legend>Tampil Data Senyawa</legend>
    
    
    <table width="100%" style="border: 1px solid #000; border-collapse: collapse;">
    <tr style="background-color: #fc0;">
        <th>Id</th>
        <th>Gambar</th>
        <th>Rumus</th>
        <th>Nama</th>
        <th>Keterangan </th>
        <th>Opsi</th>
    </tr> 
    <?php
    $sql = mysql_query("select * fom senyawa") or die (mysq_error());
    while($data = mysql_fetch_array($sql));{
    ?>
     <tr>
        <td><?php echo $daata['Id']; ?></td>
        <td><?php echo $daata['Gambar']; ?></td>
        <td><?php echo $daata['Rumus']; ?></td>
        <td><?php echo $daata['Nama']; ?></td>
        <td><?php echo $daata['Keterangan']; ?></td>
        <td>img src="img/<?php $data['gambar']; ?> "width="120px"</td>
        <td align="center"><button>Edit</button> <button>Hapus</button></button></button></td>
     </tr>
     <?php
     
    }
    ?>   
    </table>
</fieldset>