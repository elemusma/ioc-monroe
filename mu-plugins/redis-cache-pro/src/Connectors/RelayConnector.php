<?php
/**
 * Copyright © Rhubarb Tech Inc. All Rights Reserved.
 *
 * All information contained herein is, and remains the property of Rhubarb Tech Incorporated.
 * The intellectual and technical concepts contained herein are proprietary to Rhubarb Tech Incorporated and
 * are protected by trade secret or copyright law. Dissemination and modification of this information or
 * reproduction of this material is strictly forbidden unless prior written permission is obtained from
 * Rhubarb Tech Incorporated.
 *
 * You should have received a copy of the `LICENSE` with this file. If not, please visit:
 * https://objectcache.pro/license.txt
 */

declare(strict_types=1);

namespace RedisCachePro\Connectors;

use Relay\Relay;
use LogicException;

use RedisCachePro\Configuration\Configuration;

use RedisCachePro\Connections\RelayConnection;
use RedisCachePro\Connections\ConnectionInterface;

use RedisCachePro\Exceptions\RelayMissingException;
use RedisCachePro\Exceptions\RelayOutdatedException;

class RelayConnector implements Connector
{
    /**
     * The minimum required Relay version.
     *
     * @var string
     */
    const RequiredVersion = '0.4.0-dev';

    /**
     * Ensure the minimum required Relay version is loaded.
     *
     * @return void
     */
    public static function boot(): void // phpcs:ignore PHPCompatibility
    {
        if (! extension_loaded('relay')) {
            throw new RelayMissingException;
        }

        if (version_compare(phpversion('relay'), self::RequiredVersion, '<')) {
            throw new RelayOutdatedException;
        }
    }

    /**
     * Check whether the client supports the given feature.
     *
     * @return bool
     */
    public static function supports(string $feature): bool
    {
        switch ($feature) {
            case Configuration::SERIALIZER_PHP:
                return \defined('\Relay\Relay::SERIALIZER_PHP');
            case Configuration::SERIALIZER_IGBINARY:
                return \defined('\Relay\Relay::SERIALIZER_IGBINARY');
            case Configuration::COMPRESSION_NONE:
                return true;
            case Configuration::COMPRESSION_LZF:
                return \defined('\Relay\Relay::COMPRESSION_LZF');
            case Configuration::COMPRESSION_LZ4:
                return \defined('\Relay\Relay::COMPRESSION_LZ4');
            case Configuration::COMPRESSION_ZSTD:
                return \defined('\Relay\Relay::COMPRESSION_ZSTD');
            case 'tls':
            case 'retries':
            case 'backoff':
                return true;
        }

        return false;
    }

    /**
     * Create a new Relay connection.
     *
     * @param  \RedisCachePro\Configuration\Configuration  $config
     * @return \RedisCachePro\Connections\ConnectionInterface
     */
    public static function connect(Configuration $config): ConnectionInterface
    {
        if ($config->cluster) {
            return static::connectToCluster($config);
        }

        if ($config->sentinels) {
            return static::connectToSentinels($config);
        }

        if ($config->servers) {
            return static::connectToReplicatedServers($config);
        }

        return static::connectToInstance($config);
    }

    /**
     * Create a new PhpRedis connection to an instance.
     *
     * @param  \RedisCachePro\Configuration\Configuration  $config
     * @return \RedisCachePro\Connections\PhpRedisConnection
     */
    public static function connectToInstance(Configuration $config): ConnectionInterface
    {
        $client = new Relay;

        $persistent = $config->persistent;
        $persistentId = \is_string($persistent) ? $persistent : '';

        $host = $config->host;

        if ($config->scheme) {
            $host = "{$config->scheme}://{$config->host}";
        }

        $host = \str_replace('unix://', '', $host);

        $parameters = [
            $host,
            $config->port ?? 0,
            $config->timeout,
            $persistentId,
            $config->retry_interval,
            $config->read_timeout,
        ];

        if ($config->tls_options) {
            $parameters[] = ['stream' => $config->tls_options];
        }

        $method = $persistent ? 'pconnect' : 'connect';

        $client->{$method}(...$parameters);

        if ($config->username && $config->password) {
            $client->auth([$config->username, $config->password]);
        } elseif ($config->password) {
            $client->auth($config->password);
        }

        if ($config->database) {
            $client->select($config->database);
        }

        return new RelayConnection($client, $config);
    }

    /**
     * Create a new clustered Relay connection.
     *
     * @param  \RedisCachePro\Configuration\Configuration  $config
     *
     * @throws \LogicException
     */
    public static function connectToCluster(Configuration $config): ConnectionInterface
    {
        throw new LogicException('Relay does not support clusters');
    }

    /**
     * Create a new Relay Sentinel connection.
     *
     * @param  \RedisCachePro\Configuration\Configuration  $config
     *
     * @throws \LogicException
     */
    public static function connectToSentinels(Configuration $config): ConnectionInterface
    {
        throw new LogicException('Relay does not support sentinels');
    }

    /**
     * Create a new replicated Relay connection.
     *
     * @param  \RedisCachePro\Configuration\Configuration  $config
     *
     * @throws \LogicException
     */
    public static function connectToReplicatedServers(Configuration $config): ConnectionInterface
    {
        throw new LogicException('Relay does not support replicated connections');
    }
}
