# DeGeo-PHP v 0.0.6

DeGeo PHP Codebase. Libraries, Functions, Experiments and Examples.

_See CHANGELOG.md for version history_

## Coming Soon
 - More Libraries and Examples.


## Codebase


### Libraries

 - Queue: Queue and prioritize data.
 - Layout Queue: Queue and prioritize Layouts for rendering after data processing.
 - Messages Queue: Queue and prioritize Messages for rendering at a later time.
 - Breadcrumbs Queue: Queue and prioritize Breadcrumbs for rendering at a later time.
 - Metatag Queue: Queue and prioritize Metatags for rendering at a later time.
 - Hosts: Hosts Management Library for CDN integration.
 - Layout: Layout Management for dynamic rendering of responsive containers, rows, and columns.
 - Bootstrap 4 Layout: Bootstrap 4 Layout for dynamic rendering of Bootstrap 4 containers, rows, and columns.
 - CodeIgniter 4 Layout: Renders the Bootstrap 4 Layout using CodeIgniter functions.


### Objects

 - Document Object: Stores information about documents and pages.


## Examples


### Queue Library
 > Queue and prioritize data.

**Queue Data:**
```
\DeGeo\Libraries\Queue->queue( [ 'id' => 'test1', 'position' => 50 ] );
\DeGeo\Libraries\Queue->queue( [ 'id' => 'test2', 'position' => 20 ] );
\DeGeo\Libraries\Queue->queue( [ 'id' => 'test3', 'position' => 80 ] );
\DeGeo\Libraries\Queue->queue( [ 'id' => 'test4', 'position' => 10 ] );
```

**Get Queued Data:**
```
$queue = \DeGeo\Libraries\Queue->get_queue();
```

**Get Randomized Queued Data:**
```
$queue = \DeGeo\Libraries\Queue->get_queue( $sort = TRUE, $reversed = TRUE );
```

**Empty Queue Data:**
```
\DeGeo\Libraries\Queue->empty();
```

## Support

 - Please keep in mind this is a work in progress.
 - Please use the GitHub issues tab to receive support for any issues you may encounter using this repository.
 - Thank you for using DeGeo-PHP.


### CodeIgniter 4 Installation


#### Downloading the Files
 - Download and extract CodeIgniter 4 to your web directory.
 - Download and extract DeGeo-PHP to your CodeIgniter 4 directory.
 - In your CodeIgniter 4 directory edit the composer.js file and add `"DeGeo\\": "degeo-php/"` to the psr-4 autoload array.
 - In your CodeIgniter 4 directory edit the app/Config/Autoload.php file and add `'DeGeo'       => ROOTPATH . 'degeo'` to the psr-4 array.
 - Install Composer dependencies by running the command: `composer install`


#### Using GIT
 - Clone or checkout CodeIgniter 4 to your web directory.
 - In your CodeIgniter 4 directory run the command: `git submodule add https://github.com/degeo/degeo-php.git ./degeo`
 - In your CodeIgniter 4 directory edit the composer.js file and add `"DeGeo\\": "degeo-php/"` to the psr-4 autoload array.
 - In your CodeIgniter 4 directory edit the app/Config/Autoload.php file and add `'DeGeo'       => ROOTPATH . 'degeo'` to the psr-4 array.
 - Install Composer dependencies by running the command: `composer install`


#### Using the DeGeo CodeIgniter 4 Starter Application
 - Clone or checkout the DeGeo CodeIgniter 4 Starter Application to your web directory from: https://github.com/degeo/CodeIgniter4.

