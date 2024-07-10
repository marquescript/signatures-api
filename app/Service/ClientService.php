<?php

namespace App\Service;

use App\Exceptions\EntityAlreadyExists;
use App\Exceptions\EntityNotFound;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use function Laravel\Prompts\select;

class ClientService
{
    private static $entity = 'Client';

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return ClientResource::collection(Client::with('user')->paginate($url));
    }

    public function find($id)
    {
        $client = self::verifyClientExists($id);
        return new ClientResource($client);
    }

    public function create(array $data)
    {
        throw_if(self::userHasClient($data['user_id']), EntityAlreadyExists::class);
        return new ClientResource(Client::create($data));
    }

    public function update($id, $data)
    {
        $client = self::verifyClientExists($id);
        $client->update($data);
        return new ClientResource($client);
    }

    public function delete($id)
    {
        $client = self::verifyClientExists($id);
        $client->delete();
    }

    private static function userHasClient($userId)
    {
        return Client::where('user_id', $userId)->exists();
    }

    private static function verifyClientExists($id)
    {
        $client = Client::find($id);
        throw_if(!$client, EntityNotFound::class, self::$entity);
        return $client;
    }

}
