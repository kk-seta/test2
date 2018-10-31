<?php

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\ProductSKU;
use App\Models\ProductSKUPrice;
use App\Models\ProductSKUQuotation;
use App\Models\ProductSpec;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(ProductSpec::class, function (Faker\Generator $faker) {
    return [
        'spec_name' => json_encode(
            []
        )
    ];
});
$factory->define(Product::class, function (Faker\Generator $faker) {

    return [
        'product_property' => json_encode([
            'zh-tw' => [
                'title' => '【保證入園】東京迪士尼實體門票：一日券（舞濱站領取）',
            ]
        ]),
        'product_location' => json_encode([
            'country' => ['日本'],
            'location' => ['日本', '東京', '千葉', '舞濱'],
            'geometry' => [
                'lat' => 35.632914,
                'lng' => 139.880394
            ]
        ]),
        'product_tags' => json_encode(['票券', '日本']),
        'product_category' => json_encode(['景點門票']),
        'product_timezone' => 'Asia/Tokyo',
        'product_description' => json_encode([
            'NEED_TIME' => '10小時',
            'SHORT_DESC' => '東京迪士尼門票一日券，於舞濱站領取實體票，前往東京迪士尼樂園或東京迪士尼海洋，不需人擠人排隊購票，KKday販售的東京迪士尼門票，不受入園管制限制，實體票券直接入園，讓您比別人更輕鬆進入東京迪士尼的夢幻世界！',
            'FEATURE' => '東京迪士尼35週年史上最大祭典”Happiest Celebration!”，於2018/4/15-2019/3/25盛大舉行',
        ]),
        'product_owner' => json_encode([
            'BD' => ['danny@kkday.com'],
            'OP' => ['danny@kkday.com'],
            'CS' => ['danny@kkday.com'],
        ]),
        'product_url_oid' => json_encode(["test"]),
        'product_media' => json_encode([
            'photo' => [
                'all' => [
                    'https://image.kkday.com/image/get/h_650%2Cc_fit/s1.kkday.com/product_19252/20180323075333_GwhkS/jpeg',
                    'https://image.kkday.com/image/get/h_650%2Cc_fit/s1.kkday.com/product_19252/20180323075355_AheZ2/jpeg',
                    'https://image.kkday.com/image/get/h_650%2Cc_fit/s1.kkday.com/product_19252/20180323075400_x8ZWT/jpeg'
                ],
            ],
            'media' => [
                'all' => [
                    'https://www.youtube.com/watch?v=Rh1W9zJzyA8'
                ]
            ]
        ]),
        'search_index' => json_encode(['test2']),
        'product_seo' => json_encode([
            'zh-tw' => [
                'meta' => [
                    'keyword' => 'test1,test2,test3',
                    'header' => 'test',
                    'description' => 'test'
                ]
            ]
        ]),
        'active_market' => json_encode([
            'TW' => $faker->boolean(50),
            'HK' => $faker->boolean(50),
            'JP' => $faker->boolean(50),
            'SG' => $faker->boolean(50)
        ]),
        'is_solr' => json_encode([
            'en' => $faker->boolean(50),
            'tw' => $faker->boolean(50),
            'jp' => $faker->boolean(50)
        ]),
        'is_active' => true,
        'origin_language' => 'zh-TW'
    ];
});
