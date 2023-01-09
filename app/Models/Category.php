<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Base
{
    use HasFactory;
    public $title = "Danh mục";

    public function listingConfigs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'category_code',
                'name' => 'Mã danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'category_name',
                'name' => 'Tên danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'description',
                'name' => 'Mô tả danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'category_status',
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
