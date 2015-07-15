# pimcore-skeleton
A skeleton Pimcore application with a Vagrant box

Version: 3.0.6

Release Date: May 29, 2015

## Installation Instructions

Download the latest Stable release package from https://www.pimcore.org/en/resources/download

Extract just the /website/var folder from the release package into /{project_dir}/var

Update the /{project_dir}/var/config/system.xml file with the database credentials

The defaults are

```
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
```

Add a record to your host file

```
192.168.56.22   pimcore.dev
```

cd into the project directory and run
```
vagrant up
```

The admin panel can be accessed at http://pimcore.dev/admin

Username - admin

password - pimcore
