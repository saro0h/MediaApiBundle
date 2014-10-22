Saro0h\MediaApiBundle
=====================

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
    app:
        resource: "@MediaApiBundle/Controller/"
        type:     annotation

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

### Upload a file

If you did not configure the bundle, you just have to POST on the url `/api/upload` the field `media`with the file as showed below:
![upload](https://cloud.githubusercontent.com/assets/667519/4745340/18373566-5a39-11e4-865a-44be6d793681.png)

If you can also choose the name of the file uploaded by supplying the field `filename`:
![upload-with-filename](https://cloud.githubusercontent.com/assets/667519/4745345/2ab24c58-5a39-11e4-86a8-e6887768ab34.png)


License
-------

This bundle is licensed under the MIT license.
