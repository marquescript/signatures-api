<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
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
        return response()->json(ClientResource::collection($clients), 200);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $client = $this->clientService->create($data);
        return response()->json(new ClientResource($client), 201);
    }

    public function show(string $id)
    {
        $client = $this->clientService->find($id);
        return response()->json(new ClientResource($client), 200);
    }

    public function update(ClientRequest $request, string $id)
    {
        $data = $request->all();
        $client = $this->clientService->update($id, $data);
        return response()->json(new ClientResource($client), 200);
    }

    public function destroy(string $id)
    {
        $this->clientService->delete($id);
        return response()->json(null, 204);
    }

}


