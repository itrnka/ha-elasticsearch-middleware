# Elasticsearch for *ha* framework

Provides access to official [Elasticsearch PHP API](https://github.com/elastic/elasticsearch-php) as a middleware implementation for the framework.

## Installation

Installation is available via composer:

```bash
composer require itrnka/ha-elasticsearch-middleware
```

## Requirements

This package is based on [*ha* framework](https://github.com/itrnka/ha-framework). Composer installs *ha* framework automatically if it is not already installed.

## Configuration

Required configuration keys:

- `name`: by ha framework requirements
- `hosts`: *string[]* list of elasticsearch hosts

Add your configuration to the configuration file in *ha* framework according to this example:

```php
$cfg['middleware'] = [

    // ...

    // elasticsearch - single server
    [
        ha\Middleware\NoSQL\Elasticsearch\Elasticsearch::class,
        [
            'name' => 'ES001',
            'hosts' => ['127.0.0.1:9200'],
        ]
    ],

    // elasticsearch - multi server
    [
        ha\Middleware\NoSQL\Elasticsearch\Elasticsearch::class,
        [
            'name' => 'ES002',
            'hosts' => ['10.10.10.1:9200', '10.10.10.2:9200'],
        ]
    ],

    // ...
];
```

Then the elasticsearch will be available as follows:

```php
// middleware instance
$es1 = main()->middleware->ES001;
$es2 = main()->middleware->ES002;

// es client (instance of \Elasticsearch\Client):
$es1Client = main()->middleware->ES001->driver();
$es2Client = main()->middleware->ES002->driver();
```