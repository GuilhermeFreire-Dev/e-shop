<?php

namespace App\Enums;

enum CartStatusEnum: string
{
    case PENDING = "pending";
    case ABANDONED = "abandoned";
    case FINISHED = "finished";
}
