## Setting up Vagrant

Vagrant is useful for developing fully functional websites on a local machine, all the while containing a whole server on your machine that can be configured individually.

#### Downloading the var folder

Ideally you should copy the var folder from a production website, however you may have one provided which is available for use.

###### Using a pre-provided var folder

Simply extract the preprovided archive over the existing `~/Sites/executive-care/var` folder

###### Downloading from the production site

To download from the production site, you should use a command like the following:

```bash
rsync -avzP --update --delete username@[SERVER_IP]:/var/www/var/* ~/Sites/executive-care/var
```

#### Creating the config

Create the file `~/Sites/executive-care/var/config/system.xml` with the content.

```XML
<?xml version="1.0"?>
<zend-config xmlns:zf="http://framework.zend.com/xml/zend-config-xml/1.0/">
  <general>
    <timezone>Europe/London</timezone>
    <language>en</language>
    <validLanguages>en</validLanguages>
    <debug>1</debug>
    <debugloglevel>debug</debugloglevel>
    <custom_php_logfile>1</custom_php_logfile>
  </general>
  <database>
    <adapter>Mysqli</adapter>
    <params>
      <username>exec-dev</username>
      <password>T4ghCa2Hj7Nv</password>
      <dbname>executive_care_development</dbname>
      <host>localhost</host>
      <port>3306</port>
    </params>
  </database>
  <documents>
    <versions>
      <steps>10</steps>
    </versions>
    <default_controller>default</default_controller>
    <default_action>default</default_action>
    <error_pages>
      <default>/</default>
    </error_pages>
    <createredirectwhenmoved/>
    <allowtrailingslash>no</allowtrailingslash>
    <allowcapitals>no</allowcapitals>
    <generatepreview>1</generatepreview>
  </documents>
  <objects>
    <versions>
      <steps>10</steps>
    </versions>
  </objects>
  <assets>
    <versions>
      <steps>10</steps>
    </versions>
  </assets>
  <services/>
  <cache>
    <excludeCookie/>
  </cache>
  <httpclient>
    <adapter>Zend_Http_Client_Adapter_Socket</adapter>
  </httpclient>
</zend-config>

```

#### Hosts

Add a record to your host file

```
192.168.56.174   executive-care.dev
```

#### Launching

cd into ~/Sites/executive-care and run
```
vagrant up
```
