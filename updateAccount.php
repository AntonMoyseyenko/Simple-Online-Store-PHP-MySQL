<?php
require("master.html");
?>
<form action="updateAccountSave.php" method="post" enctype="multipart/form-data">
<h>Please enter New Password</h>    
    <table style="border: 0pt;">
        <tr>
            <td>User Name</td>
            <td><input type="text" readonly="true" name="login_ID" id="login_ID"  size="7" maxlength="7" value="<?php session_start(); echo $_SESSION["login_ID"];?>" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="user_Password" id="user_Password" size="3" maxlength="3" /></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Update" /></td>
        </tr>
    </table>
</form>