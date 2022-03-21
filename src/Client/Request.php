<?php

declare(strict_types=1);

namespace isDayOff\Client;

use GuzzleHttp\Client as GuzzleClient;

/**
 * @class   Request
 * @package isDayOff\Client
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
class Request
{
    public const DOMAIN = 'isdayoff.ru';
    public const PROTOCOL = 'https';

    private GuzzleClient $request;

    public function __construct()
    {
        $this->request = new GuzzleClient([
            'base_url' => $this->getBaseUrl(),
        ]);
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return self::PROTOCOL . '://' . self::DOMAIN;
    }

    /**
     * @param string $method
     * @param array  $queryParams
     * 
     * @return GuzzleHttp\Psr7\Response
     */
    public function get(string $uri, array $queryParams = [])
    {
        $uri = $this->getBaseUrl() . $uri;

        return $this->request->request('GET', $uri, [
            'query' => $queryParams
        ]);
    }
}
