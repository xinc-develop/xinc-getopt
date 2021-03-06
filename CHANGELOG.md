## 3.1.0 (2016-05-10)

* new Value class added

There is a huge requirement, to know when an value comes
from the option default value.

## 3.0.5 (2015-12-16)

* new method Option::getDefaultValue()

Ok the way getArgument()->getDefaultValue() already exists
but I want to hide Argument as an implementation detail.

## 3.0.4 (2015-12-16)

* new method Getopt::getOptionObjects

This method is introduced for cases where an option should be configured
in different places.

## 3.0.3 (2015-12-14)

Features:
* Flags as true boolean values added

## 3.0.2 (2015-12-13)

* fix Argument::hasDefaultValue, refs #1

## 3.0.1 (2015-12-13)

* fix composer name. thank you packagist

## 3.0.0 (2015-12-12)

* first release as Xinc.Getopt
* Makefile is gone
* move classes and tests
* use psr-4
* add option to Getopt::getIterator for filter out also short options

## 2.3.0 (2015-03-28)

Features:
* Optional argument descriptions (courtesy of @sabl0r)

Bugfixes:
* Passing a single hyphen as an option value works now (courtesy of @tistre)


## 2.2.0 (2014-09-13)

Features:
* Added method to customize the help message (courtesy of @mfn)
* Option now has a static create method for call chaining in PHP 5.3 (courtesy of @kamermans)


## 2.1.0 (2014-02-28)

Features:
* Added setters for default values and validation to Option


## 2.0.0 (2014-01-30)

Features:
* Argument validation (courtesy of @jochenvdv)


## 2.0.0-RC.1 (2014-01-17)

Changes:
* Namespace is now Ulrichsg\Getopt
* Public API has been cleaned up, please refer to the documentation


## 1.4.1 (2013-12-13)

Bugfixes:
* Long options are required to be longer than 1 character
* Passing duplicate option names to the constructor is forbidden by default


## 1.4.0 (2013-12-13)

Features:
* Options can be numeric (courtesy of @patinthehat)
* Additional convenience methods for working with operands (ditto)


## 1.3.0 (2013-12-07)

Features:
* Default values for options
* ArrayAccess, Countable and Traversable support
* Can set program name to enhance help message (courtesy of @misterion)


## 1.2.0 (2013-11-14)

Features:
* Allow passing incomplete option arrays


## 1.1.0 (2013-06-19)

Features:
* Added help text printing functionality

Bugfixes:
* Fixed passing a mandatory argument to the last in a sequence of collapsed short options


## 1.0.1 (2012-05-20)

Bugfixes:
* Fixed bug where '0' could not be passed as an option value

