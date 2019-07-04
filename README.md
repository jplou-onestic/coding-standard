# Onestic Code Sniffer Coding Standard for Magento

This project is a fork of https://github.com/magento-ecg/coding-standard, extended with new sniffers and extra rule to comply with [Onestic Coding Standards](doc/onestic-coding-standards.md).

This rules must be applied in all code developed in Onestic.

## Index
* [How to start](#markdown-header-how-to-start)
* [Versions](#markdown-header-versions)
* [Roadmap](#markdown-header-roadmap)
* [Onestic Coding Standards](doc/onestic-coding-standards.md)
* [Setup Coding Standards](doc/setup-coding-standards.md)
* [ECG Magento Code Sniffer Coding Standard](https://github.com/magento-ecg/coding-standard)


## How to start

* Check [standards document](doc/onestic-coding-standards.md) for knowing about our standards.
* Check [setup document](doc/setup-coding-standards.md) for start working with our ruleset. 


### Skipping validations

As we work with legacy/inherited code, in some cases we will skip some validations as thery're not defined or the cost of applying them could be very high. 

If you need to skip a validation, you should skip it by marking the part of code with a comment so sniffers and tools are notified about this exception. 

With Code Sniffer you could mark starting and ending point of a skip with comments like this:

```php
// phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
public method _someMethod()
{
    return $this->someVar;
}
// phpcs:enable PSR2.Methods.MethodDeclaration.Underscore
```

Also with Mess Detector: 
```php
/*
* @SuppressWarnings(PHPMD.UnusedFormalParameter)
*/
public method _someMethod($someParam)
{
    return $this->someVar;
}
```

Always mark the more concrete rule you can and AVOID use of ´// @codingStandardsIgnoreFile´ at file's header.

### Application cases for coding standards ###

If you're working in an old project or third party code, maybe you shouldn't apply our coding standards in order to keep consistency in code style. But whenever you can you must clean al mess code you found.

If you're working in a new module you must use all this rules.

If some rules doesn't fit with what you want to do or if you're missing some rules, feel free to PR.

Also you can ask to your teach lead for help working with them :)   

And of course: __Feedback is welcome!__


## Versions
**1.0.0**

* Project migrated from [Github repository](https://github.com/onestic/coding-standard) 

## Roadmap

* Define shorthand rule for ```<?= $someVariable ?>``` (phtml files)

* Check array autoformat by terminal after Grumphp error (phpcbf?)

* Test rulesets from https://github.com/magento/magento-coding-standard

* Test rulesets from https://github.com/magento/marketplace-eqp

* [Mess Detector] Define exceptions for "Avoid really long methods" (i.e: Install scripts)

* [Mess Detector] Check validations on phtml files
