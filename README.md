Once DDEV’s installed, setting up a new project should be quick:

1) Clone or create the code for your project.
2) `cd` into the project directory and run `ddev config` to initialize a DDEV project.
3) Run `ddev start` to spin up the project.
4) Run `ddev launch` to open your project in a browser.
5) Run `ddev composer install` to install dependencies.
5) Run `ddev drush cim` to import Drupal configuration.
This should enable the two custom modules for you.

The custom modules can be found at ***web/modules/custom/*** and are named `basic_article` and `mini_rest`.

Xdebug can be easily enabled by `ddev xdebug on` and disabled by `ddev xdebug off`.
