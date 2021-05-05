<html>
<head>
<title>User control</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?
        require("init.php");
?>
<h1>User control - <? echo $env_group ?></h1>
<?
        $entries=ldap_search($ldap,"ou=".$env_group.",o=<organization name>,c=com","(objectclass=inetOrgPerson)",array("cn","sn","userPassword"));
        $entry=ldap_first_entry($ldap,$entries);
        if($entry==false){
                echo "No user.<br/>";
                exit;
        }
        $value=ldap_get_values($ldap,$entry,"cn");
?>
<form action="./useradd.php" method="post">
<?
        printf("<input type=\"hidden\" name=\"group\" value=\"%s\">",$env_group);
?>
<table>
<tr><th>cn</th><td><input type="text" name="cn"></td></tr>
<tr><th>sn</th><td><input type="text" name="sn"></td></tr>
<tr><th>mail</th><td><input type="text" name="mail"></td></tr>
<tr><th>userPassword</th><td><input type="password" name="pass"></td></tr>
<tr><th align="right">(confirm)</th><td><input type="password" name="pass1"></td
></tr>
</table>
<input type="submit" value="OK">
</form>
<?
        require("term.php");
?>
</body>
</html>
