# pimcore-skeleton
A skeleton Pimcore application with a Vagrant box

Version: 3.0.6

Release Date: May 29, 2015

## Installation Instructions

Clone this repository into ~/Sites

Download the latest Stable release package from https://www.pimcore.org/en/resources/download

Extract just the /website/var folder from the release package into ~/Sites/pimcore-skeleton/var

Update the ~/Sites/pimcore-skeleton/var/config/system.xml file with the database credentials

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

cd into ~/Sites/pimcore-skeleton and run
```
vagrant up
```

The admin panel can be accessed at http://pimcore.dev/admin

```
Username - admin
password - pimcore
```

The /var folder is an unfortunate side of Pimcore, it gets too big to be committed into source control but is required for the configuration. If using this skeleton application to create a local copy of an already existing Pimcore application you will need to get a copy of the /var folder and a copy of the database from the exisiting installation.
