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
        if($_SERVER["REMOTE_USER"]!="root"){
                echo "root user only can.<br/>";
                exit();
        }
        $r=ldap_delete($ldap,"cn=".$_GET["user"].",ou=".$env_group.",o=<organization name>,c=com");
        if($r==true){
                echo "OK.<br/>";
        }
        else{
                echo "error.<br/>";
        }
?>
<?
        require("term.php");
?>
</body>
</html>
