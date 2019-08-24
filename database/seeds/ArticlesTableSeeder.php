<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'TẤT TẦN TẬT VỀ THIẾT KẾ BẾP CÔNG NGHIỆP BẠN CẦN BIẾT',
            'slug' => Str::random(10),
            'content' => 'Nếu đang có nhu cầu cho thiết kế bếp công nghiệp thì viết dưới đây sẽ giúp bạn có được những kiến thức có bản cũng như định hình được thế nào là bếp công nghiệp. Chúc bạn sớm có được 1 thiết kế như mong muốn! Tất tần tật về thiết kế bếp công nghiệp bạn cần biết 1. Bếp công nghiệp là gì? Nguyên tắc khi thiết kế bếp công nghiệp? Bếp công nghiệp có thể hiểu đơn giản là nơi chế biến thức ăn với số lượng lớn trong một khoản thời gian ngắn nhằm phục vụ cho nhiều người. Bếp công nghiệp được sử dụng ở nhà hàng, quán ăn, canteen tại xí nghiệp, trường học v…v.',
            'category_id' => 1,
            'description' => 'Nếu đang có nhu cầu cho thiết kế bếp công nghiệp thì viết dưới đây sẽ giúp bạn có được những kiến thức có bản cũng như định hình được thế nào là bếp công nghiệp. Chúc bạn sớm có được 1 thiết kế như mong muốn! Tất tần tật về thiết kế bếp công nghiệp bạn cần biết 1. Bếp công nghiệp là gì? Nguyên tắc khi thiết kế bếp công nghiệp? Bếp công nghiệp có thể hiểu đơn giản là nơi chế biến thức ăn với số lượng lớn trong một khoản thời gian ngắn nhằm phục vụ cho nhiều người. Bếp công nghiệp được sử dụng ở nhà hàng, quán ăn, canteen tại xí nghiệp, trường học v…v.',
            'publish' => 1,
            'views' => 0,
        ]);

        DB::table('articles')->insert([
            'title' => 'THIẾT KẾ KÍNH BẾP HỢP MỆNH – GIA CHỦ PHÁT TÀI',
            'slug' => Str::random(10),
            'content' => 'Kính bếp là phụ kiện không chỉ hoàn thiện công năng mà còn mang đến tính thẩm mỹ cao cho không gian bếp nhà bạn. Bài viết dưới đây giúp bạn lựa chọn thiết kế kính bếp vừa ưng ý lại có ý nghĩa phong thủy. Đừng bỏ lỡ nhé! Thiết kế kính bếp hợp mệnh – gia chủ phát tài 1. Thiết kế kính bếp cho gia chủ mệnh kim Thiết kế kính bếp cho gia chủ mệnh kim nên lựa chọn màu: – Màu vàng: Theo các nhà phong thủy, đây là màu phù hợp nhất với người mệnh Kim, mang lại may mắn, tài lộc, thịnh vượng. ',
            'description' => 'Kính bếp là phụ kiện không chỉ hoàn thiện công năng mà còn mang đến tính thẩm mỹ cao cho không gian bếp nhà bạn. Bài viết dưới đây giúp bạn lựa chọn thiết kế kính bếp vừa ưng ý lại có ý nghĩa phong thủy. Đừng bỏ lỡ nhé! Thiết kế kính bếp hợp mệnh – gia chủ phát tài 1. Thiết kế kính bếp cho gia chủ mệnh kim Thiết kế kính bếp cho gia chủ mệnh kim nên lựa chọn màu: – Màu vàng: Theo các nhà phong thủy, đây là màu phù hợp nhất với người mệnh Kim, mang lại may mắn, tài lộc, thịnh vượng. ',
            'category_id' => 1,
            'publish' => 1,
            'views' => 0,
        ]);

        DB::table('articles')->insert([
            'title' => ' Thiết kế bếp ăn tập thể đạt chuẩn bạn cần nắm được',
            'slug' => Str::random(10),
            'content' => 'Kính bếp là phụ kiện không chỉ hoàn thiện công năng mà còn mang đến tính thẩm mỹ cao cho không gian bếp nhà bạn. Bài viết dưới đây giúp bạn lựa chọn thiết kế kính bếp vừa ưng ý lại có ý nghĩa phong thủy. Đừng bỏ lỡ nhé! Thiết kế kính bếp hợp mệnh – gia chủ phát tài 1. Thiết kế kính bếp cho gia chủ mệnh kim Thiết kế kính bếp cho gia chủ mệnh kim nên lựa chọn màu: – Màu vàng: Theo các nhà phong thủy, đây là màu phù hợp nhất với người mệnh Kim, mang lại may mắn, tài lộc, thịnh vượng. ',
            'description' => 'Kính bếp là phụ kiện không chỉ hoàn thiện công năng mà còn mang đến tính thẩm mỹ cao cho không gian bếp nhà bạn. Bài viết dưới đây giúp bạn lựa chọn thiết kế kính bếp vừa ưng ý lại có ý nghĩa phong thủy. Đừng bỏ lỡ nhé! Thiết kế kính bếp hợp mệnh – gia chủ phát tài 1. Thiết kế kính bếp cho gia chủ mệnh kim Thiết kế kính bếp cho gia chủ mệnh kim nên lựa chọn màu: – Màu vàng: Theo các nhà phong thủy, đây là màu phù hợp nhất với người mệnh Kim, mang lại may mắn, tài lộc, thịnh vượng. ',
            'category_id' => 1,
            'publish' => 1,
            'views' => 0,
        ]);

        DB::table('articles')->insert([
            'title' => ' Thiết kế bếp trên tầng lửng – Nên hay không?',
            'slug' => Str::random(10),
            'content' => 'Xây thêm tầng lửng đang rất được ưa chuộng, nhằm mục dích tăng diện tích không gian. Đặc biệt là rất thích hợp cho xây dựng nhà…',
            'description' => 'Xây thêm tầng lửng đang rất được ưa chuộng, nhằm mục dích tăng diện tích không gian. Đặc biệt là rất thích hợp cho xây dựng nhà…',
            'category_id' => 1,
            'publish' => 1,
            'views' => 0,
        ]);

        DB::table('articles')->insert([
            'title' => 'Thiết kế bếp tủ lạnh chuẩn phong thủy đón tài lộc vào nhà',
            'slug' => Str::random(10),
            'content' => 'Cùng với chậu rửa, bếp nấu thì tủ lạnh là 1 trong 3 khu vực quan trọng nhất trong bếp. Cách sắp xếp, bố trí 3 khu…',
            'description' => 'Cùng với chậu rửa, bếp nấu thì tủ lạnh là 1 trong 3 khu vực quan trọng nhất trong bếp. Cách sắp xếp, bố trí 3 khu…',
            'category_id' => 1,
            'publish' => 1,
            'views' => 0,
        ]);
    }
}
