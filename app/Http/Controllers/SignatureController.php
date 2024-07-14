<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatureRequest;
use App\Http\Resources\SignatureResource;
use App\Service\SignatureService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SignatureController extends Controller
{

    public function __construct(private SignatureService $signatureService)
    {}

    public function index(Request $request)
    {
        $signatures = $this->signatureService->findAll($request);
        return response()->json(new SignatureResource($signatures), 200);
    }

    public function store(SignatureRequest $request)
    {
        $signature = $this->signatureService->create($request->all());
        return response()->json(new SignatureResource($signature), 201);
    }

    public function show(string $id)
    {
        $signature = $this->signatureService->find($id);
        return response()->json(new SignatureResource($signature), 200);
    }

    public function update(SignatureRequest $request, string $id)
    {
        $signature = $this->signatureService->update($id, $request->all());
        return response()->json(new SignatureResource($signature), 200);
    }


    public function destroy(string $id)
    {
        $this->signatureService->delete($id);
        return response()->json(null, 204);
    }
}
