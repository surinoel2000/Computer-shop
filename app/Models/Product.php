<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Base;

class Product extends Base
{
    use HasFactory;
    public $title = "Sản phẩm";

    public function listingConfigs() {
      $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'product_code',
                'name' => 'Mã sản phẩm',
                'type' => 'string'
            ),
            array(
                'field' => 'name_product',
                'name' => 'Tên sản phẩm',
                'type' => 'string'
            ),
            array(
                'field' => 'name_brand',
                'name' => 'Tên hãng',
                'type' => 'string'
            ),
            array(
                'field' => 'category_name',
                'name' => 'Tên danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'price',
                'name' => 'Giá tiền',
                'type' => 'number'
            ),
            array(
                'field' => 'product_status',
                'name' => 'Trạng thái',
                'type' => 'number'
            ),
            array(
                'field' => 'thumbnail_url',
                'name' => 'Hình ảnh',
                'type' => 'image'
            ),

        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
