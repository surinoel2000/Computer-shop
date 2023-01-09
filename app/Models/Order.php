<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Base
{
    use HasFactory;

    public $title = "Order";

    public function listingConfigs() {
        //$defaultListtingConfigs = parent::defaultListingConfigs();

        $listingConfigs =  array(
            array(
                'field' => 'id',
                'name' => 'Mã đơn hàng',
                'type' => 'string'
            ),
            array(
                'field' => 'order_status',
                'name' => 'Trạng thái',
                'type' => 'string'
            ),
            array(
                'field' => 'fullname',
                'name' => 'Họ tên',
                'type' => 'string'
            ),
            array(
                'field' => 'phone_num',
                'name' => 'Số điện thoại',
                'type' => 'string'
            ),
            array(
                'field' => 'diachi',
                'name' => 'Địa chỉ',
                'type' => 'string'
            ),

            array(
                'field' => 'updated_at',
                'name' => 'Ngày cập nhật',
                'type' => 'string'
            ),
            array(
                'field' => 'created_at',
                'name' => 'Ngày đặt',
                'type' => 'string'
            )

        );
        return array_merge($listingConfigs);
    }
}
