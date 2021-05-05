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
        $entries=ldap_search($ldap,"cn=".$_GET["user"].",ou=".$env_group.",o=<organization name>,c=com","(objectclass=inetOrgPerson)");
        $entry=ldap_first_entry($ldap,$entries);
        if($entry==false){
                echo "No user.<br/>";
                exit;
        }
        $value=ldap_get_values($ldap,$entry,"cn");
?>
<form action="./useredit.php" method="post">
<?
        printf("<input type=\"hidden\" name=\"group\" value=\"%s\">",$env_group);
        printf("<input type=\"hidden\" name=\"cn\" value=\"%s\">",$value[0]);
?>
<table>
<?
        printf("<tr><th>cn</th><td>%s</td></tr>",$value[0]);
        $value=ldap_get_values($ldap,$entry,"sn");
        printf("<tr><th>sn</th><td><input type=\"text\" name=\"sn\" value=\"%s\" /></td></tr>",$value[0]);
        $value=ldap_get_attributes($ldap,$entry);
        if($value["mail"]["count"]>0){
                $value=ldap_get_values($ldap,$entry,"mail");
                $mail=$value[0];
        }
        else
                $mail="";
        printf("<tr><th>mail</th><td><input type=\"text\" name=\"mail\" value=\"%s\" /></td></tr>",$mail);
?>
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
