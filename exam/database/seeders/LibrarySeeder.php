<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;

class LibrarySeeder extends Seeder
{
    // هنا يتم اضافة المؤلفين و انواع الكتب
    public function run(): void
    {
        Author::create([
            'name' => 'Naguib Mahfouz',
            'birth_year' => '1911',
        ]);

        Author::create([
            'name' => 'Ghassan Kanafani',
            'birth_year' => '1936',
        ]);

        Category::create([
            'name' => 'Novel',
        ]);

        Category::create([
            'name' => 'History',
        ]);

        Category::create([
            'name' => 'Education',
        ]);
    }
}
