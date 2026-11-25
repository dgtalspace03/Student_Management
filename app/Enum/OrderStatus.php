<?php
namespace App\Enum;
enum OrderStatus: string
{
    case Pending   = 'pending';
    case Paid      = 'paid';
    case Cancelled = 'cancelled';  
    case Expired   = 'expired'; 
}