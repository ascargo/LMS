<?php

namespace App\Enums;

enum BookStatusEnum: string
{
    case Available = 'Available';
    case Borrowed = 'Borrowed';
    case Reserved = 'Reserved';
    case Lost = 'Lost';
}
