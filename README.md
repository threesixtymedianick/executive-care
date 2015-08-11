# Executive Care

Development - http://development.executive-care.bolser.co.uk

UAT - http://uat.executive-care.bolser.co.uk

## Installation Instructions

Clone this repository into `~/Sites`

Download the latest Stable release package from https://www.pimcore.org/en/resources/download

Extract the `/website/var` directory from the release package into `~/Sites/executive-care/var`

Extract the `/pimcore` directory from the release package into `~/Sites/executive-care/pimcore`

Create a symlink from `/website/var` to `/var` by

```
cd website
ln -s ../var var
```

Create the file `~/Sites/executive-care/var/config/system.xml` with the content

```XML
<?xml version="1.0"?>
<zend-config xmlns:zf="http://framework.zend.com/xml/zend-config-xml/1.0/">
  <general>
    <timezone>Europe/Berlin</timezone>
    <language>en</language>
    <validLanguages>en</validLanguages>
    <debug>1</debug>
    <debugloglevel>debug</debugloglevel>
    <custom_php_logfile>1</custom_php_logfile>
  </general>
  <database>
    <adapter>Mysqli</adapter>
    <params>
      <username>root</username>
      <password>123</password>
      <dbname>pimcore</dbname>
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

You also need to pull the git sub modules, using this command

```bash
  git pull --recurse-submodules
```

Add a record to your host file

```
192.168.56.174   executive-care.dev
```

cd into ~/Sites/executive-care and run
```
vagrant up
```

The admin panel can be accessed at http://executive-care.dev/admin

```
Username - admin
password - pimcore
```
