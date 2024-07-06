<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use App\Service\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    public function __construct(private PlanService $planService){}

    public function index()
    {
        $plans = $this->planService->findAll();
        return response()->json($plans, 200);
    }

    public function store(PlanRequest $request)
    {
        $data = $request->validated();
        $plan = $this->planService->create($data);
        return response()->json($plan, 201);
    }

    public function show(Plan $plan)
    {
        return response()->json($plan, 200);
    }

    public function update(PlanRequest $request, Plan $plan)
    {
        $data = $request->all();
        $plan = $this->planService->update($plan,$data);
        return response()->json($plan, 200);
    }

    public function destroy(Plan $plan)
    {
        $this->planService->delete($plan);
        return response()->json(null,204);
    }
}
