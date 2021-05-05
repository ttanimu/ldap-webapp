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
        if($_POST["pass"]!=$_POST["pass1"]){
                echo "password error.<br/>";
                exit();
        }
        $p=exec("slappasswd -s ".$_POST["pass"]);
        $data["objectclass"]="inetOrgPerson";
        $data["cn"]=$_POST["cn"];
        $data["sn"]=$_POST["sn"];
        $data["userPassword"]=$p;
        $data["mail"]=$_POST["mail"];
        $r=ldap_add($ldap,"cn=".$_POST["cn"].",ou=".$env_group.",o=<organization name>,c=com",$data);
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
