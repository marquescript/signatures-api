<?php

namespace App\Service;

use App\Exceptions\EntityAlreadyExists;
use App\Exceptions\EntityNotFound;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use function Laravel\Prompts\select;

class ClientService
{
    public function __construct(private Client $client)
    {}
    private static $entity = 'Client';

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return ($this->client->with('user')->paginate($url));
    }

    public function find($id)
    {
        $client = self::verifyClientExists($id);
        return $client;
    }

    public function create(array $data)
    {
        throw_if(self::userHasClient($data['user_id']), EntityAlreadyExists::class);
        return Client::create($data);
    }

    public function update($id, $data)
    {
        $client = self::verifyClientExists($id);
        $client->update($data);
        return $client;
    }

    public function delete($id)
    {
        $client = self::verifyClientExists($id);
        $client->delete();
    }

    private function userHasClient($userId)
    {
        return $this->client->where('user_id', $userId)->exists();
    }

    private function verifyClientExists($id)
    {
        $client = $this->client->find($id);
        throw_if(!$client, EntityNotFound::class, self::$entity);
        return $client;
    }

}
