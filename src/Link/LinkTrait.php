<?php

namespace Bayer\JsonApi\Link;

trait LinkTrait
{
    /**
     * @var string[]|LinkObject[]|null
     */
    protected $links;

    /**
     * @return string[]|LinkObject[]|null
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param array|null $links
     */
    public function setLinks(array $links)
    {
        $this->links = null;

        foreach ($links as $name => $value) {
            $this->addLink($name, $value);
        }
    }

    /**
     * @param string $name
     * @return LinkObject|string|null
     */
    public function getLink($name)
    {
        if (isset($this->links[$name])) {
            return $this->links[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param string|LinkObject $value
     */
    public function addLink($name, $value)
    {
        if (!in_array($name, array('self', 'related', 'prev', 'next', 'first', 'last'))) {
            throw new \InvalidArgumentException("Link name must be self, related, prev, next, first or last");
        }

        if (!is_string($value) && !$value instanceof LinkObject) {
            throw new \InvalidArgumentException("Link value must be either string or LinkObject");
        }

        if (null === $this->links) {
            $this->links = array();
        }

        $this->links[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function removeLink($name)
    {
        if (isset($this->links[$name])) {
            $removed = $this->links[$name];
            unset($this->links[$name]);

            return $removed;
        }

        return null;
    }
}