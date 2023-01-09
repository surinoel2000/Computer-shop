<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Base
{
    use HasFactory;
    public $title = "Hãng";

    public function listingConfigs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'brand_code',
                'name' => 'Mã hãng',
                'type' => 'string'
            ),
            array(
                'field' => 'name_brand',
                'name' => 'Tên hãng',
                'type' => 'string'
            ),
            array(
                'field' => 'brand_status',
                'name' => 'Trạng thái',
                'type' => 'number'
            ),
            array(
                'field' => 'thumbnail_url',
                'name' => 'Hình ảnh',
                'type' => 'string'
            ),
        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
