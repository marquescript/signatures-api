<?php

namespace App\Service;

use App\Exceptions\EntityNotFound;
use App\Http\Resources\PlanResource;
use App\Models\Plan;

class PlanService
{
    public function __construct(private Plan $plan)
    {}
    private static $entity = 'Plan';

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return $this->plan->paginate($url);
    }

    public function find($id)
    {
        $plan = self::verifyPlanExists($id);
        return $plan;
    }

    public function create(array $data)
    {
        return $this->plan->create($data);
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

    private function verifyPlanExists($id)
    {
        $plan = $this->plan->find($id);
        throw_if(!$plan, EntityNotFound::class, self::$entity);
        return $plan;
    }

}
