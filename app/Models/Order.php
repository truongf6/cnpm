<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            case 0:
                return 'Chờ xác nhận';
            case -1:
                return 'Đơn đã bị hủy';
            case -2:
                return 'Thanh toán thất bại';
            case 1:
                return 'Đã thanh toán';
            case 2:
                return 'Thành công';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
