<?php

namespace App\Service;

use App\Models\Plan;

class PlanService
{

    public function findAll()
    {
        return Plan::all();
    }

    public function create(array $data)
    {
        return Plan::create($data);
    }

    public function update($plan, $data)
    {
         $plan->update($data);
        return $plan;
    }

    public function delete($plan)
    {
        $plan->delete($plan);
    }

}
