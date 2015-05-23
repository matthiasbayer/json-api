JSON API
======

What is this?
-------------

This library is a framework agnostic php implementation of the latest [json-api](http://jsonapi.org/format/) format.
It provides you with the right tools to build and process data following the json-api specification.

Built-in features:

 * Compatible json-api version: 1.0
 * Automated handling of serialization, content types and status codes
 * Automated handling of meta information, resource identifier objects and compound documents
 * Build-in support for sorting, pagination and filtering
 * Framework agnostic implementation for easy integration in every codebase

Installation
------------
via Composer:
    
    composer require matthiasbayer/json-api

Standalone usage
----------------

```php
$coming = 'soon';
```

Symfony2 Integration
--------------------

You can use the [JsonApiBundle](https://github.com/matthiasbayer/JsonApiBundle) for fast and
easy integration of this library into your Symfony2 project.

