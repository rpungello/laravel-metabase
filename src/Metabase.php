<?php

namespace Rpungello\Metabase;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Rpungello\Metabase\Data\Database;
use Rpungello\Metabase\Data\DatabaseMetadata;
use Rpungello\Metabase\Data\Field;
use Spatie\LaravelData\Data;

readonly class Metabase
{
    public function __construct(private string $baseUri, private string $apiKey) {}

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function getDatabase(int $id): Database
    {
        return Database::from($this->get("database/$id"));
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function getDatabaseMetadata(Database|int $database): DatabaseMetadata
    {
        $id = is_int($database) ? $database : $database->id;

        return DatabaseMetadata::from($this->get("database/$id/metadata"));
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function updateField(Field $field): Field
    {
        return Field::from(
            $this->put("field/{$field->id}", $field)
        );
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    private function get(string $uri): array
    {
        return $this->pendingRequest()->get($uri)->json();
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    private function put(string $uri, Data $data): array
    {
        return $this->pendingRequest()->put($uri, $data)->json();
    }

    private function pendingRequest(): PendingRequest
    {
        return Http::withHeader('X-Api-Key', $this->apiKey)
            ->throw()
            ->baseUrl("$this->baseUri/api")
            ->acceptJson()
            ->asJson();
    }
}
