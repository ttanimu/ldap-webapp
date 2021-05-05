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
        if(($_SERVER["REMOTE_USER"]!="root")&&($_SERVER["REMOTE_USER"]!=$_POST["cn"])){
                echo "authentication error.<br/>";
                exit();
        }
        if($_POST["pass"]!=$_POST["pass1"]){
                echo "password error.<br/>";
                exit();
        }
        if($_POST["pass"]!=""){
                $p=exec("slappasswd -s ".$_POST["pass"]);
                $data["userPassword"]=$p;
        }
        $data["sn"]=$_POST["sn"];

        $entries=ldap_search($ldap,"cn=".$_POST["cn"].",ou=".$env_group.",o=<organization name>,c=com","(objectclass=inetOrgPerson)");
        $entry=ldap_first_entry($ldap,$entries);
        if($entry==false){
                echo "No user.<br/>";
                exit;
        }
        $value=ldap_get_attributes($ldap,$entry);
        if($value["mail"]["count"]==0){
                $dummy["mail"]="";
                ldap_mod_add($ldap,"cn=".$_POST["cn"].",ou=".$env_group.",o=<organization name>,c=com",$dummy);
        }
        $data["mail"]=$_POST["mail"];

        $r=ldap_modify($ldap,"cn=".$_POST["cn"].",ou=".$env_group.",o=<organization name>,c=com",$data);
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
