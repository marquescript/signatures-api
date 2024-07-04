<?php

namespace App\Service;

use App\Models\Plan;

class PlanService
{

    public function findAll()
    {
        return Plan::all();
    }

    public function findById($id)
    {
        $plan = Plan::find($id);
        if(!$plan)
        {
            return false;
        }
        return $plan;
    }

    public function create(array $data)
    {
        return Plan::create($data);
    }

    public function update($id, $data)
    {
        $plan = Plan::find($id);
        if($plan)
        {
            $plan->update($data);
            return $plan;
        }
        return false;
    }

    public function deleteById($id)
    {
        $plan = Plan::find($id);
        if($plan)
        {
            $plan->delete($id);
            return true;
        }
        return false;
    }

}
