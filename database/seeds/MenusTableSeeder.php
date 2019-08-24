<?php

use Illuminate\Database\Seeder;
use App\Menu;
use App\MenuItem;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Menu 
        $menu_id = DB::table('menus')->insertGetId([
            'title' => 'Tủ bếp',
            'type' => 1
        ]);

        // Insert menu items
        DB::table('menu_items')->insert([
            'menu_id' => $menu_id,
            'title' => 'Tủ bếp gỗ óc chó',
            'url' => '',
            'position' => 0
        ]);
        DB::table('menu_items')->insert([
            'menu_id' => $menu_id,
            'title' => 'Tủ bếp gỗ xoan đào',
            'url' => '',
            'position' => 1
        ]);
        DB::table('menu_items')->insert([
            'menu_id' => $menu_id,
            'title' => 'Liên hệ',
            'url' => '',
            'position' => 2
        ]);
        DB::table('menu_items')->insert([
            'menu_id' => $menu_id,
            'title' => 'About us',
            'url' => '',
            'position' => 3
        ]);
        DB::table('menu_items')->insert([
            'menu_id' => $menu_id,
            'title' => 'Giới thiệu',
            'url' => '',
            'position' => 4
        ]);
    }
}
