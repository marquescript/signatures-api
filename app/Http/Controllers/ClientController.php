<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Service\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct(private ClientService $clientService)
    {}

    public function index(Request $request)
    {
        $clients = $this->clientService->findAll($request);
        return response()->json($clients, 200);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $client = $this->clientService->create($data);
        return response()->json($client, 201);
    }

    public function show(Client $client)
    {
        $client = $this->clientService->find($client);
        return response()->json($client, 200);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->all();
        $client = $this->clientService->update($client, $data);
        return response()->json($client, 200);
    }

    public function destroy(Client $client)
    {
        $this->clientService->delete($client);
        return response()->json(null, 204);

    }
}
