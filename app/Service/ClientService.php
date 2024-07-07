<?php

namespace App\Service;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use function Laravel\Prompts\select;

class ClientService
{

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return ClientResource::collection(Client::with('user')->paginate($url));
    }

    public function find(Client $client)
    {
        return new ClientResource(Client::with('user')->find($client->id));
    }

    public function create(array $data)
    {
        return Client::create($data);
    }

    public function update($client, $data)
    {
        $client->update($data);
        return $client;
    }

    public function delete($client)
    {
        $client->delete($client);
    }

}
