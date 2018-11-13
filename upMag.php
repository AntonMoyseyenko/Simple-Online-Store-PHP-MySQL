<?php
require("master.html");
parse_str($_SERVER['QUERY_STRING']);
?>
<!doctype html>
<html>
<header>
    <title>UPDATE</title>
</header>
<body>
    <form action ="upMagSave.php" method="post" enctype="multipart/form-data">
<table>
<tr>
    <td>ID</td>
    <td><input type="text" readonly="true" name="MagID" value="<?php echo trim($mag_id)?>"/></td>
</tr>
<tr>
    <td>Name</td>
    <td><input type="text" name="MagName" value="<?php echo trim($mag_name)?>"/></td>
</tr>
<tr>
    <td>Description</td>
    <td><input type="text" name="MagDescription" value="<?php echo trim($mag_description)?>"/></td>
</tr>
<tr>
    <td>Price</td>
    <td><input type="text" name="MagPrice" value="<?php echo trim($mag_price)?>"/></td>
</tr>
<tr>
    <td>Path</td>
    <td><input type="file" name="path"/></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" name="submit" value="Update"/></td>
</tr>
</table>
</form>
</body>