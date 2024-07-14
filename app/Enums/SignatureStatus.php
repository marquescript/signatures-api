<?php

namespace App\Enums;

enum SignatureStatus: int
{
    case ACTIVED = 1;
    case DEACTIVED = 2;
    case SUSPENDED = 3;
    case CANCELED = 0;

    public function label(): string
    {
        return match($this) {
            self::ACTIVED => 'Actived',
            self::DEACTIVED => 'Deactived',
            self::SUSPENDED => 'Suspended',
            self::CANCELED => 'Canceled',
        };
    }

}
