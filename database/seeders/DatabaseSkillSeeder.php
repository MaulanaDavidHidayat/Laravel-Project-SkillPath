<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSkillSeeder extends Seeder
{
    public function run(): void
    {
        Skill::where('name', 'Database')->delete();
        Skill::where('category', 'Database')->delete();

        $skills = [
            [
                'name' => 'Database Fundamentals',
                'description' => 'Memahami konsep dasar database, tabel, data, dan sistem pengelolaan database.',
                'image' => 'database-fundamentals.svg',
                'lessons' => [
                    ['Mengenal Database', 'Memahami pengertian database dan alasan database digunakan dalam aplikasi.'],
                    ['Database dan DBMS', 'Mengenal perbedaan database dengan DBMS serta contoh penggunaannya.'],
                    ['Tabel, Baris, dan Kolom', 'Memahami struktur dasar penyimpanan data dalam tabel.'],
                    ['Data Type', 'Mengenal tipe data yang digunakan untuk menyimpan berbagai jenis informasi.'],
                    ['Primary Key', 'Memahami fungsi identitas unik pada setiap data.'],
                    ['Relasi Antar Tabel', 'Memahami bagaimana tabel dapat saling berhubungan.'],
                    ['Database dalam Aplikasi', 'Memahami alur aplikasi ketika mengambil dan menyimpan data.'],
                    ['Mini Project Database', 'Membuat rancangan database sederhana untuk sebuah aplikasi.'],
                ],
            ],
            [
                'name' => 'SQL',
                'description' => 'Belajar bahasa SQL untuk membuat, membaca, mengubah, dan menghapus data.',
                'image' => 'sql.svg',
                'lessons' => [
                    ['Mengenal SQL', 'Memahami fungsi SQL dan penggunaannya dalam database.'],
                    ['SELECT', 'Mengambil data dari tabel menggunakan perintah SELECT.'],
                    ['WHERE', 'Menyaring data berdasarkan kondisi tertentu.'],
                    ['ORDER BY', 'Mengurutkan hasil query berdasarkan kolom tertentu.'],
                    ['INSERT', 'Menambahkan data baru ke dalam tabel.'],
                    ['UPDATE', 'Mengubah data yang sudah tersimpan.'],
                    ['DELETE', 'Menghapus data berdasarkan kondisi tertentu.'],
                    ['Aggregate Function', 'Menggunakan COUNT, SUM, AVG, MIN, dan MAX.'],
                    ['GROUP BY', 'Mengelompokkan data untuk menghasilkan informasi yang lebih terstruktur.'],
                    ['SQL Mini Project', 'Membuat kumpulan query SQL untuk sebuah database sederhana.'],
                ],
            ],
            [
                'name' => 'MySQL',
                'description' => 'Mempelajari MySQL sebagai salah satu database relasional yang banyak digunakan dalam pengembangan aplikasi.',
                'image' => 'mysql.svg',
                'lessons' => [
                    ['Mengenal MySQL', 'Memahami MySQL dan kegunaannya dalam aplikasi web.'],
                    ['Instalasi MySQL', 'Menyiapkan MySQL menggunakan XAMPP dan phpMyAdmin.'],
                    ['Membuat Database', 'Membuat database baru menggunakan SQL dan phpMyAdmin.'],
                    ['Membuat Tabel', 'Membuat tabel beserta kolom dan tipe datanya.'],
                    ['CRUD MySQL', 'Melakukan operasi Create, Read, Update, dan Delete.'],
                    ['Relasi MySQL', 'Menghubungkan beberapa tabel menggunakan foreign key.'],
                    ['MySQL dengan PHP', 'Menghubungkan aplikasi PHP dengan database MySQL.'],
                    ['MySQL Mini Project', 'Membangun database sederhana untuk aplikasi sekolah.'],
                ],
            ],
            [
                'name' => 'PostgreSQL',
                'description' => 'Mengenal PostgreSQL dan konsep penggunaannya untuk aplikasi modern.',
                'image' => 'postgresql.svg',
                'lessons' => [
                    ['Mengenal PostgreSQL', 'Memahami PostgreSQL dan karakteristiknya.'],
                    ['Instalasi PostgreSQL', 'Menyiapkan PostgreSQL untuk digunakan dalam project.'],
                    ['Database dan Schema', 'Memahami database dan schema pada PostgreSQL.'],
                    ['Table PostgreSQL', 'Membuat tabel dan menentukan struktur datanya.'],
                    ['Query Dasar PostgreSQL', 'Menggunakan SELECT, INSERT, UPDATE, dan DELETE.'],
                    ['Constraint PostgreSQL', 'Menggunakan primary key, foreign key, unique, dan not null.'],
                    ['PostgreSQL dalam Aplikasi', 'Memahami penggunaan PostgreSQL sebagai backend database.'],
                ],
            ],
            [
                'name' => 'SQLite',
                'description' => 'Mengenal database SQLite yang ringan dan praktis untuk aplikasi tertentu.',
                'image' => 'sqlite.svg',
                'lessons' => [
                    ['Mengenal SQLite', 'Memahami karakteristik SQLite dan penggunaannya.'],
                    ['File Database SQLite', 'Memahami bagaimana SQLite menyimpan database dalam sebuah file.'],
                    ['Membuat Tabel SQLite', 'Membuat struktur tabel menggunakan SQLite.'],
                    ['Query SQLite', 'Menjalankan query dasar untuk mengolah data.'],
                    ['SQLite dalam Laravel', 'Menggunakan SQLite sebagai database aplikasi Laravel.'],
                    ['SQLite Mini Project', 'Membuat database sederhana menggunakan SQLite.'],
                ],
            ],
            [
                'name' => 'MongoDB',
                'description' => 'Mengenal database NoSQL MongoDB dan konsep penyimpanan data berbentuk document.',
                'image' => 'mongodb.svg',
                'lessons' => [
                    ['Mengenal MongoDB', 'Memahami perbedaan database NoSQL dengan database relasional.'],
                    ['Collection dan Document', 'Memahami struktur data pada MongoDB.'],
                    ['Insert Document', 'Menambahkan document ke dalam collection.'],
                    ['Query MongoDB', 'Mencari dan mengambil document berdasarkan kondisi.'],
                    ['Update dan Delete', 'Mengubah dan menghapus document.'],
                    ['MongoDB Relationship', 'Memahami cara menangani hubungan antar data di MongoDB.'],
                    ['MongoDB Mini Project', 'Membuat rancangan database document untuk aplikasi sederhana.'],
                ],
            ],
            [
                'name' => 'Database Design',
                'description' => 'Belajar merancang struktur database yang rapi, efisien, dan sesuai kebutuhan aplikasi.',
                'image' => 'database-design.svg',
                'lessons' => [
                    ['Mengenal Database Design', 'Memahami proses merancang database sebelum implementasi.'],
                    ['Analisis Kebutuhan Data', 'Menentukan data apa saja yang dibutuhkan aplikasi.'],
                    ['Menentukan Entitas', 'Mengidentifikasi objek utama yang akan menjadi tabel.'],
                    ['Menentukan Atribut', 'Menentukan informasi yang disimpan pada setiap entitas.'],
                    ['Menentukan Primary Key', 'Menentukan identitas unik untuk setiap tabel.'],
                    ['Menentukan Relasi', 'Menentukan hubungan antar tabel.'],
                    ['Membuat Struktur Database', 'Mengubah rancangan menjadi struktur tabel.'],
                    ['Database Design Project', 'Membuat desain database dari studi kasus aplikasi.'],
                ],
            ],
            [
                'name' => 'ERD',
                'description' => 'Mempelajari Entity Relationship Diagram untuk merancang hubungan antar data.',
                'image' => 'erd.svg',
                'lessons' => [
                    ['Mengenal ERD', 'Memahami fungsi Entity Relationship Diagram.'],
                    ['Entity', 'Mengenali entity sebagai objek utama dalam database.'],
                    ['Attribute', 'Menentukan atribut yang dimiliki sebuah entity.'],
                    ['Relationship', 'Menggambarkan hubungan antar entity.'],
                    ['Cardinality', 'Memahami hubungan one-to-one, one-to-many, dan many-to-many.'],
                    ['Membuat ERD', 'Membuat diagram database berdasarkan studi kasus.'],
                    ['ERD ke Tabel', 'Mengubah ERD menjadi struktur database.'],
                ],
            ],
            [
                'name' => 'Primary & Foreign Key',
                'description' => 'Memahami primary key dan foreign key untuk menjaga hubungan antar data.',
                'image' => 'primary-foreign-key.svg',
                'lessons' => [
                    ['Mengenal Primary Key', 'Memahami fungsi primary key sebagai identitas unik.'],
                    ['Auto Increment', 'Memahami penggunaan ID otomatis pada tabel.'],
                    ['Mengenal Foreign Key', 'Memahami fungsi foreign key untuk menghubungkan tabel.'],
                    ['Membuat Foreign Key', 'Membuat foreign key pada database.'],
                    ['Referential Integrity', 'Memahami bagaimana database menjaga hubungan antar data.'],
                    ['Cascade Delete', 'Memahami efek penghapusan data yang memiliki relasi.'],
                    ['Primary Foreign Key Project', 'Membuat dua tabel yang saling berhubungan.'],
                ],
            ],
            [
                'name' => 'Relationships',
                'description' => 'Mempelajari berbagai jenis hubungan antar tabel dalam database.',
                'image' => 'relationships.svg',
                'lessons' => [
                    ['Mengenal Relationships', 'Memahami konsep hubungan antar tabel.'],
                    ['One to One', 'Membuat hubungan satu data dengan satu data lainnya.'],
                    ['One to Many', 'Membuat hubungan satu data dengan banyak data.'],
                    ['Many to Many', 'Memahami hubungan banyak data dengan banyak data.'],
                    ['Pivot Table', 'Memahami tabel perantara untuk relasi many-to-many.'],
                    ['Relationship dalam Laravel', 'Menggunakan relationship database melalui Eloquent.'],
                    ['Relationship Project', 'Membuat database dengan beberapa jenis hubungan.'],
                ],
            ],
            [
                'name' => 'Normalization',
                'description' => 'Mempelajari normalisasi database agar data lebih rapi dan mengurangi duplikasi.',
                'image' => 'normalization.svg',
                'lessons' => [
                    ['Mengenal Normalisasi', 'Memahami tujuan normalisasi database.'],
                    ['Masalah Data Duplikat', 'Mengenali masalah akibat penyimpanan data berulang.'],
                    ['First Normal Form', 'Memahami konsep 1NF.'],
                    ['Second Normal Form', 'Memahami konsep 2NF.'],
                    ['Third Normal Form', 'Memahami konsep 3NF.'],
                    ['Denormalisasi', 'Memahami kondisi ketika denormalisasi dapat digunakan.'],
                    ['Normalization Project', 'Merapikan database yang masih memiliki data berulang.'],
                ],
            ],
            [
                'name' => 'CRUD',
                'description' => 'Mempelajari operasi Create, Read, Update, dan Delete dalam database.',
                'image' => 'crud.svg',
                'lessons' => [
                    ['Konsep CRUD', 'Memahami empat operasi utama pengolahan data.'],
                    ['Create Data', 'Membuat proses penambahan data baru.'],
                    ['Read Data', 'Menampilkan data dari database.'],
                    ['Update Data', 'Mengubah data yang sudah tersimpan.'],
                    ['Delete Data', 'Menghapus data dari database.'],
                    ['CRUD dengan PHP', 'Membuat CRUD sederhana menggunakan PHP dan MySQL.'],
                    ['CRUD dengan Laravel', 'Membuat CRUD menggunakan Laravel dan Eloquent.'],
                    ['CRUD Mini Project', 'Membangun aplikasi CRUD sederhana dari awal.'],
                ],
            ],
            [
                'name' => 'JOIN',
                'description' => 'Mempelajari cara menggabungkan data dari beberapa tabel menggunakan SQL JOIN.',
                'image' => 'join.svg',
                'lessons' => [
                    ['Mengenal JOIN', 'Memahami alasan data dari beberapa tabel perlu digabungkan.'],
                    ['INNER JOIN', 'Menggabungkan data yang memiliki pasangan pada kedua tabel.'],
                    ['LEFT JOIN', 'Menampilkan seluruh data dari tabel kiri beserta pasangan datanya.'],
                    ['RIGHT JOIN', 'Memahami penggunaan RIGHT JOIN.'],
                    ['Multiple JOIN', 'Menggabungkan lebih dari dua tabel.'],
                    ['JOIN dengan Kondisi', 'Menggunakan WHERE dan kondisi lainnya bersama JOIN.'],
                    ['JOIN Project', 'Membuat laporan data menggunakan beberapa tabel.'],
                ],
            ],
            [
                'name' => 'Indexing',
                'description' => 'Memahami index database untuk membantu meningkatkan performa pencarian data.',
                'image' => 'indexing.svg',
                'lessons' => [
                    ['Mengenal Index', 'Memahami fungsi index pada database.'],
                    ['Cara Kerja Index', 'Memahami gambaran sederhana bagaimana index membantu pencarian.'],
                    ['Membuat Index', 'Membuat index pada kolom tertentu.'],
                    ['Unique Index', 'Memahami index yang digunakan untuk menjaga keunikan data.'],
                    ['Index dan Query', 'Memahami hubungan index dengan performa query.'],
                    ['Kapan Menggunakan Index', 'Menentukan kolom yang cocok untuk diberi index.'],
                    ['Indexing Project', 'Menganalisis kebutuhan index pada sebuah database.'],
                ],
            ],
            [
                'name' => 'Transactions',
                'description' => 'Mempelajari transaksi database untuk menjaga konsistensi data ketika beberapa operasi dilakukan bersama.',
                'image' => 'transactions.svg',
                'lessons' => [
                    ['Mengenal Transaction', 'Memahami konsep transaksi dalam database.'],
                    ['COMMIT', 'Memahami cara menyimpan perubahan transaksi.'],
                    ['ROLLBACK', 'Memahami cara membatalkan perubahan transaksi.'],
                    ['ACID', 'Mengenal Atomicity, Consistency, Isolation, dan Durability.'],
                    ['Transaction pada MySQL', 'Menggunakan transaksi dalam MySQL.'],
                    ['Transaction pada Laravel', 'Menggunakan DB::transaction dalam aplikasi Laravel.'],
                    ['Transaction Project', 'Membuat proses yang membutuhkan beberapa operasi database secara aman.'],
                ],
            ],
        ];

        foreach ($skills as $skillData) {
            $this->createSkill(
                $skillData['name'],
                $skillData['description'],
                $skillData['image'],
                $skillData['lessons']
            );
        }

        $this->command->info('Database SkillPath berhasil dibuat.');
    }

    private function createSkill(
        string $name,
        string $description,
        string $image,
        array $lessons
    ): void {
        $slug = Str::slug($name);

        $skill = Skill::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'level' => 'SkillPath',
            'category' => 'Database',
            'image' => $image,
        ]);

        foreach ($lessons as $index => [$title, $lessonDescription]) {
            $skill->lessons()->create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $lessonDescription,
                'content' => $this->content(
                    $name,
                    $title,
                    $lessonDescription
                ),
                'order' => $index + 1,
                'duration' => 15,
                'is_published' => true,
            ]);
        }
    }

    private function content(
        string $skill,
        string $title,
        string $description
    ): string {
        return <<<TEXT
# {$title}

## 📖 Materi
{$description}

Pada lesson ini kamu akan mempelajari konsep {$title} dalam skill {$skill}. Materi dimulai dari konsep dasar kemudian dilanjutkan dengan contoh penggunaan dan praktik sederhana.

## 💡 Konsep Utama
Pahami terlebih dahulu fungsi {$title}, kapan digunakan, dan bagaimana konsep tersebut berhubungan dengan database.

## 🛠️ Persiapan
1. Siapkan project latihan.
2. Siapkan database yang digunakan.
3. Pastikan koneksi database sudah berjalan.
4. Siapkan tabel dan data jika dibutuhkan.

## 💻 Praktik
1. Buka tools database yang digunakan.
2. Buat atau pilih database latihan.
3. Ikuti konsep yang dijelaskan pada lesson.
4. Jalankan query atau konfigurasi yang diperlukan.
5. Periksa hasilnya.
6. Ulangi dengan data berbeda agar konsep lebih mudah dipahami.
{!! \Illuminate\Support\Str::markdown($lesson->content) !!}
## 🔍 Checkpoint
Pastikan kamu sudah bisa menjelaskan fungsi {$title} dengan bahasa sendiri dan dapat menerapkannya pada database sederhana.

## 🎯 Mini Challenge
Buat contoh kecil menggunakan konsep {$title}. Gunakan studi kasus seperti data siswa, produk, kelas, atau katalog buku.

## ✅ Kesimpulan
Setelah menyelesaikan lesson ini, kamu diharapkan memahami {$title} dan mampu menggunakannya dalam project database sederhana.
TEXT;
    }
}