<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Skill;
use App\Models\UserProgress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skillIds = Skill::where('category', 'Web Development')->pluck('id');

        UserProgress::whereHas('lesson', function ($query) use ($skillIds) {
            $query->whereIn('skill_id', $skillIds);
        })->delete();

        Lesson::whereIn('skill_id', $skillIds)->delete();
        Skill::whereIn('id', $skillIds)->delete();

        $this->seedHTML();
        $this->seedCSS();
        $this->seedJavaScript();
        $this->seedReact();
        $this->seedPHP();
        $this->seedLaravel();
        $this->seedRESTAPI();
    }

    private function createSkill(string $name, string $description, string $image, array $lessons): void
    {
        $skill = Skill::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $description,
            'level' => 'SkillPath',
            'category' => 'Web Development',
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

    private function lesson(string $title, string $description, int $duration, string $content): array
    {
        return compact('title', 'description', 'duration', 'content');
    }

    private function seedHTML(): void
    {
        $this->createSkill('HTML', 'Membangun struktur halaman web yang semantik dan teratur.', 'html.svg', [
            $this->lesson('Mengenal HTML', 'Membuat halaman HTML pertama.', 30, <<<'HTML'
<h2>Mengenal HTML</h2><h3>Tujuan Pembelajaran</h3><p>Membuat halaman HTML pertama.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat folder belajar-html.</li><li>Buat index.html.</li><li>Tulis struktur HTML dasar.</li><li>Simpan lalu buka file di browser.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;&lt;meta charset="UTF-8"&gt;&lt;title&gt;Belajar HTML&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;&lt;h1&gt;Halo SkillPath&lt;/h1&gt;&lt;p&gt;Saya belajar HTML.&lt;/p&gt;&lt;/body&gt;
&lt;/html&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Halaman menampilkan heading dan paragraf.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan nama, kelas, dan tujuan belajar.</p><h3>Checkpoint</h3><ul><li>File terbuka di browser dan kamu memahami html, head, body.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Struktur Dokumen HTML', 'Menyusun metadata dan struktur semantik halaman.', 30, <<<'HTML'
<h2>Struktur Dokumen HTML</h2><h3>Tujuan Pembelajaran</h3><p>Menyusun metadata dan struktur semantik halaman.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Tambahkan meta charset.</li><li>Tambahkan viewport.</li><li>Buat header, main, dan footer.</li><li>Isi title halaman.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
&lt;header&gt;SkillPath&lt;/header&gt;
&lt;main&gt;Konten utama&lt;/main&gt;
&lt;footer&gt;2026&lt;/footer&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Halaman mempunyai struktur yang jelas.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat halaman profil dengan header, main, footer.</p><h3>Checkpoint</h3><ul><li>Metadata dan struktur semantik terpasang.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Heading, Paragraph & Text', 'Membuat hierarki konten teks.', 30, <<<'HTML'
<h2>Heading, Paragraph & Text</h2><h3>Tujuan Pembelajaran</h3><p>Membuat hierarki konten teks.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat satu h1.</li><li>Tambahkan dua h2.</li><li>Isi setiap bagian dengan p.</li><li>Gunakan strong dan em untuk penekanan.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;h1&gt;Belajar Web&lt;/h1&gt;
&lt;h2&gt;HTML&lt;/h2&gt;
&lt;p&gt;HTML menyusun struktur halaman.&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Konsisten&lt;/strong&gt; dan &lt;em&gt;bertahap&lt;/em&gt;.&lt;/p&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Hierarki teks terlihat jelas.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tulis artikel mini tentang web development.</p><h3>Checkpoint</h3><ul><li>Heading logis dan paragraf terbaca.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Link & Image', 'Menambahkan navigasi dan gambar dengan path yang benar.', 30, <<<'HTML'
<h2>Link & Image</h2><h3>Tujuan Pembelajaran</h3><p>Menambahkan navigasi dan gambar dengan path yang benar.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat folder images.</li><li>Masukkan satu gambar.</li><li>Tambahkan link internal.</li><li>Tambahkan link eksternal dengan target yang aman.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;a href="about.html"&gt;Tentang&lt;/a&gt;
&lt;img src="images/profil.jpg" alt="Foto profil"&gt;
&lt;a href="https://developer.mozilla.org/" target="_blank" rel="noopener"&gt;MDN&lt;/a&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Link dapat diklik dan gambar tampil.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat kartu profil dengan foto dan link kontak.</p><h3>Checkpoint</h3><ul><li>Link, path gambar, dan alt bekerja.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('List & Table', 'Menyajikan daftar dan data tabular.', 30, <<<'HTML'
<h2>List & Table</h2><h3>Tujuan Pembelajaran</h3><p>Menyajikan daftar dan data tabular.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat ul untuk daftar skill.</li><li>Buat ol untuk langkah belajar.</li><li>Buat table dengan thead dan tbody.</li><li>Isi jadwal belajar.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;ul&gt;&lt;li&gt;HTML&lt;/li&gt;&lt;li&gt;CSS&lt;/li&gt;&lt;li&gt;JavaScript&lt;/li&gt;&lt;/ul&gt;
&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th&gt;Hari&lt;/th&gt;&lt;th&gt;Materi&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;Senin&lt;/td&gt;&lt;td&gt;HTML&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Daftar dan tabel tampil terstruktur.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat jadwal belajar tujuh hari.</p><h3>Checkpoint</h3><ul><li>List dan tabel mempunyai struktur benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Form HTML', 'Membuat form input yang siap dikirim.', 30, <<<'HTML'
<h2>Form HTML</h2><h3>Tujuan Pembelajaran</h3><p>Membuat form input yang siap dikirim.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat form.</li><li>Tambahkan label dan input nama.</li><li>Tambahkan email dan select skill.</li><li>Tambahkan tombol submit.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;form&gt;
&lt;label for="name"&gt;Nama&lt;/label&gt;
&lt;input id="name" name="name" required&gt;
&lt;label for="email"&gt;Email&lt;/label&gt;
&lt;input id="email" name="email" type="email" required&gt;
&lt;select name="skill"&gt;&lt;option&gt;HTML&lt;/option&gt;&lt;/select&gt;
&lt;button type="submit"&gt;Daftar&lt;/button&gt;
&lt;/form&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Browser melakukan validasi input wajib.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan nomor telepon dan textarea alasan belajar.</p><h3>Checkpoint</h3><ul><li>Semua field memiliki label dan form dapat diuji.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

    private function seedCSS(): void
    {
        $this->createSkill('CSS', 'Mengatur tampilan, layout, dan responsive design.', 'css.svg', [
            $this->lesson('Mengenal CSS', 'Menghubungkan stylesheet dan mengubah tampilan dasar.', 30, <<<'HTML'
<h2>Mengenal CSS</h2><h3>Tujuan Pembelajaran</h3><p>Menghubungkan stylesheet dan mengubah tampilan dasar.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat style.css.</li><li>Hubungkan dengan link stylesheet.</li><li>Atur font body.</li><li>Ubah warna heading.</li></ol><h3>Contoh Kode</h3><pre><code>body { font-family: Arial, sans-serif; }
h1 { color: #5144c7; }</code></pre><h3>Hasil yang Diharapkan</h3><p>Tampilan halaman berubah tanpa mengubah HTML.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Ubah warna dan ukuran heading.</p><h3>Checkpoint</h3><ul><li>CSS berhasil terhubung.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Selector & Property', 'Menggunakan selector elemen, class, dan id.', 30, <<<'HTML'
<h2>Selector & Property</h2><h3>Tujuan Pembelajaran</h3><p>Menggunakan selector elemen, class, dan id.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat tiga selector.</li><li>Gunakan class pada beberapa card.</li><li>Gunakan id pada satu heading.</li><li>Uji perubahan di browser;</li></ol><h3>Contoh Kode</h3><pre><code>p { line-height: 1.7; }
.card { padding: 20px; }
#hero-title { font-size: 40px; }</code></pre><h3>Hasil yang Diharapkan</h3><p>Selector menerapkan style pada target yang benar.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat tiga card dengan satu class.</p><h3>Checkpoint</h3><ul><li>Paham perbedaan selector dan property.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Box Model', 'Mengatur content, padding, border, margin, dan ukuran.', 30, <<<'HTML'
<h2>Box Model</h2><h3>Tujuan Pembelajaran</h3><p>Mengatur content, padding, border, margin, dan ukuran.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat card.</li><li>Atur width.</li><li>Tambahkan padding dan border.</li><li>Atur margin dan box-sizing.</li></ol><h3>Contoh Kode</h3><pre><code> .card { width: 320px; padding: 24px; border: 1px solid #ddd; margin: 20px; box-sizing: border-box; }</code></pre><h3>Hasil yang Diharapkan</h3><p>Ukuran card stabil dan tidak melebar tak terduga.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat kartu profil 320px.</p><h3>Checkpoint</h3><ul><li>Bisa menjelaskan empat bagian box model.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Flexbox', 'Menyusun elemen satu dimensi dengan Flexbox.', 30, <<<'HTML'
<h2>Flexbox</h2><h3>Tujuan Pembelajaran</h3><p>Menyusun elemen satu dimensi dengan Flexbox.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat navbar.</li><li>Aktifkan display flex.</li><li>Atur align-items.</li><li>Atur justify-content dan gap.</li></ol><h3>Contoh Kode</h3><pre><code>.navbar { display:flex; align-items:center; justify-content:space-between; gap:20px; }</code></pre><h3>Hasil yang Diharapkan</h3><p>Logo dan menu tersusun rapi.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat tiga kartu sejajar dengan gap.</p><h3>Checkpoint</h3><ul><li>Elemen fleksibel dan jaraknya konsisten.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Grid', 'Membuat katalog dua dimensi dengan CSS Grid.', 30, <<<'HTML'
<h2>Grid</h2><h3>Tujuan Pembelajaran</h3><p>Membuat katalog dua dimensi dengan CSS Grid.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat container grid.</li><li>Gunakan tiga kolom.</li><li>Tambahkan enam card.</li><li>Atur gap.</li></ol><h3>Contoh Kode</h3><pre><code>.grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }</code></pre><h3>Hasil yang Diharapkan</h3><p>Enam card tersusun tiga kolom.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat katalog skill.</p><h3>Checkpoint</h3><ul><li>Memahami kolom, baris, dan gap.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Responsive Design', 'Membuat layout nyaman di desktop dan mobile.', 30, <<<'HTML'
<h2>Responsive Design</h2><h3>Tujuan Pembelajaran</h3><p>Membuat layout nyaman di desktop dan mobile.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Pastikan viewport meta ada.</li><li>Buat grid desktop.</li><li>Tambahkan media query 768px.</li><li>Uji dengan DevTools device mode.</li></ol><h3>Contoh Kode</h3><pre><code>.grid { display:grid; grid-template-columns:repeat(3,1fr); }
@media (max-width:768px) { .grid { grid-template-columns:1fr; } }</code></pre><h3>Hasil yang Diharapkan</h3><p>Layout menjadi satu kolom di mobile.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Pastikan tidak ada horizontal scroll.</p><h3>Checkpoint</h3><ul><li>Desktop dan mobile sama-sama nyaman.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

    private function seedJavaScript(): void
    {
        $this->createSkill('JavaScript', 'Membuat halaman web interaktif dengan JavaScript.', 'javascript.svg', [
            $this->lesson('Mengenal JavaScript', 'Menjalankan JavaScript di browser.', 30, <<<'HTML'
<h2>Mengenal JavaScript</h2><h3>Tujuan Pembelajaran</h3><p>Menjalankan JavaScript di browser.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat script.js.</li><li>Hubungkan dengan script tag.</li><li>Tulis console.log.</li><li>Buka DevTools Console.</li></ol><h3>Contoh Kode</h3><pre><code>console.log("SkillPath JavaScript aktif");</code></pre><h3>Hasil yang Diharapkan</h3><p>Pesan muncul di Console.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat tiga pesan tentang target belajar.</p><h3>Checkpoint</h3><ul><li>File JS terhubung dan dapat dieksekusi.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Variabel & Tipe Data', 'Menyimpan string, number, dan boolean.', 30, <<<'HTML'
<h2>Variabel & Tipe Data</h2><h3>Tujuan Pembelajaran</h3><p>Menyimpan string, number, dan boolean.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat const name.</li><li>Buat let age.</li><li>Buat boolean isStudent.</li><li>Cetak semua nilai.</li></ol><h3>Contoh Kode</h3><pre><code>const name = "Maulana";
let age = 16;
const isStudent = true;
console.log(name, age, isStudent);</code></pre><h3>Hasil yang Diharapkan</h3><p>Data profil tampil di Console.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan data skill dan status selesai.</p><h3>Checkpoint</h3><ul><li>Paham const, let, string, number, boolean.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Operator', 'Menghitung progres dan membandingkan nilai.', 30, <<<'HTML'
<h2>Operator</h2><h3>Tujuan Pembelajaran</h3><p>Menghitung progres dan membandingkan nilai.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat completed dan total.</li><li>Hitung persentase.</li><li>Bandingkan dengan target.</li><li>Cetak hasil.</li></ol><h3>Contoh Kode</h3><pre><code>const completed=4; const total=10;
const progress=(completed/total)*100;
console.log(progress);</code></pre><h3>Hasil yang Diharapkan</h3><p>Progress menghasilkan 40.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat pengecekan apakah progress minimal 80%.</p><h3>Checkpoint</h3><ul><li>Operasi aritmatika dan perbandingan benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Conditional', 'Membuat keputusan dengan if, else if, dan else.', 30, <<<'HTML'
<h2>Conditional</h2><h3>Tujuan Pembelajaran</h3><p>Membuat keputusan dengan if, else if, dan else.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat progress.</li><li>Cek 100 persen.</li><li>Cek minimal 50 persen.</li><li>Buat kondisi default.</li></ol><h3>Contoh Kode</h3><pre><code>const progress=75;
if(progress&gt;=100){console.log("Selesai");}
else if(progress&gt;=50){console.log("Berjalan");}
else{console.log("Baru mulai");}</code></pre><h3>Hasil yang Diharapkan</h3><p>Output status sesuai nilai.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat sistem status nilai lulus.</p><h3>Checkpoint</h3><ul><li>Semua cabang diuji.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Looping', 'Mengulang array skill tanpa kode berulang.', 30, <<<'HTML'
<h2>Looping</h2><h3>Tujuan Pembelajaran</h3><p>Mengulang array skill tanpa kode berulang.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat array.</li><li>Gunakan for.</li><li>Gunakan length.</li><li>Cetak setiap item.</li></ol><h3>Contoh Kode</h3><pre><code>const skills=["HTML","CSS","JavaScript","React"];
for(const skill of skills){ console.log(skill); }</code></pre><h3>Hasil yang Diharapkan</h3><p>Semua skill tampil.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan lima skill lain.</p><h3>Checkpoint</h3><ul><li>Loop mengunjungi setiap item.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Function', 'Membuat fungsi reusable dengan parameter dan return.', 30, <<<'HTML'
<h2>Function</h2><h3>Tujuan Pembelajaran</h3><p>Membuat fungsi reusable dengan parameter dan return.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat function.</li><li>Tambahkan completed dan total.</li><li>Validasi total nol.</li><li>Return persentase.</li></ol><h3>Contoh Kode</h3><pre><code>function calculateProgress(completed,total){ if(total===0)return 0; return Math.round((completed/total)*100); }
console.log(calculateProgress(4,10));</code></pre><h3>Hasil yang Diharapkan</h3><p>Function menghasilkan 40.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat function penentu status lulus.</p><h3>Checkpoint</h3><ul><li>Function dapat dipakai berkali-kali.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

    private function seedReact(): void
    {
        $this->createSkill('React', 'Membangun UI component-based menggunakan React.', 'react.svg', [
            $this->lesson('Mengenal React', 'Membuat project React menggunakan Vite.', 30, <<<'HTML'
<h2>Mengenal React</h2><h3>Tujuan Pembelajaran</h3><p>Membuat project React menggunakan Vite.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Pastikan Node.js tersedia.</li><li>Buat project Vite React.</li><li>Masuk folder project.</li><li>Install dependency dan jalankan dev server.</li></ol><h3>Contoh Kode</h3><pre><code>npm create vite@latest skillpath-react -- --template react
cd skillpath-react
npm install
npm run dev</code></pre><h3>Hasil yang Diharapkan</h3><p>Aplikasi React terbuka di browser.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Ganti heading halaman awal.</p><h3>Checkpoint</h3><ul><li>Project dan dev server berhasil.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Component', 'Memecah UI menjadi component reusable.', 30, <<<'HTML'
<h2>Component</h2><h3>Tujuan Pembelajaran</h3><p>Memecah UI menjadi component reusable.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat folder components.</li><li>Buat SkillCard.jsx.</li><li>Export component.</li><li>Import di App.jsx.</li></ol><h3>Contoh Kode</h3><pre><code>function SkillCard(){ return &lt;article&gt;&lt;h2&gt;HTML&lt;/h2&gt;&lt;p&gt;6 lessons&lt;/p&gt;&lt;/article&gt;; }
export default SkillCard;</code></pre><h3>Hasil yang Diharapkan</h3><p>Card muncul dari component terpisah.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat ProgressCard.</p><h3>Checkpoint</h3><ul><li>Import/export component benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('JSX', 'Menampilkan data JavaScript di dalam JSX.', 30, <<<'HTML'
<h2>JSX</h2><h3>Tujuan Pembelajaran</h3><p>Menampilkan data JavaScript di dalam JSX.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat variable name.</li><li>Buat jumlah lesson.</li><li>Gunakan kurung kurawal.</li><li>Render satu root element.</li></ol><h3>Contoh Kode</h3><pre><code>const name="SkillPath";
const lessons=51;
return &lt;main&gt;&lt;h1&gt;{name}&lt;/h1&gt;&lt;p&gt;{lessons} lessons&lt;/p&gt;&lt;/main&gt;;</code></pre><h3>Hasil yang Diharapkan</h3><p>Data tampil di UI.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tampilkan nama user dan progress.</p><h3>Checkpoint</h3><ul><li>Memahami expression JSX.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Props', 'Mengirim data dari parent ke child component.', 30, <<<'HTML'
<h2>Props</h2><h3>Tujuan Pembelajaran</h3><p>Mengirim data dari parent ke child component.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Tambahkan parameter props.</li><li>Kirim name dan lessons.</li><li>Render props.</li><li>Buat dua card berbeda.</li></ol><h3>Contoh Kode</h3><pre><code>function SkillCard({name,lessons}){ return &lt;article&gt;&lt;h2&gt;{name}&lt;/h2&gt;&lt;p&gt;{lessons} lessons&lt;/p&gt;&lt;/article&gt;; }
&lt;SkillCard name="HTML" lessons={6}/&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Satu component menampilkan data berbeda.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan prop category.</p><h3>Checkpoint</h3><ul><li>Props mengalir parent ke child.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('State', 'Menyimpan data UI yang berubah.', 30, <<<'HTML'
<h2>State</h2><h3>Tujuan Pembelajaran</h3><p>Menyimpan data UI yang berubah.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Import useState.</li><li>Buat completed state.</li><li>Tampilkan state.</li><li>Update dengan setter.</li></ol><h3>Contoh Kode</h3><pre><code>const [completed,setCompleted]=useState(0);
&lt;button onClick={()=&gt;setCompleted(completed+1)}&gt;Selesai&lt;/button&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Angka berubah ketika tombol diklik.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan tombol reset.</p><h3>Checkpoint</h3><ul><li>State memicu render ulang.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Event Handling', 'Menangani input dan submit form.', 30, <<<'HTML'
<h2>Event Handling</h2><h3>Tujuan Pembelajaran</h3><p>Menangani input dan submit form.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat state name.</li><li>Gunakan onChange.</li><li>Buat handleSubmit.</li><li>Cegah reload dengan preventDefault.</li></ol><h3>Contoh Kode</h3><pre><code>function handleSubmit(event){ event.preventDefault(); alert(`Halo ${name}`); }
&lt;input value={name} onChange={e=&gt;setName(e.target.value)}/&gt;</code></pre><h3>Hasil yang Diharapkan</h3><p>Form menerima input dan submit ditangani React.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tampilkan nama di halaman tanpa alert.</p><h3>Checkpoint</h3><ul><li>Event bekerja dan halaman tidak reload.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

    private function seedPHP(): void
    {
        $this->createSkill('PHP', 'Mempelajari PHP server-side untuk aplikasi web dinamis.', 'php.svg', [
            $this->lesson('Mengenal PHP', 'Menjalankan script PHP melalui XAMPP Apache.', 30, <<<'HTML'
<h2>Mengenal PHP</h2><h3>Tujuan Pembelajaran</h3><p>Menjalankan script PHP melalui XAMPP Apache.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Aktifkan Apache.</li><li>Buat folder di htdocs.</li><li>Buat index.php.</li><li>Buka localhost.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;?php
echo "Halo SkillPath!";</code></pre><h3>Hasil yang Diharapkan</h3><p>PHP diproses server dan output tampil.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tampilkan nama dan cita-cita.</p><h3>Checkpoint</h3><ul><li>Apache aktif dan PHP berjalan.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Syntax & Variabel', 'Membuat variabel PHP dan menampilkan nilainya.', 30, <<<'HTML'
<h2>Syntax & Variabel</h2><h3>Tujuan Pembelajaran</h3><p>Membuat variabel PHP dan menampilkan nilainya.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat variable name.</li><li>Buat variable skill.</li><li>Gunakan echo.</li><li>Gabungkan string.</li></ol><h3>Contoh Kode</h3><pre><code>&lt;?php
$name="Maulana";
$skill="Laravel";
echo "Nama: ".$name."&lt;br&gt;Skill: ".$skill;</code></pre><h3>Hasil yang Diharapkan</h3><p>Data tampil di browser.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan kelas dan sekolah.</p><h3>Checkpoint</h3><ul><li>Variabel dan echo benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Tipe Data & Operator', 'Mengolah angka untuk perhitungan progres.', 30, <<<'HTML'
<h2>Tipe Data & Operator</h2><h3>Tujuan Pembelajaran</h3><p>Mengolah angka untuk perhitungan progres.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat completed.</li><li>Buat total.</li><li>Hitung persentase.</li><li>Tampilkan hasil.</li></ol><h3>Contoh Kode</h3><pre><code>$completed=4; $total=10; $progress=($completed/$total)*100;
echo $progress."%";</code></pre><h3>Hasil yang Diharapkan</h3><p>Output progress benar.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Hitung rata-rata tiga nilai.</p><h3>Checkpoint</h3><ul><li>Operator dan hasil perhitungan benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Conditional', 'Membuat keputusan menggunakan if/elseif/else.', 30, <<<'HTML'
<h2>Conditional</h2><h3>Tujuan Pembelajaran</h3><p>Membuat keputusan menggunakan if/elseif/else.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat nilai.</li><li>Tentukan kondisi tertinggi.</li><li>Tambahkan kondisi kedua.</li><li>Buat else.</li></ol><h3>Contoh Kode</h3><pre><code>$progress=80;
if($progress&gt;=100){echo "Selesai";}elseif($progress&gt;=50){echo "Berjalan";}else{echo "Mulai";}</code></pre><h3>Hasil yang Diharapkan</h3><p>Status sesuai progress.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat status nilai A/B/C.</p><h3>Checkpoint</h3><ul><li>Setiap kondisi diuji.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Looping', 'Mengolah array dengan foreach.', 30, <<<'HTML'
<h2>Looping</h2><h3>Tujuan Pembelajaran</h3><p>Mengolah array dengan foreach.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat array skill.</li><li>Gunakan foreach.</li><li>Cetak setiap item.</li><li>Tambahkan data baru.</li></ol><h3>Contoh Kode</h3><pre><code>$skills=["HTML","CSS","JavaScript","Laravel"];
foreach($skills as $skill){ echo "&lt;p&gt;$skill&lt;/p&gt;"; }</code></pre><h3>Hasil yang Diharapkan</h3><p>Semua skill tampil tanpa menulis echo berulang.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat daftar sepuluh lesson.</p><h3>Checkpoint</h3><ul><li>Loop berjalan untuk semua data.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Function', 'Membuat function PHP dengan parameter dan return.', 30, <<<'HTML'
<h2>Function</h2><h3>Tujuan Pembelajaran</h3><p>Membuat function PHP dengan parameter dan return.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat function calculateProgress.</li><li>Validasi total nol.</li><li>Return hasil.</li><li>Panggil function.</li></ol><h3>Contoh Kode</h3><pre><code>function calculateProgress(int $completed,int $total): int { if($total===0)return 0; return (int)round(($completed/$total)*100); }
echo calculateProgress(4,10);</code></pre><h3>Hasil yang Diharapkan</h3><p>Function menghasilkan 40.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat function penentu kelulusan.</p><h3>Checkpoint</h3><ul><li>Parameter dan return dipahami.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

    private function seedLaravel(): void
    {
        $this->createSkill('Laravel', 'Membangun aplikasi Laravel dari routing sampai final project.', 'laravel.svg', [
            $this->lesson('Laravel & MVC', 'Memahami alur request Laravel dan pola MVC.', 30, <<<'HTML'
<h2>Laravel & MVC</h2><h3>Tujuan Pembelajaran</h3><p>Memahami alur request Laravel dan pola MVC.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Jalankan php artisan serve.</li><li>Buka routes/web.php.</li><li>Buat route sederhana.</li><li>Akses route dari browser.</li></ol><h3>Contoh Kode</h3><pre><code>Route::get('/hello', function () { return 'Halo Laravel'; });</code></pre><h3>Hasil yang Diharapkan</h3><p>Browser menampilkan response route.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat route /belajar.</p><h3>Checkpoint</h3><ul><li>Paham alur Browser → Route → Controller → Model → View.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Instalasi & Struktur Project', 'Mengenal Composer, Artisan, folder project, dan .env.', 30, <<<'HTML'
<h2>Instalasi & Struktur Project</h2><h3>Tujuan Pembelajaran</h3><p>Mengenal Composer, Artisan, folder project, dan .env.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Pastikan PHP dan Composer.</li><li>Buat project Laravel.</li><li>Masuk folder.</li><li>Jalankan server.</li></ol><h3>Contoh Kode</h3><pre><code>composer create-project laravel/laravel skillpath
cd skillpath
php artisan serve</code></pre><h3>Hasil yang Diharapkan</h3><p>Project berjalan dan struktur folder dapat ditemukan.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Cari routes, app, resources/views, database, public.</p><h3>Checkpoint</h3><ul><li>Dapat menjelaskan fungsi folder utama.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Routing', 'Membuat named route, parameter, dan model binding.', 30, <<<'HTML'
<h2>Routing</h2><h3>Tujuan Pembelajaran</h3><p>Membuat named route, parameter, dan model binding.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat route skills.</li><li>Beri nama route.</li><li>Tambahkan parameter slug.</li><li>Gunakan route() di Blade.</li></ol><h3>Contoh Kode</h3><pre><code>Route::get('/skills/{skill:slug}', [SkillController::class, 'show'])-&gt;name('skills.show');</code></pre><h3>Hasil yang Diharapkan</h3><p>URL detail dapat dibuka.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat route lesson berdasarkan slug.</p><h3>Checkpoint</h3><ul><li>Parameter dan named route bekerja.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Controller', 'Memindahkan logic dari route ke controller dan mengirim data ke view.', 30, <<<'HTML'
<h2>Controller</h2><h3>Tujuan Pembelajaran</h3><p>Memindahkan logic dari route ke controller dan mengirim data ke view.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat controller.</li><li>Buat method index.</li><li>Siapkan data.</li><li>Return view.</li></ol><h3>Contoh Kode</h3><pre><code>php artisan make:controller SkillController
public function index(){ $skills=Skill::latest()-&gt;get(); return view("skills.index",compact("skills")); }</code></pre><h3>Hasil yang Diharapkan</h3><p>Blade menerima data skill.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat method show untuk satu skill.</p><h3>Checkpoint</h3><ul><li>Controller terhubung route dan view.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Blade Template', 'Membuat layout, loop, condition, dan component Blade.', 30, <<<'HTML'
<h2>Blade Template</h2><h3>Tujuan Pembelajaran</h3><p>Membuat layout, loop, condition, dan component Blade.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat layout.</li><li>Gunakan extends dan section.</li><li>Loop data.</li><li>Buat component card.</li></ol><h3>Contoh Kode</h3><pre><code>@extends('layouts.app')
@section('content')
@foreach($skills as $skill)&lt;p&gt;{{ $skill-&gt;name }}&lt;/p&gt;@endforeach
@endsection</code></pre><h3>Hasil yang Diharapkan</h3><p>Data tampil melalui Blade.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat SkillCard component.</p><h3>Checkpoint</h3><ul><li>Layout dan directive Blade bekerja.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Migration & Database', 'Membuat tabel menggunakan migration dan menjalankan migrate/rollback.', 30, <<<'HTML'
<h2>Migration & Database</h2><h3>Tujuan Pembelajaran</h3><p>Membuat tabel menggunakan migration dan menjalankan migrate/rollback.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat migration skills.</li><li>Tentukan kolom.</li><li>Jalankan migrate.</li><li>Periksa tabel.</li></ol><h3>Contoh Kode</h3><pre><code>php artisan make:migration create_skills_table
php artisan migrate</code></pre><h3>Hasil yang Diharapkan</h3><p>Tabel skills dibuat.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan kolom image dan lakukan migration baru.</p><h3>Checkpoint</h3><ul><li>Schema sesuai kebutuhan aplikasi.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Model & Eloquent', 'Mengambil dan memanipulasi data dengan Eloquent.', 30, <<<'HTML'
<h2>Model & Eloquent</h2><h3>Tujuan Pembelajaran</h3><p>Mengambil dan memanipulasi data dengan Eloquent.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat model Skill.</li><li>Atur fillable.</li><li>Query get.</li><li>Query where.</li></ol><h3>Contoh Kode</h3><pre><code>$skills=Skill::where("category","Web Development")-&gt;latest()-&gt;get();</code></pre><h3>Hasil yang Diharapkan</h3><p>Data database tersedia sebagai collection.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Cari skill berdasarkan slug.</p><h3>Checkpoint</h3><ul><li>Query Eloquent menghasilkan data yang benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('CRUD Application', 'Membangun create, read, update, delete untuk skill.', 30, <<<'HTML'
<h2>CRUD Application</h2><h3>Tujuan Pembelajaran</h3><p>Membangun create, read, update, delete untuk skill.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat resource controller.</li><li>Buat route resource.</li><li>Buat form create.</li><li>Implementasikan store/update/destroy.</li></ol><h3>Contoh Kode</h3><pre><code>Route::resource("skills", SkillController::class);</code></pre><h3>Hasil yang Diharapkan</h3><p>Semua operasi CRUD dapat dilakukan.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan flash message setelah operasi.</p><h3>Checkpoint</h3><ul><li>Create, read, update, delete berhasil.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Form Request & Validation', 'Memvalidasi input menggunakan Form Request.', 30, <<<'HTML'
<h2>Form Request & Validation</h2><h3>Tujuan Pembelajaran</h3><p>Memvalidasi input menggunakan Form Request.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat StoreSkillRequest.</li><li>Tulis rules.</li><li>Inject request.</li><li>Tampilkan error Blade.</li></ol><h3>Contoh Kode</h3><pre><code>return ["name"=&gt;["required","string","max:100"],"slug"=&gt;["required","unique:skills,slug"]];</code></pre><h3>Hasil yang Diharapkan</h3><p>Input salah ditolak dengan pesan error.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan validasi description dan image.</p><h3>Checkpoint</h3><ul><li>Data invalid tidak tersimpan.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Relationships', 'Menghubungkan Skill dan Lesson dengan Eloquent relationship.', 30, <<<'HTML'
<h2>Relationships</h2><h3>Tujuan Pembelajaran</h3><p>Menghubungkan Skill dan Lesson dengan Eloquent relationship.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Tambahkan skill_id pada lessons.</li><li>Buat hasMany di Skill.</li><li>Buat belongsTo di Lesson.</li><li>Gunakan eager loading.</li></ol><h3>Contoh Kode</h3><pre><code>public function lessons(): HasMany { return $this-&gt;hasMany(Lesson::class); }
$skill=Skill::with("lessons")-&gt;find(1);</code></pre><h3>Hasil yang Diharapkan</h3><p>Lesson terkait dapat diakses melalui skill.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tampilkan jumlah lesson setiap skill.</p><h3>Checkpoint</h3><ul><li>Foreign key dan relasi benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Authentication & Middleware', 'Melindungi dashboard dan memahami login/logout.', 30, <<<'HTML'
<h2>Authentication & Middleware</h2><h3>Tujuan Pembelajaran</h3><p>Melindungi dashboard dan memahami login/logout.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Siapkan user.</li><li>Buat form login.</li><li>Validasi credential.</li><li>Pasang middleware auth.</li></ol><h3>Contoh Kode</h3><pre><code>Route::get("/dashboard", DashboardController::class)-&gt;middleware("auth");</code></pre><h3>Hasil yang Diharapkan</h3><p>Guest tidak dapat membuka dashboard.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat profile route yang juga protected.</p><h3>Checkpoint</h3><ul><li>Login, session, logout, middleware dipahami.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Authorization & Policies', 'Membatasi aksi berdasarkan hak pengguna.', 30, <<<'HTML'
<h2>Authorization & Policies</h2><h3>Tujuan Pembelajaran</h3><p>Membatasi aksi berdasarkan hak pengguna.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat policy.</li><li>Tentukan update/delete rule.</li><li>Panggil authorize.</li><li>Uji dengan user berbeda.</li></ol><h3>Contoh Kode</h3><pre><code>$this-&gt;authorize("update", $skill);</code></pre><h3>Hasil yang Diharapkan</h3><p>User tanpa izin ditolak.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Batasi edit hanya pemilik data.</p><h3>Checkpoint</h3><ul><li>Authentication dan authorization tidak tertukar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Laravel API', 'Membuat endpoint JSON untuk client.', 30, <<<'HTML'
<h2>Laravel API</h2><h3>Tujuan Pembelajaran</h3><p>Membuat endpoint JSON untuk client.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat route API.</li><li>Buat controller API.</li><li>Query Eloquent.</li><li>Return JSON.</li></ol><h3>Contoh Kode</h3><pre><code>return response()-&gt;json(["data"=&gt;Skill::latest()-&gt;get()]);</code></pre><h3>Hasil yang Diharapkan</h3><p>Endpoint menghasilkan JSON.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat endpoint detail slug.</p><h3>Checkpoint</h3><ul><li>Response JSON dan status code benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('File Upload & Storage', 'Mengupload dan menampilkan gambar dengan Storage.', 30, <<<'HTML'
<h2>File Upload & Storage</h2><h3>Tujuan Pembelajaran</h3><p>Mengupload dan menampilkan gambar dengan Storage.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Validasi file.</li><li>Simpan ke disk public.</li><li>Buat storage link.</li><li>Simpan path.</li></ol><h3>Contoh Kode</h3><pre><code>$path=$request-&gt;file("image")-&gt;store("skills","public");
php artisan storage:link</code></pre><h3>Hasil yang Diharapkan</h3><p>File tersimpan dan dapat ditampilkan.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan penghapusan file lama.</p><h3>Checkpoint</h3><ul><li>Upload, validation, dan URL file bekerja.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Final Project Laravel', 'Membangun mini SkillPath dengan seluruh konsep Laravel.', 30, <<<'HTML'
<h2>Final Project Laravel</h2><h3>Tujuan Pembelajaran</h3><p>Membangun mini SkillPath dengan seluruh konsep Laravel.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Rancang database.</li><li>Buat migration dan model.</li><li>Buat seeder.</li><li>Bangun route/controller/Blade.</li><li>Tambahkan auth dan progress.</li><li>Tambahkan API.</li><li>Uji seluruh alur.</li></ol><h3>Contoh Kode</h3><pre><code>php artisan migrate
php artisan db:seed
php artisan serve</code></pre><h3>Hasil yang Diharapkan</h3><p>User dapat login, membuka skill, membaca lesson, menyelesaikan lesson, dan melihat progress.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan search dan filter kategori.</p><h3>Checkpoint</h3><ul><li>Alur utama aplikasi berjalan tanpa error.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

    private function seedRESTAPI(): void
    {
        $this->createSkill('REST API', 'Memahami dan menguji API berbasis HTTP dan JSON.', 'rest-api.svg', [
            $this->lesson('Mengenal REST API', 'Memahami API sebagai penghubung client dan server.', 30, <<<'HTML'
<h2>Mengenal REST API</h2><h3>Tujuan Pembelajaran</h3><p>Memahami API sebagai penghubung client dan server.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Pilih endpoint latihan.</li><li>Kirim request GET.</li><li>Baca response.</li><li>Identifikasi data.</li></ol><h3>Contoh Kode</h3><pre><code>Client -&gt; API -&gt; Server -&gt; Database -&gt; Response</code></pre><h3>Hasil yang Diharapkan</h3><p>Data diterima client.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Gambarkan arsitektur SkillPath.</p><h3>Checkpoint</h3><ul><li>Dapat menjelaskan fungsi API.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('HTTP Method', 'Memilih method sesuai operasi CRUD.', 30, <<<'HTML'
<h2>HTTP Method</h2><h3>Tujuan Pembelajaran</h3><p>Memilih method sesuai operasi CRUD.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Pelajari GET.</li><li>Uji POST.</li><li>Uji PATCH/PUT.</li><li>Uji DELETE.</li></ol><h3>Contoh Kode</h3><pre><code>GET /api/skills
POST /api/skills
PATCH /api/skills/1
DELETE /api/skills/1</code></pre><h3>Hasil yang Diharapkan</h3><p>Method sesuai kebutuhan operasi.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tentukan method untuk lima kasus.</p><h3>Checkpoint</h3><ul><li>Paham fungsi method.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Request & Response', 'Membaca URL, headers, body, status, dan response.', 30, <<<'HTML'
<h2>Request & Response</h2><h3>Tujuan Pembelajaran</h3><p>Membaca URL, headers, body, status, dan response.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Kirim GET lewat Apidog.</li><li>Buka headers.</li><li>Buka body.</li><li>Catat status code.</li></ol><h3>Contoh Kode</h3><pre><code>GET /api/skills
Accept: application/json</code></pre><h3>Hasil yang Diharapkan</h3><p>Struktur request dan response dapat dijelaskan.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Bandingkan 200, 404, dan 422.</p><h3>Checkpoint</h3><ul><li>Dapat membaca hasil API.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('JSON', 'Membuat dan memvalidasi struktur JSON.', 30, <<<'HTML'
<h2>JSON</h2><h3>Tujuan Pembelajaran</h3><p>Membuat dan memvalidasi struktur JSON.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat object.</li><li>Gunakan string dan number.</li><li>Tambahkan boolean.</li><li>Validasi JSON.</li></ol><h3>Contoh Kode</h3><pre><code>{"name":"Laravel","category":"Web Development","lessons":15,"published":true}</code></pre><h3>Hasil yang Diharapkan</h3><p>JSON valid.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat JSON profil pengguna dengan array skills.</p><h3>Checkpoint</h3><ul><li>Tipe dan struktur JSON benar.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('CRUD API', 'Merancang endpoint lengkap untuk resource skills.', 30, <<<'HTML'
<h2>CRUD API</h2><h3>Tujuan Pembelajaran</h3><p>Merancang endpoint lengkap untuk resource skills.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Tentukan URL.</li><li>Buat controller.</li><li>Validasi request.</li><li>Return status code.</li><li>Uji semua operasi.</li></ol><h3>Contoh Kode</h3><pre><code>GET /api/skills
GET /api/skills/{id}
POST /api/skills
PATCH /api/skills/{id}
DELETE /api/skills/{id}</code></pre><h3>Hasil yang Diharapkan</h3><p>Semua operasi CRUD dapat diuji.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Tambahkan pagination.</p><h3>Checkpoint</h3><ul><li>Endpoint konsisten dan error ditangani.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
            $this->lesson('Testing API', 'Membuat collection pengujian API di Apidog/Postman.', 30, <<<'HTML'
<h2>Testing API</h2><h3>Tujuan Pembelajaran</h3><p>Membuat collection pengujian API di Apidog/Postman.</p><h3>Persiapan</h3><p>Siapkan project yang sedang kamu gunakan dan pastikan tools yang diperlukan dapat dijalankan.</p><h3>Langkah Pengerjaan</h3><ol><li>Buat collection.</li><li>Tambahkan GET.</li><li>Tambahkan POST valid.</li><li>Tambahkan POST invalid.</li><li>Uji ID tidak ditemukan.</li></ol><h3>Contoh Kode</h3><pre><code>GET /api/skills
POST /api/skills
Content-Type: application/json</code></pre><h3>Hasil yang Diharapkan</h3><p>Collection menunjukkan hasil request yang benar dan salah.</p><h3>Jika Error</h3><p>Periksa nama file, path, syntax, terminal, dan pesan error. Baca baris error pertama yang menunjuk ke kode sebelum mengubah bagian lain.</p><h3>Mini Challenge</h3><p>Buat minimal enam skenario pengujian.</p><h3>Checkpoint</h3><ul><li>API teruji pada kondisi normal dan error.</li><li>Fitur dapat dijalankan tanpa error.</li><li>Kamu dapat menjelaskan kembali langkah utamanya.</li></ul><h3>Kesimpulan</h3><p>Lesson selesai jika hasil praktik sesuai target dan mini challenge sudah dicoba.</p>
HTML),
        ]);
    }

}