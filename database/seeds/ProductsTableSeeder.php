<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Tủ bếp gỗ xoan đào Hoàng Anh Gia Lai TBXD309',
            'description' => 'Tủ bếp gỗ xoan đào Hoàng Anh Gia Lai TBXD309 sử dụng 100% vật liệu gỗ tự nhiên, thiết kế theo kiểu dáng chữ L tiết kiệm tối đa không gian phòng bếp, mang lại sự thông thoáng và tiện nghi',
            'content' => 'Tủ bếp gỗ xoan đào Hoàng Anh Gia Lai TBXD309 được sản xuất trên 1 dây chuyền, máy móc hiện đại, vật liệu 100% gỗ tự nhiên đem đến 1 bộ tủ bếp đảm bảo chất lượng, công năng và tính thẩm mỹ, là sự lựa chọn hàng đầu của các gia đình. Cùng khám phá chi tiết nhé!',
            'sku' => 'sku',
            'price' => '4800000',
            'images' => '',
            'publish' => 1,
            'views' => null,
            'slug' => '',
            'metatitle' => '',
            'metadescription' => ''
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Tủ bếp gỗ xoan đào Hoàng Anh TBXD100',
            'description' => 'Tủ bếp gỗ xoan đào hoàng anh TBXD100 được thiết kế trên dây chuyền hiện đại nhất có khả năng chống ẩm, chống thấm nước. Tủ bếp có kiểu dáng chữ L hiện đại, không gian sử dụng rộng rãi, thoáng đãng',
            'content' => 'Tủ bếp gỗ xoan đào hoàng anh TBXD100 được thiết kế trên dây chuyền hiện đại nhất có khả năng chống ẩm, chống thấm nước. Tủ bếp có kiểu dáng chữ L hiện đại, không gian sử dụng rộng rãi, thoáng đãng',
            'sku' => 'sku',
            'price' => '4800000',
            'images' => '',
            'publish' => 1,
            'views' => null,
            'slug' => '',
            'metatitle' => '',
            'metadescription' => ''
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Tủ bếp gỗ sồi Mỹ TBSM100',
            'description' => 'Tủ bếp gỗ sồi Mỹ TBSM100 được làm bằng chất liệu gỗ tự nhiên 100%, có độ cứng rất cao, vân gỗ đẹp màu sáng, có khả năng chịu nước tốt, hậu tủ Aluminium. Thiết kế tủ bếp hình chữ L rộng rãi, trẻ trung phong cách hiện tại. Thể hiện sự đẳng cấp của chủ nhà',
            'content' => 'Tủ bếp gỗ sồi Mỹ TBSM100 được làm bằng chất liệu gỗ tự nhiên 100%, có độ cứng rất cao, vân gỗ đẹp màu sáng, có khả năng chịu nước tốt, hậu tủ Aluminium. Thiết kế tủ bếp hình chữ L rộng rãi, trẻ trung phong cách hiện tại. Thể hiện sự đẳng cấp của chủ nhà',
            'sku' => 'sku',
            'price' => '4200000',
            'images' => '',
            'publish' => 1,
            'views' => null,
            'slug' => '',
            'metatitle' => '',
            'metadescription' => ''
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Tủ bếp gỗ sồi Mỹ TBSM240 nhỏ gọn tiện lợi với vẻ cổ điển',
            'description' => 'Tủ bếp gỗ sồi Mỹ TBSM240 được thiết kế nhỏ nhắn nhưng vẫn đầy đủ công năng, tủ bếp gỗ sồi Mỹ TBSM240 đem lại một không gian bếp thoáng đãng, tâm trạng thư thái cho người sử dụng.',
            'content' => 'Tủ bếp gỗ sồi Mỹ TBSM240 được thiết kế nhỏ nhắn nhưng vẫn đầy đủ công năng, tủ bếp gỗ sồi Mỹ TBSM240 đem lại một không gian bếp thoáng đãng, tâm trạng thư thái cho người sử dụng.',
            'sku' => 'sku',
            'price' => '4200000',
            'images' => '',
            'publish' => 1,
            'views' => null,
            'slug' => '',
            'metatitle' => '',
            'metadescription' => ''
        ]);


        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Tủ bếp gỗ Veneer TBVN50',
            'description' => 'Tủ bếp gỗ Veneer TBVN50 sử dụng cốt gỗ công nghiệp MDF lõi xanh và bề mặt phủ Veneer được bóc lát từ cây gỗ tự nhiên. Tủ bếp làm từ gỗ Veneer độ bền cao, không bị mối mọt, không cong vênh sau thời gian dài sử dụng.',
            'content' => 'Tủ bếp gỗ Veneer TBVN50 sử dụng cốt gỗ công nghiệp MDF lõi xanh và bề mặt phủ Veneer được bóc lát từ cây gỗ tự nhiên. Tủ bếp làm từ gỗ Veneer độ bền cao, không bị mối mọt, không cong vênh sau thời gian dài sử dụng.',
            'sku' => 'sku',
            'price' => '4200000',
            'images' => '',
            'publish' => 1,
            'views' => null,
            'slug' => '',
            'metatitle' => '',
            'metadescription' => ''
        ]);
    }
}
