<?php

namespace App\Service;

use App\Exceptions\EntityNotFound;
use App\Exceptions\InvalidAction;
use App\Models\Signature;

class SignatureService
{
    private static $entity = 'Signature';

    public function findAll($url)
    {
        $url = $url->query('records', 5);
        return Signature::paginate($url);
    }

    public function find($id)
    {
        $signature = self::verifySignatureExists($id);
        return $signature;
    }

    public function create(array $data)
    {
        return Signature::create($data);
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

    private static function verifySignatureExists($id)
    {
        $signature = Signature::find($id);
        throw_if(!$signature, EntityNotFound::class, self::$entity);
        return $signature;
    }
}
