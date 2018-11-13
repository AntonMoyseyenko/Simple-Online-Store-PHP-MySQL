<header>
<?php
require("master.html");
?>
</header>
<body>
<div class="login-page">
    <form action="procLogin.php" method="post" enctype="multipart/form-data" class="form">
<table>
        <tr>
            <td>
                Please Login!
            </td>
        </tr>
        <tr>
            <td>User Name</td>
            <td><input type"text" name="login_ID" id="login_ID"  size="7" maxlength="7" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type"text" name="user_Password" id="user_Password" size="3" maxlength="3" /></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Login" /></td>
        </tr>
</table>
    </form>
    </div>
</div>
</body>