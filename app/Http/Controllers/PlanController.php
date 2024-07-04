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
        $data = $request->all();
        $plan = $this->planService->create($data);
        return response()->json($plan, 201);
    }


    public function show(string $id)
    {
        $plan = $this->planService->findById($id);
        if(!$plan)
        {
            return response()->json(['error' => 'Plan not found'], 404);
        }
        return response()->json($plan, 200);
    }


    public function update(PlanRequest $request, string $id)
    {
        $data = $request->all();
        $plan = $this->planService->update($id,$data);
        if(!$plan)
        {
            return response()->json(['error' => 'Plan not found'], 404);
        }
        return response()->json($plan, 200);
    }

    public function destroy(string $id)
    {
        $data = $this->planService->deleteById($id);
        if(!$data)
        {
            return response()->json(['error' => 'Plan not found'], 404);
        }
        return response()->json(null,204);
    }
}
