<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Framework PHP untuk membangun aplikasi web modern.',
                'level' => 'Beginner',
                'category' => 'Web Development',
                'lessons' => [
                    ['Mengenal Laravel', 'mengenal-laravel', 'Memahami apa itu Laravel dan kegunaannya.', 10],
                    ['Instalasi Laravel', 'instalasi-laravel', 'Mempelajari cara membuat project Laravel.', 15],
                    ['Routing Laravel', 'routing-laravel', 'Memahami routing pada Laravel.', 15],
                    ['Controller Laravel', 'controller-laravel', 'Memahami controller dan request.', 20],
                    ['Blade Template', 'blade-template', 'Mempelajari Blade untuk membuat tampilan Laravel.', 20],
                    ['Database & Eloquent', 'database-eloquent', 'Memahami penggunaan database dan Eloquent ORM.', 25],
                ],
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'description' => 'Bahasa pemrograman untuk membangun aplikasi web.',
                'level' => 'Beginner',
                'category' => 'Programming',
                'lessons' => [
                    ['Mengenal PHP', 'mengenal-php', 'Memahami dasar bahasa pemrograman PHP.', 10],
                    ['Sintaks Dasar PHP', 'sintaks-dasar-php', 'Mempelajari sintaks dasar PHP.', 15],
                    ['Variabel dan Tipe Data', 'variabel-dan-tipe-data', 'Memahami variabel dan tipe data PHP.', 20],
                    ['Percabangan PHP', 'percabangan-php', 'Mempelajari if, else, dan kondisi PHP.', 20],
                    ['Perulangan PHP', 'perulangan-php', 'Memahami for, while, dan foreach.', 20],
                    ['Function PHP', 'function-php', 'Memahami cara membuat dan menggunakan function.', 20],
                ],
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'description' => 'Bahasa pemrograman untuk membuat website menjadi interaktif.',
                'level' => 'Beginner',
                'category' => 'Programming',
                'lessons' => [
                    ['Mengenal JavaScript', 'mengenal-javascript', 'Memahami JavaScript dalam pengembangan web.', 10],
                    ['Variabel JavaScript', 'variabel-javascript', 'Mempelajari let, const, dan variabel.', 15],
                    ['Tipe Data JavaScript', 'tipe-data-javascript', 'Mengenal tipe data JavaScript.', 15],
                    ['Function JavaScript', 'function-javascript', 'Memahami function dalam JavaScript.', 20],
                    ['Conditional JavaScript', 'conditional-javascript', 'Mempelajari if, else, dan kondisi.', 20],
                    ['DOM JavaScript', 'dom-javascript', 'Memahami JavaScript dan DOM HTML.', 25],
                ],
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
                'description' => 'Bahasa pemrograman serbaguna yang mudah dipelajari.',
                'level' => 'Beginner',
                'category' => 'Programming',
                'lessons' => [
                    ['Mengenal Python', 'mengenal-python', 'Memahami dasar bahasa pemrograman Python.', 10],
                    ['Variabel Python', 'variabel-python', 'Mempelajari variabel dan tipe data Python.', 15],
                    ['Operator Python', 'operator-python', 'Mengenal operator dalam Python.', 15],
                    ['Percabangan Python', 'percabangan-python', 'Mempelajari if, elif, dan else.', 20],
                    ['Perulangan Python', 'perulangan-python', 'Memahami for dan while.', 20],
                    ['Function Python', 'function-python', 'Memahami function dalam Python.', 20],
                ],
            ],
            [
                'name' => 'React',
                'slug' => 'react',
                'description' => 'Library JavaScript untuk membangun antarmuka pengguna modern.',
                'level' => 'Beginner',
                'category' => 'Web Development',
                'lessons' => [
                    ['Mengenal React', 'mengenal-react', 'Memahami React dan konsep component.', 15],
                    ['Membuat Component', 'membuat-component-react', 'Mempelajari cara membuat component.', 20],
                    ['JSX React', 'jsx-react', 'Memahami JSX pada React.', 20],
                    ['Props React', 'props-react', 'Memahami props untuk mengirim data.', 20],
                    ['State React', 'state-react', 'Memahami state pada component.', 25],
                    ['Event React', 'event-react', 'Memahami event handling dalam React.', 20],
                ],
            ],
            [
                'name' => 'MySQL',
                'slug' => 'mysql',
                'description' => 'Database relasional untuk menyimpan dan mengelola data aplikasi.',
                'level' => 'Beginner',
                'category' => 'Database',
                'lessons' => [
                    ['Mengenal MySQL', 'mengenal-mysql', 'Memahami database dan MySQL.', 10],
                    ['Membuat Database', 'membuat-database', 'Mempelajari database dan table.', 15],
                    ['SELECT Query', 'select-query-mysql', 'Memahami cara mengambil data.', 20],
                    ['INSERT Query', 'insert-query-mysql', 'Memahami cara memasukkan data.', 15],
                    ['UPDATE dan DELETE', 'update-delete-mysql', 'Memahami cara mengubah dan menghapus data.', 20],
                    ['Relasi Database', 'relasi-database-mysql', 'Memahami primary key dan foreign key.', 25],
                ],
            ],
        ];

        foreach ($skills as $skillData) {
            $lessons = $skillData['lessons'];
            unset($skillData['lessons']);

            $skill = Skill::updateOrCreate(
                ['slug' => $skillData['slug']],
                $skillData
            );

            foreach ($lessons as $index => [$title, $slug, $description, $duration]) {
                Lesson::updateOrCreate(
                    [
                        'skill_id' => $skill->id,
                        'slug' => $slug,
                    ],
                    [
                        'title' => $title,
                        'description' => $description,
                        'content' => $description,
                        'order' => $index + 1,
                        'duration' => $duration,
                        'is_published' => true,
                    ]
                );
            }
        }
    }
}