<?php

namespace App\Service;

use App\Exceptions\EntityNotFound;
use App\Http\Resources\PlanResource;
use App\Models\Plan;

class PlanService
{
    private static $entity = 'Plan';

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return Plan::paginate($url);
    }

    public function find($id)
    {
        $plan = self::verifyPlanExists($id);
        return $plan;
    }

    public function create(array $data)
    {
        return Plan::create($data);
    }

    public function update($id, $data)
    {
        $plan = self::verifyPlanExists($id);
        $plan->update($data);
        return $plan;
    }

    public function delete($id)
    {
        $plan = self::verifyPlanExists($id);
        $plan->delete($plan);
    }

    private static function verifyPlanExists($id)
    {
        $plan = Plan::find($id);
        throw_if(!$plan, EntityNotFound::class, self::$entity);
        return $plan;
    }

}
