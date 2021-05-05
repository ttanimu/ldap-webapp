<?
        $ldap=ldap_connect("<ldap server host name>");
        if(!$ldap){
                echo "Could not connect to ldap server.<br/>";
                exit;
        }
        if(!ldap_bind($ldap,"cn=<administrator's name>,o=<organization name>,c=com","<administrator's password>")){
                echo "Could not bind to ldap server.<br/>";
                exit;
        }
        require("./env.php");
?>
