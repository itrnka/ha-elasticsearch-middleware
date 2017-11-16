<?php
declare(strict_types = 1);

namespace ha\Middleware\NoSQL\Elasticsearch;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use ha\Component\Configuration\Configuration;
use ha\Middleware\Middleware;


/**
 * Class Elasticsearch.
 *
 * Elasticsearch vendor package proxy for ha framework.
 */
class Elasticsearch implements Middleware
{

    /** @var Configuration */
    private $configuration;

    /** @var Client */
    private $driver;

    /**
     * MiddlewareDefaultAbstract constructor.
     *
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
        $this->driver = ClientBuilder::create()->setHosts($configuration->get('hosts'))->build();
    }

    /**
     * Get value from internal configuration by key.
     *
     * @param string $key
     *
     * @return mixed
     */
    final public function cfg(string $key)
    {
        return $this->configuration->get($key);
    }

    /**
     * Get instance name.
     *
     * @return string
     */
    final public function name() : string
    {
        return $this->cfg('name');
    }

    /**
     * Get driver instance.
     *
     * @return Client
     */
    final public function driver() : Client
    {
        return $this->driver;
    }

}