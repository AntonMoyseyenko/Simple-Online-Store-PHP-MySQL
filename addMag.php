<?php
require("master.html");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>UPLOAD</title>
    </head>
    <body>
        <form action ="addMagSave.php" method="post"
        enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="MagName" size="15"/></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="MagDescription" 
                    cols="50" rows="10"/></textarea></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="MagPrice" size="15"/></td>
            </tr>
            <tr>
                <td>Path</td>
                <td><input type="file" name="path"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Add"/></td>
            </tr>
        </table>
    </body>
</html>