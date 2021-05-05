# ldap-webapp
This is a webapp template written by PHP for managing user account on ldap server. 
This is too old.

ldapサーバのユーザー情報を閲覧・編集するPHPで書かれたウェブアプリケーションの雛形です。
かなり昔に作ったものです。

---

## Replacing strings in the scripts and configuration.
### <ldap server host name>
ldap server's host name or IP address
### <administrator's name>, <administrator's password>
ldap server's administrator's account name and password of ldap server.
### <organization name>
This webapp manages "o=<organization name>,c=com" on the ldap server.
### <section name>
Set the section name defined as "organizationalUnit" to ".htaccess".

## Prepartion of ldap server
Section must be definded as "organizationalUnit".
Person in the section must be definded as "inetOrgPerson".
This webapp doesn't support the nested section. 
Each section must have "root" user who can modify and add the information of people in that section. This webapp doesn't support creating "root" user.

## Preparation of Web server
### Creating section's derectories
Copy "group" direcoty.
This directory and "group" direcoty exist on the same directory.
This directory's name is the same as the section name defined as "organizationalUnit".
Copy for the number of sections. 
### Setting correct permission 

## How to use
When you open "index.html" by web browser, you can see the list of sections. you can click [go] link which you want to open.
After that, you can see the list of people belonging to that section and operate them. only "root" user can modify every users and create new user.

---

## スクリプト・設定ファイル内の文字列を変更
### <ldap server host name>
接続するldapサーバをホスト名やIPアドレスで指定します。
### <administrator's name>, <administrator's password>
ldapサーバの管理者権限を持つユーザのユーザ名とパスワードを指定します。
### <organization name>
このウェブアプリケーションはldapサーバの"o=<organization name>,c=com"を操作します。
### <section name>
organizationalUnitで定義された部署名を".htaccess"ファイルに設定します。

## ldap側の設定
部署はorganizationalUnitで定義されている必要があります。
各部署内のユーザの属性は"inetOrgPerson"であることを前提としています。
部署の入れ子は想定していません。
各部署には"root"ユーザを作成する必要があり、"root"ユーザのみがユーザーの追加や他人の情報の変更が可能です。"root"ユーザーの作成はこのアプリケーションでは対応していません。

## ウェブサーバ側の設定
### 部署名ディレクトリの作成
groupディレクトリをコピーします。
ディレクトリ名はorganizationalUnitで定義された部署名と同じにします。
コピー先はgroupディレクトリと同じ階層です。
登録している部署の数だけディレクトリを作成します。
### パーミッションの適切な設定

## 使い方
ウェブブラウザで"index.html"を開くと部署名が列挙されるので、操作したい部署の[go]リンクをクリックします。
その部署に所属するユーザの情報が表示され、既存ユーザの情報の変更や新規ユーザの追加が可能です。ただしrootユーザのみが可能な操作があります。

