<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'parent_id' => null,
            'title' => 'Tủ bếp',
            'slug' => Str::random(10),
            'description' => 'Giải đáp tất cả những vấn đề khiến bạn lo lắng khi làm tủ bếp Tủ bếp Hpro – Đẹp và Khác 1. Những vấn đề bạn lo lắng khi làm tủ bếp Bạn lo lắng tủ bị pha tạp gỗ kém chất lượng',
            'content' => 'Giải đáp tất cả những vấn đề khiến bạn lo lắng khi làm tủ bếp Tủ bếp Hpro – Đẹp và Khác 1. Những vấn đề bạn lo lắng khi làm tủ bếp Bạn lo lắng tủ bị pha tạp gỗ kém chất lượng',
            'type' => 1,
            'position' => 1
        ]);

        DB::table('categories')->insert([
            'parent_id' => null,
            'title' => 'Phòng khách',
            'slug' => Str::random(10),
            'description' => 'Bạn đang phân vân không biết nên chọn phong cách thiết kế nào cho nội thất phòng khách nhà mình để vừa đảm bảo được thẩm mỹ lại vừa đảm bảo sự tiện nghi, thoải mái nhất cho các thành viên trong gia đình? Còn chần chờ gì nữa, hãy tham khảo ngay các mẫu thiết kế phòng khách đa dạng về chất liệu, kiểu dáng, công năng nhất từ Hpro. Chắc chắn bạn sẽ lựa chọn được mẫu thiết kế phù hợp nhất với phòng khách nhà mình. Hoặc bạn có thể xem thêm BỘ SƯU TẬP MẪU PHÒNG KHÁCH ĐẸP theo xu hướng thiết kế mới nhất hiện nay khi bấm vào ảnh dưới đây:',
            'content' => 'Bạn đang phân vân không biết nên chọn phong cách thiết kế nào cho nội thất phòng khách nhà mình để vừa đảm bảo được thẩm mỹ lại vừa đảm bảo sự tiện nghi, thoải mái nhất cho các thành viên trong gia đình? Còn chần chờ gì nữa, hãy tham khảo ngay các mẫu thiết kế phòng khách đa dạng về chất liệu, kiểu dáng, công năng nhất từ Hpro. Chắc chắn bạn sẽ lựa chọn được mẫu thiết kế phù hợp nhất với phòng khách nhà mình. Hoặc bạn có thể xem thêm BỘ SƯU TẬP MẪU PHÒNG KHÁCH ĐẸP theo xu hướng thiết kế mới nhất hiện nay khi bấm vào ảnh dưới đây:',
            'type' => 1,
            'position' => 2
        ]);

        DB::table('categories')->insert([
            'parent_id' => null,
            'title' => 'Phòng ngủ',
            'slug' => Str::random(10),
            'description' => 'Bạn đang phân vân không biết nên chọn phong cách thiết kế nào cho nội thất phòng khách nhà mình để vừa đảm bảo được thẩm mỹ lại vừa đảm bảo sự tiện nghi, thoải mái nhất cho các thành viên trong gia đình? Còn chần chờ gì nữa, hãy tham khảo ngay các mẫu thiết kế phòng khách đa dạng về chất liệu, kiểu dáng, công năng nhất từ Hpro. Chắc chắn bạn sẽ lựa chọn được mẫu thiết kế phù hợp nhất với phòng khách nhà mình. Hoặc bạn có thể xem thêm BỘ SƯU TẬP MẪU PHÒNG KHÁCH ĐẸP theo xu hướng thiết kế mới nhất hiện nay khi bấm vào ảnh dưới đây:',
            'content' => 'Bạn đang phân vân không biết nên chọn phong cách thiết kế nào cho nội thất phòng khách nhà mình để vừa đảm bảo được thẩm mỹ lại vừa đảm bảo sự tiện nghi, thoải mái nhất cho các thành viên trong gia đình? Còn chần chờ gì nữa, hãy tham khảo ngay các mẫu thiết kế phòng khách đa dạng về chất liệu, kiểu dáng, công năng nhất từ Hpro. Chắc chắn bạn sẽ lựa chọn được mẫu thiết kế phù hợp nhất với phòng khách nhà mình. Hoặc bạn có thể xem thêm BỘ SƯU TẬP MẪU PHÒNG KHÁCH ĐẸP theo xu hướng thiết kế mới nhất hiện nay khi bấm vào ảnh dưới đây:',
            'type' => 1,
            'position' => 3
        ]);
    }
}
