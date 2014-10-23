Saro0h\MediaApiBundle
=====================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/a8c693af-de52-455c-9626-247474c9fb2c/small.png)](https://insight.sensiolabs.com/projects/a8c693af-de52-455c-9626-247474c9fb2c)

This bundle allows you to have an upload of files through an API.

Installation
------------

### Step 1: Install MediaApiBundle using [Composer](http://getcomposer.org)

Add MediaApiBundle in your `composer.json`:

    {
        "require": {
            "saro0h/media-api-bundle": "~1.0"
        }
    }

Now tell composer to download the bundle by running the command:

    $ php composer.phar update saro0h/media-api-bundle

### Step 2: Enable the bundle

Enable the bundle in the kernel:

    <?php

    // app/AppKernel.php
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Saro0h\MediaApiBundle\MediaApiBundle(),
            // ...
        );
    }

### Step 3: Import the routes of the bundle

Add the following lines to the `app/config/routing.yml`:

    media_api_bundle:
        resource: "@MediaApiBundle/Resources/config/routing.yml"

### Step 4: Create the database and the schema

Run the following commands (after configuring the ORM parameters)

    app/console doctrine:database:create
    app/console doctrine:schema:create

### Step 4 (optional): Configure your `config.yml` file

    # app/config/config.yml
    media_api:
        media_path: %media_path%    # Path to the folder where the media will be uploaded (by default it's `web/uploads` folder of your project)
        field_name: %filename%      # Name of the field used to supply the file in the form (by default it's "media")

Usage
-----

#### Upload a file

- POST /media

If you did not configure the bundle, you just have to POST on the url `/media/api/upload` the field `media`with the file as showed below:
![upload](https://cloud.githubusercontent.com/assets/667519/4759203/b9dd106e-5ae5-11e4-8789-a98ab1100e2d.png)

If you can also choose the name of the file uploaded by supplying the field `filename`:
![upload_with_filename](https://cloud.githubusercontent.com/assets/667519/4759221/c5396f16-5ae5-11e4-96a6-ab01c1b9fa2e.png)

#### Get a media

- GET /media/api/{id}

![get_media](https://cloud.githubusercontent.com/assets/667519/4759226/cc2bfd70-5ae5-11e4-9146-c16a90c33518.png)

#### Delete a media

- DELETE /media/api/get/{id}

![delete_media](https://cloud.githubusercontent.com/assets/667519/4759230/d8f85aa8-5ae5-11e4-81c0-0ba2aff9dd11.png)


License
-------

This bundle is licensed under the MIT license.
