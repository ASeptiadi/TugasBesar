<?php
$Id = @$_GET['Id'];

mysql_query("delete from senyawa where Id='$Id'") or die (mysql_error());
?>

<script type="text/javascript">
window.location.href="?page=lihat&action=lihattd";
</script>