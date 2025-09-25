<?php

namespace Rpungello\Metabase;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Metabase
{
    private Client $client;

    public function __construct(string $baseUri, string $apiKey)
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
            RequestOptions::HEADERS => [
                'X-Api-Key' => $apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }
}
