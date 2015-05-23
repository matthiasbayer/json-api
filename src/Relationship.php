<?php

namespace Bayer\JsonApi;
use Bayer\JsonApi\Resource\ResourceIdentifier;

/**
 * Class Relationship
 *
 * @link http://jsonapi.org/format/#document-structure-resource-objects-relationships
 * @package Bayer\JsonApi
 */
class Relationship
{
    use MetaObject;
    use LinkObject;

    /**
     * @var ResourceIdentifier|ResourceIdentifier[]|null
     */
    protected $data;
}