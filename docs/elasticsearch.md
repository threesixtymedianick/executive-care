## ElasticSearch

Once you've installed the site and it is correctly loading, we will need to perform some steps in order to get the searching feature working, using ElasticSearch.

#### Installing

SSH into the server, either using 

```bash
vagrant ssh
```

or

```bash
ssh username@[SERVER_IP]
```

and run the following commands:

```bash
sudo add-apt-repository ppa:webupd8team/java
sudo apt-get update
sudo apt-get install oracle-java8-installer
wget https://download.elastic.co/elasticsearch/elasticsearch/elasticsearch-1.4.1.deb
sudo dpkg -i elasticsearch-1.4.1.deb
```

This should've installed ElasticSearch and Oracle Java 8 onto the server.

#### Populating ElasticSearch

Once installed, and still within the SSH connection to the server, run these commands:-

```
php /var/www/pimcore/cli/console.php elasticsearch:mappings
php /var/www/pimcore/cli/console.php elasticsearch:seeder
```

Taking care to replace `/var/www/pimcore` with the actual location of the web code.