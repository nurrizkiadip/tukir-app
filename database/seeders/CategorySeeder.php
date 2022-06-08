<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Makanan',
            'Minuman',
            'Katering',
        ];

        foreach($categories as $category) {
            $categoryCreated = Category::create([
                'name' => $category
            ]);
            
            Menu::factory()->count(8)->create([
                'category_id' => $categoryCreated->id,
            ]);
        }
    }
}
