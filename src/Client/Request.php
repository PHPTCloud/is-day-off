<?php
/**
 * @class Request
 * @package isDayOff\Client
 */

namespace isDayOff\Client;

use GuzzleHttp\Client as GuzzleClient;

class Request
{
    /**
     * @var string
     */
    public const DOMAIN = 'isdayoff.ru';

    /**
     * @var string
     */
    public const PROTOCOL = 'https';

    /**
     * @var GuzzleClient
     */
    private $request;

    /**
     * Request constructor
     */
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
     * @param array $queryParams
     * @param array $bodyContent
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