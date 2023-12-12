<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;

class Order extends Model
{
    use HasFactory;

    protected $table = 'Orders';

    protected $fillable = [
        'userid',
        'fullnameReciver',
        'address',
        'phone',
        'message',
        'totalOrder',
        'payMethod',
        'status',
    ];

    public function getStatus() {
        switch ($this->status) {
            case OrderStatus::ORDER:
                return 'Chờ xác nhận';

            case OrderStatus::CONFIRM_ORDER:
                return 'Đã xác nhận';

            case OrderStatus::ORDER_SUCCESS:
                return 'Thành công';

            case OrderStatus::CANCEL_ORDER:
                return 'Đã hủy';
        }
    }
}
