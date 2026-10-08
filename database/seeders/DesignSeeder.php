<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DesignSeeder extends Seeder
{
    public function run(): void
    {
        Skill::where('name', 'Design')->delete();
        Skill::where('category', 'Design')->delete();

        $skills = [
            [
                'name' => 'UI/UX Fundamentals',
                'description' => 'Mempelajari dasar UI/UX, user, problem, research, usability, dan proses desain produk digital.',
                'image' => 'ui-ux.svg',
                'lessons' => [
                    ['Memahami UI dan UX', 'Mengenal perbedaan User Interface dan User Experience serta hubungan keduanya.'],
                    ['Mengenal User', 'Memahami siapa pengguna produk dan apa yang mereka butuhkan.'],
                    ['User Problem', 'Menemukan masalah pengguna yang dapat diselesaikan oleh produk digital.'],
                    ['User Research', 'Mengenal metode sederhana untuk mengumpulkan informasi dari pengguna.'],
                    ['User Persona', 'Membuat gambaran pengguna berdasarkan kebutuhan dan karakteristiknya.'],
                    ['Usability', 'Memahami prinsip agar produk mudah dipahami dan digunakan.'],
                    ['UI Design Principles', 'Mempelajari hierarchy, alignment, contrast, consistency, dan spacing.'],
                    ['UX Design Process', 'Memahami tahapan dari memahami masalah sampai membuat solusi.'],
                    ['Evaluasi Desain', 'Mengevaluasi desain berdasarkan kebutuhan dan pengalaman pengguna.'],
                    ['Mini Project UI/UX', 'Membuat konsep sederhana aplikasi berdasarkan masalah pengguna.'],
                ],
            ],
            [
                'name' => 'Figma',
                'description' => 'Mempelajari Figma dari dasar sampai membuat desain dan prototype interaktif.',
                'image' => 'figma.svg',
                'lessons' => [
                    ['Mengenal Figma', 'Mengenal fungsi Figma dan membuat file desain pertama.'],
                    ['Interface Figma', 'Mengenal toolbar, layers, properties, assets, dan canvas.'],
                    ['Frame dan Section', 'Membuat area desain untuk berbagai ukuran perangkat.'],
                    ['Shape dan Text', 'Menggunakan rectangle, circle, text, dan pengaturan properties.'],
                    ['Color dan Style', 'Mengatur warna, fill, stroke, opacity, dan style.'],
                    ['Auto Layout', 'Membuat layout yang dapat menyesuaikan isi secara otomatis.'],
                    ['Components', 'Membuat komponen yang dapat digunakan kembali.'],
                    ['Variants', 'Membuat variasi komponen seperti button normal, hover, dan disabled.'],
                    ['Figma Prototype', 'Menghubungkan beberapa halaman menjadi prototype interaktif.'],
                    ['Mini Project Figma', 'Membuat desain aplikasi sederhana dari awal sampai prototype.'],
                ],
            ],
            [
                'name' => 'Wireframing',
                'description' => 'Mempelajari cara membuat rancangan struktur halaman sebelum masuk ke desain visual.',
                'image' => 'wireframing.svg',
                'lessons' => [
                    ['Apa Itu Wireframe', 'Memahami fungsi wireframe dalam proses desain produk digital.'],
                    ['Menentukan Tujuan Halaman', 'Menentukan tujuan dan informasi utama sebuah halaman.'],
                    ['Struktur Halaman', 'Menyusun header, navigation, content, dan footer.'],
                    ['Low Fidelity Wireframe', 'Membuat rancangan sederhana menggunakan bentuk dasar.'],
                    ['High Fidelity Wireframe', 'Mengembangkan wireframe menjadi rancangan yang lebih detail.'],
                    ['Wireframe Mobile', 'Membuat struktur halaman khusus untuk perangkat mobile.'],
                    ['Evaluasi Wireframe', 'Memeriksa apakah struktur halaman sudah jelas dan mudah dipahami.'],
                    ['Mini Project Wireframe', 'Membuat wireframe website pembelajaran dari beberapa halaman.'],
                ],
            ],
            [
                'name' => 'Prototyping',
                'description' => 'Mempelajari pembuatan prototype untuk menguji interaksi dan alur desain.',
                'image' => 'prototyping.svg',
                'lessons' => [
                    ['Apa Itu Prototype', 'Memahami fungsi prototype sebelum produk dikembangkan.'],
                    ['Membuat Screen', 'Menyiapkan beberapa halaman untuk simulasi produk.'],
                    ['Interaction', 'Menghubungkan elemen desain dengan halaman tujuan.'],
                    ['Trigger dan Action', 'Memahami cara kerja klik, hover, drag, dan interaction lainnya.'],
                    ['Transition', 'Menggunakan animasi dan perpindahan antarhalaman.'],
                    ['Prototype Form', 'Membuat simulasi form dan alur pengisian data.'],
                    ['Testing Prototype', 'Menguji apakah prototype berjalan sesuai tujuan.'],
                    ['Mini Project Prototype', 'Membuat prototype aplikasi sederhana dengan beberapa halaman.'],
                ],
            ],
            [
                'name' => 'User Flow',
                'description' => 'Mempelajari cara merancang perjalanan pengguna dari awal sampai mencapai tujuan.',
                'image' => 'user-flow.svg',
                'lessons' => [
                    ['Memahami User Flow', 'Mengenal konsep alur perjalanan pengguna dalam produk digital.'],
                    ['Menentukan User Goal', 'Menentukan tujuan utama yang ingin dicapai pengguna.'],
                    ['Entry Point', 'Menentukan dari mana pengguna memulai perjalanan.'],
                    ['User Action', 'Mencatat tindakan yang dilakukan pengguna.'],
                    ['Decision Flow', 'Membuat percabangan ketika pengguna memiliki beberapa pilihan.'],
                    ['Flow Sederhana', 'Membuat alur dari halaman awal sampai tujuan.'],
                    ['Evaluasi User Flow', 'Menemukan langkah yang terlalu panjang atau membingungkan.'],
                    ['Mini Project User Flow', 'Membuat user flow untuk platform pembelajaran.'],
                ],
            ],
            [
                'name' => 'Design System',
                'description' => 'Mempelajari cara membuat sistem komponen dan aturan visual yang konsisten.',
                'image' => 'design-system.svg',
                'lessons' => [
                    ['Apa Itu Design System', 'Memahami tujuan dan manfaat design system.'],
                    ['Color Tokens', 'Membuat aturan warna utama, secondary, accent, dan background.'],
                    ['Typography System', 'Membuat aturan ukuran dan weight typography.'],
                    ['Spacing System', 'Membuat aturan jarak agar layout konsisten.'],
                    ['Button Component', 'Membuat komponen tombol dengan beberapa kondisi.'],
                    ['Input Component', 'Membuat komponen input yang konsisten.'],
                    ['Card Component', 'Membuat card yang dapat digunakan di banyak halaman.'],
                    ['Component States', 'Membuat state normal, hover, active, dan disabled.'],
                    ['Documentation', 'Mendokumentasikan aturan penggunaan komponen.'],
                    ['Mini Project Design System', 'Membuat design system sederhana untuk sebuah website.'],
                ],
            ],
            [
                'name' => 'Typography',
                'description' => 'Mempelajari font, ukuran teks, hierarchy, spacing, dan keterbacaan.',
                'image' => 'typography.svg',
                'lessons' => [
                    ['Mengenal Typography', 'Memahami peran typography dalam desain digital.'],
                    ['Font Family', 'Mengenal jenis font dan memilih font yang sesuai.'],
                    ['Font Size', 'Menentukan ukuran teks berdasarkan tingkat kepentingannya.'],
                    ['Font Weight', 'Menggunakan ketebalan font untuk membentuk hierarchy.'],
                    ['Line Height', 'Mengatur jarak antarbaris agar teks nyaman dibaca.'],
                    ['Letter Spacing', 'Mengatur jarak antarhuruf untuk kebutuhan tertentu.'],
                    ['Typography Hierarchy', 'Membuat struktur heading, body, caption, dan label.'],
                    ['Font Pairing', 'Menggabungkan dua font agar tetap harmonis.'],
                    ['Typography untuk UI', 'Menerapkan typography pada interface digital.'],
                    ['Mini Project Typography', 'Membuat typography system untuk sebuah website.'],
                ],
            ],
            [
                'name' => 'Color Theory',
                'description' => 'Mempelajari teori warna dan penerapannya dalam desain digital.',
                'image' => 'color-theory.svg',
                'lessons' => [
                    ['Mengenal Warna', 'Memahami hue, saturation, brightness, dan color wheel.'],
                    ['Primary dan Secondary Color', 'Memahami hubungan warna dasar dalam sebuah palette.'],
                    ['Warm dan Cool Color', 'Membedakan karakter warna hangat dan dingin.'],
                    ['Color Harmony', 'Mengenal kombinasi warna yang harmonis.'],
                    ['Color Palette', 'Membuat palette warna untuk produk digital.'],
                    ['Contrast', 'Memahami pentingnya perbedaan warna dalam desain.'],
                    ['Semantic Color', 'Membuat warna untuk success, warning, error, dan information.'],
                    ['Warna dan Brand', 'Menyesuaikan warna dengan karakter sebuah brand.'],
                    ['Mini Project Color', 'Membuat color palette lengkap untuk sebuah website.'],
                ],
            ],
            [
                'name' => 'Layout & Grid',
                'description' => 'Mempelajari cara menyusun elemen menggunakan layout, grid, spacing, dan alignment.',
                'image' => 'layout-grid.svg',
                'lessons' => [
                    ['Mengenal Layout', 'Memahami bagaimana elemen disusun dalam sebuah halaman.'],
                    ['Container', 'Mengatur batas area content agar tetap rapi.'],
                    ['Grid', 'Memahami fungsi kolom dan baris dalam desain.'],
                    ['Margin dan Padding', 'Membedakan ruang luar dan ruang dalam sebuah elemen.'],
                    ['Gap', 'Mengatur jarak antar elemen secara konsisten.'],
                    ['Alignment', 'Menyusun elemen berdasarkan garis dan posisi yang konsisten.'],
                    ['Card Layout', 'Membuat susunan card yang rapi.'],
                    ['Dashboard Layout', 'Menyusun layout dashboard dengan beberapa komponen.'],
                    ['Mini Project Layout', 'Membuat layout halaman menggunakan sistem grid.'],
                ],
            ],
            [
                'name' => 'Responsive Design',
                'description' => 'Mempelajari cara membuat desain yang dapat menyesuaikan berbagai ukuran layar.',
                'image' => 'responsive-design.svg',
                'lessons' => [
                    ['Apa Itu Responsive Design', 'Memahami mengapa desain harus beradaptasi dengan ukuran layar.'],
                    ['Desktop Layout', 'Membuat rancangan untuk layar desktop.'],
                    ['Tablet Layout', 'Menyesuaikan struktur desain untuk tablet.'],
                    ['Mobile Layout', 'Membuat desain yang nyaman digunakan pada smartphone.'],
                    ['Responsive Typography', 'Menyesuaikan ukuran teks berdasarkan layar.'],
                    ['Responsive Navigation', 'Membuat konsep navigation yang sesuai untuk mobile.'],
                    ['Responsive Card', 'Mengubah susunan card pada berbagai ukuran layar.'],
                    ['Evaluasi Responsive', 'Menguji desain pada beberapa ukuran layar.'],
                    ['Mini Project Responsive', 'Membuat satu halaman dalam versi desktop dan mobile.'],
                ],
            ],
            [
                'name' => 'Accessibility',
                'description' => 'Mempelajari prinsip desain agar produk lebih mudah digunakan oleh berbagai pengguna.',
                'image' => 'accessibility.svg',
                'lessons' => [
                    ['Apa Itu Accessibility', 'Memahami pentingnya aksesibilitas dalam produk digital.'],
                    ['Color Contrast', 'Memastikan teks dan background memiliki kontras yang cukup.'],
                    ['Readable Typography', 'Membuat teks yang mudah dibaca.'],
                    ['Clear Navigation', 'Membuat navigasi yang mudah dipahami.'],
                    ['Button dan Touch Target', 'Membuat tombol yang mudah ditemukan dan digunakan.'],
                    ['Form Accessibility', 'Membuat form dengan label dan feedback yang jelas.'],
                    ['Focus State', 'Memahami pentingnya indikator fokus pada elemen interaktif.'],
                    ['Alternative Text', 'Memahami penggunaan teks alternatif pada gambar.'],
                    ['Mini Project Accessibility', 'Mengevaluasi dan memperbaiki accessibility sebuah halaman.'],
                ],
            ],
            [
                'name' => 'Branding',
                'description' => 'Mempelajari cara membangun identitas visual yang konsisten untuk sebuah produk.',
                'image' => 'branding.svg',
                'lessons' => [
                    ['Mengenal Branding', 'Memahami fungsi branding dalam membangun identitas produk.'],
                    ['Brand Personality', 'Menentukan karakter dan kepribadian sebuah brand.'],
                    ['Target Audience', 'Menentukan siapa yang menjadi target pengguna brand.'],
                    ['Logo', 'Memahami fungsi logo sebagai bagian dari identitas visual.'],
                    ['Brand Color', 'Menentukan warna yang mewakili karakter brand.'],
                    ['Brand Typography', 'Memilih typography yang sesuai dengan identitas brand.'],
                    ['Visual Identity', 'Menggabungkan logo, warna, typography, dan elemen visual.'],
                    ['Brand Guidelines', 'Membuat aturan penggunaan identitas visual.'],
                    ['Mini Project Branding', 'Membuat identitas visual sederhana untuk sebuah produk digital.'],
                ],
            ],
            [
                'name' => 'Visual Design',
                'description' => 'Menggabungkan prinsip visual design untuk menghasilkan interface yang jelas dan menarik.',
                'image' => 'visual-design.svg',
                'lessons' => [
                    ['Mengenal Visual Design', 'Memahami peran visual dalam membentuk pengalaman pengguna.'],
                    ['Visual Hierarchy', 'Mengatur tingkat kepentingan elemen melalui ukuran dan posisi.'],
                    ['Balance', 'Membuat komposisi visual yang seimbang.'],
                    ['Contrast', 'Menggunakan perbedaan visual untuk menarik perhatian.'],
                    ['Alignment', 'Menjaga posisi elemen agar terlihat teratur.'],
                    ['Consistency', 'Membuat elemen visual tetap konsisten.'],
                    ['Visual Composition', 'Menggabungkan berbagai elemen menjadi komposisi yang harmonis.'],
                    ['UI Visual Polish', 'Meningkatkan detail visual pada interface.'],
                    ['Design Review', 'Melakukan evaluasi akhir terhadap desain.'],
                    ['Final Design Project', 'Membuat desain halaman produk digital dari awal sampai prototype.'],
                ],
            ],
        ];

        foreach ($skills as $data) {
            $skill = Skill::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'description' => $data['description'],
                'level' => 'SkillPath',
                'category' => 'Design',
                'image' => $data['image'],
            ]);

            foreach ($data['lessons'] as $index => [$title, $description]) {
                $skill->lessons()->create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => $description,
                    'content' => $this->content($data['name'], $title, $description),
                    'order' => $index + 1,
                    'duration' => 20,
                    'is_published' => true,
                ]);
            }
        }
    }

    private function content(string $skill, string $title, string $description): string
    {
        return "
<h2>📖 Materi</h2>
<p>{$description}</p>
<p>Lesson ini merupakan bagian dari pembelajaran {$skill}. Pelajari konsepnya terlebih dahulu sebelum masuk ke praktik.</p>

<h2>💡 Konsep Utama</h2>
<ul>
<li>Memahami tujuan dari materi {$title}.</li>
<li>Mengetahui kapan konsep ini digunakan.</li>
<li>Memahami hubungan konsep dengan proses desain.</li>
</ul>

<h2>📝 Persiapan</h2>
<p>Siapkan Figma atau aplikasi desain yang kamu gunakan. Buat satu file latihan baru agar hasil praktik dapat disimpan dengan rapi.</p>

<h2>🔢 Langkah-Langkah</h2>
<ol>
<li>Baca dan pahami konsep utama.</li>
<li>Buka file desain latihan.</li>
<li>Buat elemen yang berkaitan dengan materi.</li>
<li>Atur ukuran, posisi, dan struktur elemen.</li>
<li>Periksa kembali hasil desain.</li>
<li>Bandingkan hasilnya dengan tujuan pembelajaran.</li>
</ol>

<h2>🛠️ Praktik</h2>
<p>Buat satu contoh desain yang menerapkan konsep <strong>{$title}</strong>. Jangan hanya mengikuti contoh. Coba gunakan objek atau halaman buatanmu sendiri.</p>

<h2>🎯 Mini Challenge</h2>
<p>Buat satu desain sederhana yang menunjukkan bahwa kamu benar-benar memahami {$title}. Simpan hasilnya di folder project SkillPath.</p>

<h2>✅ Checkpoint</h2>
<ul>
<li>☐ Memahami konsep {$title}.</li>
<li>☐ Dapat menjelaskan fungsi konsep tersebut.</li>
<li>☐ Dapat menerapkannya pada desain.</li>
<li>☐ Dapat mengevaluasi hasil desain sendiri.</li>
</ul>

<h2>📌 Kesimpulan</h2>
<p>{$title} merupakan salah satu bagian penting dalam proses desain. Setelah menyelesaikan praktik, pastikan kamu dapat menjelaskan alasan di balik keputusan desain yang dibuat.</p>
";
    }
}