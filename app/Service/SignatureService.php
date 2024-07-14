<?php

namespace App\Service;

use App\Exceptions\EntityNotFound;
use App\Exceptions\InvalidAction;
use App\Models\Signature;

class SignatureService
{
    public function __construct(private Signature $signature)
    {}
    private static $entity = 'Signature';

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return $this->signature->paginate($url);
    }

    public function find($id)
    {
        $signature = self::verifySignatureExists($id);
        return $signature;
    }

    public function create(array $data)
    {
        return $this->signature->create($data);
    }

    public function update($id, array $data)
    {
        $signature = self::verifySignatureExists($id);
        $signature->status = $data['status'];
        $signature->plan_id = $data['plan_id'];
        $signature->save();
        return $signature;
    }

    public function delete($id)
    {
        $signature = self::verifySignatureExists($id);
        throw_if($signature->status->value !== 0, InvalidAction::class, 'Cannot delete a subscription that has not been canceled');
        $signature->delete();
    }

    private function verifySignatureExists($id)
    {
        $signature = $this->signature->find($id);
        throw_if(!$signature, EntityNotFound::class, self::$entity);
        return $signature;
    }
}
