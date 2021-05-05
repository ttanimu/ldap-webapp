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
        $entries=ldap_search($ldap,"ou=".$env_group.",o=<organization name>,c=com","(objectclass=inetOrgPerson)",array("cn"));
?>
<table border="1">
<tr><th>user</th><th>
<?
        printf("<a href=\"./usernew.php?group=%s\">",$env_group);
?>
new</a></th></tr>
<?
        for($entry=ldap_first_entry($ldap,$entries);$entry!=false;$entry=ldap_next_entry($ldap,$entry)){
                $value=ldap_get_values($ldap,$entry,"cn");
                printf("<tr><td>%s</td><td><a href="./user.php?group=%s&user=%s\">edit</a></td><td><a href=\"./userdel.php?group=%s&user=%s\">del</a></td></tr>\n",$value[0],$env_group,$value[0],$env_group,$value[0]);
        }
?>
<?
        require("term.php");
?>
</table>
</body>
</html>
