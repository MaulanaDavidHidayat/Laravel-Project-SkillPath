<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Skill;
use App\Models\UserProgress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgrammingSeeder extends Seeder
{
    public function run(): void
    {
        $skillNames = [
            'Programming Fundamentals',
            'Python',
            'JavaScript',
            'TypeScript',
            'Java',
            'C++',
            'C#',
            'OOP',
            'Data Structures',
            'Algorithms',
        ];

        $skillIds = Skill::whereIn('name', $skillNames)->pluck('id');

        if ($skillIds->isNotEmpty()) {
            $lessonIds = Lesson::whereIn('skill_id', $skillIds)->pluck('id');

            UserProgress::whereIn('lesson_id', $lessonIds)->delete();
            Lesson::whereIn('skill_id', $skillIds)->delete();
            Skill::whereIn('id', $skillIds)->delete();
        }

        $this->createSkill(
            'Programming Fundamentals',
            'Dasar berpikir dan bekerja sebagai programmer.',
            'programming.svg',
            [
                $this->lesson(
                    'Apa Itu Programming?',
                    'Memahami konsep dasar programming.',
                    '<h2>Apa Itu Programming?</h2><p>Programming adalah proses membuat instruksi agar komputer menjalankan tugas tertentu.</p><h3>Konsep utama</h3><p>Program terdiri dari logika, data, kondisi, perulangan, dan fungsi.</p><h3>Praktik</h3><p>Buat catatan sederhana berisi tiga contoh program yang kamu gunakan sehari-hari.</p><h3>Mini Challenge</h3><p>Jelaskan dengan bahasamu sendiri apa yang dimaksud programming.</p><h3>Kesimpulan</h3><p>Programming digunakan untuk memecahkan masalah menggunakan instruksi yang dapat dipahami komputer.</p>'
                ),
                $this->lesson(
                    'Algoritma',
                    'Memahami langkah logis untuk menyelesaikan masalah.',
                    '<h2>Algoritma</h2><p>Algoritma adalah urutan langkah yang sistematis untuk menyelesaikan masalah.</p><h3>Praktik</h3><p>Tulis algoritma membuat mie instan dalam beberapa langkah.</p><h3>Mini Challenge</h3><p>Buat algoritma untuk menentukan apakah sebuah angka adalah bilangan genap.</p><h3>Kesimpulan</h3><p>Algoritma membantu programmer berpikir secara terstruktur.</p>'
                ),
                $this->lesson(
                    'Variable',
                    'Memahami penyimpanan data dalam program.',
                    '<h2>Variable</h2><p>Variable digunakan untuk menyimpan data yang dapat digunakan kembali.</p><h3>Contoh</h3><pre><code>nama = "Maulana"
umur = 17</code></pre><h3>Praktik</h3><p>Buat variable untuk nama, umur, dan kota.</p><h3>Mini Challenge</h3><p>Buat variable yang menyimpan harga sebuah produk.</p><h3>Kesimpulan</h3><p>Variable menjadi dasar penyimpanan data dalam program.</p>'
                ),
                $this->lesson(
                    'Data Type',
                    'Mengenal jenis data dalam programming.',
                    '<h2>Data Type</h2><p>Data type menentukan jenis nilai yang digunakan program.</p><p>Contohnya String, Integer, Float, dan Boolean.</p><h3>Praktik</h3><p>Buat contoh setiap tipe data tersebut.</p><h3>Mini Challenge</h3><p>Tentukan tipe data untuk nama, umur, harga, dan status login.</p><h3>Kesimpulan</h3><p>Tipe data membantu program mengelola nilai dengan tepat.</p>'
                ),
                $this->lesson(
                    'Conditional',
                    'Memahami percabangan dalam program.',
                    '<h2>Conditional</h2><p>Conditional digunakan ketika program harus mengambil keputusan berdasarkan kondisi.</p><pre><code>if (nilai >= 75) {
    echo "Lulus";
} else {
    echo "Belum lulus";
}</code></pre><h3>Praktik</h3><p>Buat kondisi untuk menentukan kelulusan.</p><h3>Mini Challenge</h3><p>Buat percabangan untuk menentukan kategori nilai.</p><h3>Kesimpulan</h3><p>Percabangan memungkinkan program mengambil keputusan.</p>'
                ),
                $this->lesson(
                    'Looping',
                    'Memahami perulangan dalam programming.',
                    '<h2>Looping</h2><p>Looping digunakan untuk menjalankan instruksi berulang kali.</p><pre><code>for ($i = 1; $i <= 5; $i++) {
    echo $i;
}</code></pre><h3>Praktik</h3><p>Tampilkan angka 1 sampai 10.</p><h3>Mini Challenge</h3><p>Tampilkan angka genap dari 1 sampai 20.</p><h3>Kesimpulan</h3><p>Looping mengurangi kode yang ditulis berulang.</p>'
                ),
                $this->lesson(
                    'Function',
                    'Memahami fungsi untuk mengelompokkan kode.',
                    '<h2>Function</h2><p>Function adalah blok kode yang dibuat untuk tugas tertentu.</p><pre><code>function tambah($a, $b) {
    return $a + $b;
}</code></pre><h3>Praktik</h3><p>Buat function untuk menghitung luas persegi panjang.</p><h3>Mini Challenge</h3><p>Buat function untuk menentukan bilangan genap.</p><h3>Kesimpulan</h3><p>Function membuat kode lebih terstruktur dan dapat digunakan kembali.</p>'
                ),
                $this->lesson(
                    'Debugging Dasar',
                    'Belajar menemukan dan memperbaiki kesalahan kode.',
                    '<h2>Debugging</h2><p>Debugging adalah proses mencari penyebab program tidak berjalan sesuai harapan.</p><h3>Langkah</h3><ol><li>Baca pesan error.</li><li>Cari baris yang bermasalah.</li><li>Periksa nilai variable.</li><li>Perbaiki kode.</li><li>Jalankan kembali.</li></ol><h3>Mini Challenge</h3><p>Temukan kesalahan pada kode sederhana dan perbaiki.</p><h3>Kesimpulan</h3><p>Debugging adalah kemampuan penting bagi programmer.</p>'
                ),
            ]
        );

        $this->createSkill(
            'Python',
            'Belajar Python dari syntax dasar hingga mini project.',
            'python.svg',
            [
                $this->lesson('Mengenal Python', 'Memahami Python dan program pertama.', '<h2>Mengenal Python</h2><p>Python adalah bahasa pemrograman dengan syntax sederhana.</p><pre><code>print("Hello World")</code></pre><h3>Praktik</h3><p>Jalankan program pertama menggunakan Python.</p><h3>Mini Challenge</h3><p>Ubah output menjadi nama kamu.</p><h3>Kesimpulan</h3><p>Python cocok digunakan untuk berbagai kebutuhan programming.</p>'),
                $this->lesson('Variable Python', 'Menyimpan data menggunakan variable Python.', '<h2>Variable Python</h2><pre><code>nama = "Maulana"
umur = 17
aktif = True</code></pre><h3>Praktik</h3><p>Buat data profil sederhana.</p><h3>Mini Challenge</h3><p>Tampilkan semua data menggunakan print.</p><h3>Kesimpulan</h3><p>Variable menjadi dasar penyimpanan data.</p>'),
                $this->lesson('Operator Python', 'Menggunakan operator Python.', '<h2>Operator Python</h2><pre><code>a = 10
b = 3
print(a + b)
print(a > b)</code></pre><h3>Praktik</h3><p>Coba operator matematika dan perbandingan.</p><h3>Mini Challenge</h3><p>Hitung total harga tiga barang.</p><h3>Kesimpulan</h3><p>Operator digunakan untuk melakukan operasi terhadap data.</p>'),
                $this->lesson('Conditional Python', 'Membuat percabangan dengan Python.', '<h2>Conditional Python</h2><pre><code>nilai = 80

if nilai >= 75:
    print("Lulus")
else:
    print("Tidak lulus")</code></pre><h3>Praktik</h3><p>Ubah nilai dan lihat hasilnya.</p><h3>Mini Challenge</h3><p>Buat kategori nilai.</p><h3>Kesimpulan</h3><p>if digunakan untuk menentukan keputusan berdasarkan kondisi.</p>'),
                $this->lesson('Looping Python', 'Membuat perulangan menggunakan Python.', '<h2>Looping Python</h2><pre><code>for i in range(1, 6):
    print(i)</code></pre><h3>Praktik</h3><p>Tampilkan angka 1 sampai 20.</p><h3>Mini Challenge</h3><p>Tampilkan angka kelipatan 3.</p><h3>Kesimpulan</h3><p>Looping membantu menjalankan instruksi secara berulang.</p>'),
                $this->lesson('Function Python', 'Membuat function menggunakan Python.', '<h2>Function Python</h2><pre><code>def tambah(a, b):
    return a + b

print(tambah(5, 3))</code></pre><h3>Praktik</h3><p>Buat function luas persegi.</p><h3>Mini Challenge</h3><p>Buat function rata-rata.</p><h3>Kesimpulan</h3><p>Function membantu memecah program menjadi bagian kecil.</p>'),
                $this->lesson('List dan Dictionary', 'Mengelola kumpulan data Python.', '<h2>List dan Dictionary</h2><pre><code>buah = ["Apel", "Jeruk", "Mangga"]
user = {"nama": "Maulana", "umur": 17}</code></pre><h3>Praktik</h3><p>Tambahkan data baru.</p><h3>Mini Challenge</h3><p>Buat data tiga siswa.</p><h3>Kesimpulan</h3><p>List dan dictionary digunakan untuk mengelola data kompleks.</p>'),
                $this->lesson('Mini Project Python', 'Membuat project sederhana menggunakan Python.', '<h2>Mini Project Python</h2><p>Buat program daftar tugas menggunakan list, function, conditional, dan looping.</p><h3>Langkah</h3><ol><li>Buat list tugas.</li><li>Tampilkan tugas.</li><li>Tambahkan tugas.</li><li>Hapus tugas.</li><li>Tampilkan hasil.</li></ol><h3>Mini Challenge</h3><p>Tambahkan fitur pencarian.</p><h3>Kesimpulan</h3><p>Project membantu menggabungkan konsep Python.</p>'),
            ]
        );

        $this->createSkill(
            'JavaScript',
            'Membangun interaksi website menggunakan JavaScript.',
            'javascript.svg',
            $this->generateLessons('JavaScript', [
                'Mengenal JavaScript',
                'Variable dan Data Type',
                'Operator dan Conditional',
                'Looping',
                'Function',
                'Array dan Object',
                'DOM Manipulation',
                'Mini Project JavaScript',
            ])
        );

        $this->createSkill(
            'TypeScript',
            'Memahami JavaScript dengan sistem tipe TypeScript.',
            'typescript.svg',
            $this->generateLessons('TypeScript', [
                'Mengenal TypeScript',
                'Type Annotation',
                'Interface',
                'Function Type',
                'Array dan Object Type',
                'Mini Project TypeScript',
            ])
        );

        $this->createSkill(
            'Java',
            'Mempelajari dasar pemrograman menggunakan Java.',
            'java.svg',
            $this->generateLessons('Java', [
                'Mengenal Java',
                'Variable dan Data Type',
                'Operator',
                'Conditional',
                'Looping',
                'Function dan Method',
            ])
        );

        $this->createSkill(
            'C++',
            'Mempelajari dasar pemrograman menggunakan C++.',
            'cpp.svg',
            $this->generateLessons('C++', [
                'Mengenal C++',
                'Variable dan Data Type',
                'Input dan Output',
                'Conditional',
                'Looping',
                'Function',
            ])
        );

        $this->createSkill(
            'C#',
            'Mempelajari dasar pemrograman menggunakan C#.',
            'csharp.svg',
            $this->generateLessons('C#', [
                'Mengenal C#',
                'Variable dan Data Type',
                'Operator',
                'Conditional',
                'Looping',
                'Method',
            ])
        );

        $this->createSkill(
            'OOP',
            'Memahami Object Oriented Programming.',
            'oop.svg',
            $this->generateLessons('OOP', [
                'Konsep OOP',
                'Class dan Object',
                'Property dan Method',
                'Constructor',
                'Encapsulation',
                'Inheritance',
                'Polymorphism',
                'Mini Project OOP',
            ])
        );

        $this->createSkill(
            'Data Structures',
            'Memahami struktur data dan cara menggunakannya.',
            'data-structures.svg',
            $this->generateLessons('Data Structures', [
                'Mengenal Data Structure',
                'Array',
                'Linked List',
                'Stack',
                'Queue',
                'Tree',
                'Hash Table',
                'Mini Project Data Structure',
            ])
        );

        $this->createSkill(
            'Algorithms',
            'Mempelajari algoritma untuk menyelesaikan masalah secara efisien.',
            'algorithms.svg',
            $this->generateLessons('Algorithms', [
                'Mengenal Algoritma',
                'Searching',
                'Linear Search',
                'Binary Search',
                'Sorting',
                'Bubble Sort',
                'Selection Sort',
                'Mini Project Algorithms',
            ])
        );
    }

    private function createSkill(
        string $name,
        string $description,
        string $image,
        array $lessons
    ): void {
        $slug = match ($name) {
            'C++' => 'cpp',
            'C#' => 'csharp',
            default => Str::slug($name),
        };

        $skill = Skill::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'level' => 'SkillPath',
            'category' => 'Programming',
            'image' => $image,
        ]);

        foreach ($lessons as $index => $lesson) {
            Lesson::create([
                'skill_id' => $skill->id,
                'title' => $lesson['title'],
                'slug' => Str::slug($lesson['title']),
                'description' => $lesson['description'],
                'content' => $lesson['content'],
                'order' => $index + 1,
                'duration' => $lesson['duration'],
                'is_published' => true,
            ]);
        }
    }

    private function lesson(
        string $title,
        string $description,
        string $content,
        int $duration = 15
    ): array {
        return [
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'duration' => $duration,
        ];
    }

    private function generateLessons(string $skill, array $titles): array
    {
        return array_map(function (string $title): array {
            return $this->lesson(
                $title,
                "Mempelajari {$title} dalam materi pemrograman.",
                "<h2>{$title}</h2><p>Materi ini membahas konsep {$title} dan penerapannya dalam programming.</p><h3>Konsep utama</h3><p>Pahami konsep dasar, fungsi, dan cara penggunaannya sebelum masuk ke praktik.</p><h3>Praktik</h3><p>Buat contoh sederhana menggunakan materi yang sedang dipelajari.</p><h3>Mini Challenge</h3><p>Buat satu contoh program kecil yang menerapkan konsep {$title}.</p><h3>Kesimpulan</h3><p>Setelah menyelesaikan materi ini, kamu diharapkan memahami dasar {$title} dan mampu menerapkannya dalam program sederhana.</p>"
            );
        }, $titles);
    }
}