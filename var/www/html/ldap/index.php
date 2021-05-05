<html>
<head>
<title>User control</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>User control</h1>
<?
        require("init.php");
?>
<?
        $entries=ldap_search($ldap,"o=<organization name>,c=com","(objectclass=organizationalUnit)",array("ou"));
?>
<table border="1">
<tr><th>group</th><th> </th></tr>
<?
        for($entry=ldap_first_entry($ldap,$entries);$entry!=false;$entry=ldap_next_entry($ldap,$entry)){
                $value=ldap_get_values($ldap,$entry,"ou");
                printf("<tr><td>%s</td><td><a href=\"./%s/group.php?group=%s\">go</a></td></tr>\n",$value[0],$value[0],$value[0]);
        }
?>
<?
        require("term.php");
?>
</table>
</body>
</html>
