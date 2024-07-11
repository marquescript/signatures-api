<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatureRequest;
use App\Service\SignatureService;
use Illuminate\Http\Request;

class SignatureController extends Controller
{

    public function __construct(private SignatureService $signatureService)
    {}

    public function index(Request $request)
    {
        $signatures = $this->signatureService->findAll($request);
        return response()->json($signatures, 200);
    }

    public function store(SignatureRequest $request)
    {
        $signature = $this->signatureService->create($request->all());
        return response()->json($signature, 201);
    }

    public function show(string $id)
    {
        $signature = $this->signatureService->find($id);
        return response()->json($signature, 200);
    }

    public function update(SignatureRequest $request, string $id)
    {
        $signature = $this->signatureService->update($id, $request->all());
        return response()->json($signature, 200);
    }


    public function destroy(string $id)
    {
        $this->signatureService->delete($id);
        return response()->json(null, 204);
    }
}
