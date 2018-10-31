<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('prod_oid')->comment('產品ID');
            $table->jsonb('product_property')->comment('產品相關屬性');
            $table->jsonb('product_location')->comment('產品區域/經緯度/國家');
            $table->jsonb('product_tags')->comment('產品標籤');
            $table->jsonb('product_category')->comment('產品分類');
            $table->string('product_timezone')->comment('產品時區');
            $table->jsonb('product_description')->comment('產品描述');
            $table->jsonb('product_owner')->comment('產品負責人');
            $table->jsonb('product_url_oid')->comment('產品對應網址');
            $table->jsonb('product_media')->comment('產品圖片/影片');
            $table->jsonb('search_index')->comment('搜尋引擎index設定');
            $table->jsonb('product_seo')->comment('產品SEO設定');
            $table->jsonb('active_market')->comment('產品銷售市場');
            $table->jsonb('is_solr')->comment('產品是否要建立索引');
            $table->boolean('is_active')->comment('產品是否啟用');
            $table->string('origin_language')->comment('產品原始語系');
            $table->timestamps();
        });

        Schema::create('product_items', function (Blueprint $table) {
            $table->increments('item_oid')->comment('品項ID');
            $table->integer('pkg_oid')->comment('套餐ID');
            $table->jsonb('spec')->comment('品項規格');
            $table->boolean('is_delete')->comment('是否刪除');
            $table->timestamps();
        });

        Schema::create('product_spec', function (Blueprint $table) {
            $table->increments('spec_oid')->comment('規格ID');
            $table->jsonb('spec_name')->comment('規格名稱');
            $table->jsonb('spec_item_code')->comment('規格代碼');
            $table->jsonb('spec_item_lang')->comment('規格內容');
            $table->boolean('is_delete')->comment('是否刪除');
            $table->timestamps();
        });

        Schema::create('product_sku', function (Blueprint $table) {
            $table->string('sku_oid')->comment('skuID : md5(item_oid+spec_code...)');
            $table->integer('wh_item_oid')->nullable()->comment('對應票倉 item id');
            $table->jsonb('spec')->comment('對應spec組合');
            $table->string('quotation_type')->comment('成本機制(NORMAL/COMMISSION)');
            $table->boolean('is_delete')->comment('是否刪除');
            $table->timestamps();

            $table->primary('sku_oid');
        });

        Schema::create('product_sku_price', function (Blueprint $table) {
            $table->string('sku_oid')->comment('skuID : md5(item_oid+spec_code...)');
            $table->string('timezone')->comment('時區');
            $table->integer('year')->comment('西元年');
            $table->integer('month')->comment('月份');
            $table->jsonb('selling_price')->comment('售價');
            $table->timestamps();

            $table->primary(['sku_oid', 'year', 'month'], 'pk');
        });

        Schema::create('product_sku_quotation', function (Blueprint $table) {
            $table->string('sku_oid')->comment('skuID : md5(item_oid+spec_code...)');
            $table->integer('year')->comment('西元年');
            $table->integer('month')->comment('月份');
            $table->string('timezone')->comment('時區');
            $table->string('currency')->comment('幣別');
            $table->decimal('base_cost', 10, 2)->comment('基礎成本');
            $table->integer('supplier_oid')->comment('供應商編號');
            $table->string('supplier_item_id')->comment('供應商貨號');
            $table->jsonb('quotation')->comment('成本');
            $table->float('commission_rate')->nullable()->comment('佣金率(如果是佣金制會有值)');
            $table->timestamps();

            $table->primary(['sku_oid', 'supplier_oid', 'year', 'month'], 'pk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_items');
        Schema::dropIfExists('product_spec');
        Schema::dropIfExists('product_sku');
        Schema::dropIfExists('product_sku_price');
        Schema::dropIfExists('product_sku_quotation');
    }
}
