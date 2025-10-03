<?php

namespace Rpungello\Metabase;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
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
     * @throws RequestException
     * @throws ConnectionException
     */
    public function createDatabase(Database $database): Database
    {
        return Database::from(
            $this->post("database", $database)
        );
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
     * @throws RequestException
     * @throws ConnectionException
     */
    public function syncSchema(Database|DatabaseMetadata|int $database): bool
    {
        $id = is_int($database) ? $database : $database->id;

        $response = $this->post("database/$id/sync_schema");

        return Arr::get($response, 'status') === 'ok';
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function scanValues(Database|DatabaseMetadata|int $database): bool
    {
        $id = is_int($database) ? $database : $database->id;

        $response = $this->post("database/$id/rescan_values");

        return Arr::get($response, 'status') === 'ok';
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
        try {
            return $this->pendingRequest()->put($uri, $data)->json();
        } catch (RequestException $ex) {
            $json = json_decode($ex->response->getBody()->getContents(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw $ex;
            }

            if (! empty($json['specific-errors'])) {
                throw ValidationException::withMessages($json['specific-errors']);
            }

            throw $ex;
        }
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    private function post(string $uri, ?Data $data = null): array
    {
        try {
            return $this->pendingRequest()->post($uri, $data ?: [])->json();
        } catch (RequestException $ex) {
            $json = json_decode($ex->response->getBody()->getContents(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw $ex;
            }

            if (! empty($json['specific-errors'])) {
                throw ValidationException::withMessages($json['specific-errors']);
            }

            throw $ex;
        }
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
