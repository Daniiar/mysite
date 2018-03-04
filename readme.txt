Developed: 
  Opeartion system: Linux Mint 17.2 Rafaela
  PHP version: PHP 5.6.33-3+ubuntu14.04.1+deb.sury.org+1 (cli)
  Mysql version: Ver 14.14 Distrib 5.5.59
  Server version: Apache/2.4.7 (Ubuntu)

1.Connect your database (authentification.php): 
  $base_path = new mysqli("host", "user_of_your_mysql", "password_of_your_mysql", "data base name");

  example:
  $base_path = new mysqli("localhost", "john", "987654321", "mysite");

2.Import database mysite.sql to your to your Mysql