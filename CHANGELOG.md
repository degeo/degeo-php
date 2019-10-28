# Change Log
All notable changes to this project will be documented in this file.

## [0.0.7] - 2019-10-28
### Added
 - Document Object construct now accepts parameters for creating a document.
 - Document Object now has a subtitle property.
 - Resources Queue Library.
 - Bootstrap view files.
### Changed
 - Corrected Queue Library exception message thrown when missing position identifier.
 - Corrected Metatag Queue Library array key in the render method.


## [0.0.6] - 2019-10-25
### Added
 - CodeIgniter 4 Layout Library to Render the Bootstrap 4 Layout.
 - Document Object for storing information about documents and pages.
 - Messages Queue Library now has add and remove methods.
 - Layout Queue Library now has add and remove methods.
 - Breadcrumbs Queue Library now has add and remove methods.
 - Metatags Queue Library now has add and remove methods.
 - Layout Queue Library now has a position identifier.
### Changed
 - Namespace for DeGeo classes now follow the filesystem structure.
 - Layout Queue Library add method position parameter default is now null. Previously an empty string.
 - Layout Queue Library add method layout array keys now use the internal identifiers.
 - Layout Queue Library remove method now passes the position identifier as the key to the unqueue method.
 - Layout Queue Library render method now accepts the data array as the first parameter and the echo output flag as the second parameter.
 - Layout Queue Library render layout method now accepts a data array as the second parameter and extracts the data within the method.
 - Queue Library now throws an exception if the data array parameter is not an array.

## [0.0.5] - 2019-10-20
### Added
 - Queue Library example.
 - Messages Queue Library example.
 - Hosts Library example.
 - Queue Library now has a method to reverse sort the queue.
### Changed
 - Hosts Library randomizer now works as intended.

## [0.0.4] - 2019-10-20
### Added
 - Layout Library.
 - Bootstrap 4 Layout Library.

## [0.0.3] - 2019-10-20
### Added
 - Hosts Library.

## [0.0.2] - 2019-10-02
### Added
 - Messages Queue Library.
 - Breadcrumbs Queue Library.
 - Metatags Queue Library.
### Changed
 - Queue Library now has an `empty` method.

## [0.0.1] - 2019-09-23
### Added
 - Queue Library.
 - Layout Queue Library.