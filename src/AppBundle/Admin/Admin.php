<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin as BaseAdmin;

/**
 * @author Randolph Roble <roblerm@gmail.com>
 */
abstract class Admin extends BaseAdmin
{

    const CLASS_REGEX = '@([A-Za-z0-9]+)Bundle\\\(Entity|Document|Model|PHPCR|CouchDocument|Phpcr|Doctrine\\\Orm|Doctrine\\\Phpcr|Doctrine\\\MongoDB|Doctrine\\\CouchDB)\\\(.*)@';

    /**
     * Returns the baseRouteName used to generate the routing information
     *
     * @throws \RuntimeException
     *
     * @return string the baseRouteName used to generate the routing information
     */
    public function getBaseRouteName()
    {
        if (!$this->baseRouteName) {
            preg_match(static::CLASS_REGEX, $this->getClass(), $matches);

            if (!$matches) {
                throw new \RuntimeException(sprintf('Cannot automatically determine base route name, please define a default `baseRouteName` value for the admin class `%s`', get_class($this)));
            }

            if ($this->isChild()) { // the admin class is a child, prefix it with the parent route name
                $this->baseRouteName = sprintf('%s_%s', $this->getParent()->getBaseRouteName(), $this->urlize($matches[5])
                );
            } else {

                $this->baseRouteName = sprintf('dagdaks_admin_%s', $this->urlize($matches[3]));
            }
        }

        return $this->baseRouteName;
    }

    /**
     * Returns the baseRoutePattern used to generate the routing information
     *
     * @throws \RuntimeException
     *
     * @return string the baseRoutePattern used to generate the routing information
     */
    public function getBaseRoutePattern()
    {
        if (!$this->baseRoutePattern) {
            preg_match(static::CLASS_REGEX, $this->getClass(), $matches);

            if (!$matches) {
                throw new \RuntimeException(sprintf('Please define a default `baseRoutePattern` value for the admin class `%s`', get_class($this)));
            }

            if ($this->isChild()) { // the admin class is a child, prefix it with the parent route name
                $this->baseRoutePattern = sprintf('%s/{id}/%s', $this->getParent()->getBaseRoutePattern(), $this->urlize($matches[5], '-')
                );
            } else {

                $this->baseRoutePattern = sprintf('/dagdaks/admin/%s', $this->urlize($matches[3], '-')
                );
            }
        }

        return $this->baseRoutePattern;
    }

}
