## Setting up a Production Environment

Setting up a Production environment will largely be based on whatever you decide to use in terms of code deployment. However, initially you need to do the following steps:

* Setup the server to use MySQL 5.7, PHP 5.6 and Apache.

* Use mysql to import the provided database into the machine

* Copy the web code to the server. `/var/www` would be a good place

* Copy the var folder code into `/var/www/var`
 
* Setup your Apache vHost

```
<VirtualHost *:80>
  ServerName www.execcaregroup.co.uk
  ServerAlias execcaregroup.co.uk *.execcaregroup.co.uk
  ## Vhost docroot
  DocumentRoot "/var/www"
  DirectoryIndex index.php

  ## Directories, there should at least be a declaration for /var/www

  <Directory "/var/www">
    Options Indexes FollowSymlinks MultiViews
    AllowOverride All
    Require all granted

  </Directory>

  ## Logging
  ErrorLog "/var/log/apache2/executive-care_error.log"
  ServerSignature Off
  CustomLog "/var/log/apache2/executive-care_access.log" combined

  ## SetEnv/SetEnvIf for environment variables
  SetEnv APP_ENV dev
</VirtualHost>
```

* Consider changing `/var/www/var/config/system.xml` with any relevant database details you need.