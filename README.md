# Executive Care

## Installation Instructions

Clone this repository somewhere on your computer, for example:- `~/Sites`

Download the legacy Pimcore version 3.1.1:- https://www.pimcore.org/download/archive/pimcore-3.1.1.zip

Extract the `/website/var` directory from the legacy package into `~/Sites/executive-care/var`

Extract the `/pimcore` directory from the lecacy package into `~/Sites/executive-care/pimcore`

Create a symlink from `/website/var` to `/var` by

```
ln -s website/var var
```

There are differing setup procedures depending on whether or not you're setting up for a production site, or a local vagrant copy. You can find the relevant instructions here:-

* [Vagrant](docs/vagrant.md)
* [Production](docs/production.md)

## ElasticSearch

Once you've installed the site and it is correctly loading, we will need to perform some steps in order to get the searching feature working, using ElasticSearch.

* [Installing ElasticSearch](/docs/elasticsearch.md)

## Accessing the Admin Control Panel

The admin panel can be accessed at http://executive-care.dev/admin for vagrant and http://execcaregroup.co.uk/admin for the production site.

```
Username - admin
password - pimcore
```