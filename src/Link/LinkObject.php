<?php

namespace Bayer\JsonApi\Link;

use Bayer\JsonApi\MetaTrait;

/**
 * Class LinkObject
 *
 * @link http://jsonapi.org/format/#document-structure-links
 * @package Bayer\JsonApi\Link
 */
class LinkObject
{
    use MetaTrait;

    /**
     * The link URL
     * @var string
     */
    protected $href;

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }
}