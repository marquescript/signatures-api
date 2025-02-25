<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Service\PlanService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Import the trait


class PlanController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private PlanService $planService){}

    public function index(Request $request)
    {
        $plans = $this->planService->findAll($request);
        return response()->json(PlanResource::collection($plans), 200);
    }

    public function store(PlanRequest $request)
    {
        $this->authorize('admin', Plan::class);
        $data = $request->all();
        $plan = $this->planService->create($data);
        return response()->json(new PlanResource($plan), 201);
    }

    public function show(string $id)
    {
        $plan = $this->planService->find($id);
        return response()->json(new PlanResource($plan), 200);
    }

    public function update(PlanRequest $request, string $id)
    {
        $this->authorize('admin', Plan::class);
        $data = $request->all();
        $plan = $this->planService->update($id,$data);
        return response()->json(new PlanResource($plan), 200);
    }

    public function destroy(string $id)
    {
        $this->authorize('admin', Plan::class);
        $this->planService->delete($id);
        return response()->json(null,204);
    }
}
