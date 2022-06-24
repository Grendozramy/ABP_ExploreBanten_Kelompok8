<?php

namespace Database\Seeders;

use App\Models\Place;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'title' => 'Gunung Luhur, Negeri di Atas Awan',
            'title1' => 'Gunung Luhur',
            'slug' => 'gunung-luhur-negeri-di-atas-awan',
            'user_id' => '1',
            'category_id' => '1',
            'excerpt' => '<div>Keindahan negeri di atas awan Citorek tak kalah mempesona 
                    dibandingkan panorama serupa yang bisa disaksikan di negeri di atas 
                    awan yang berada di...',
            'description' => '<div>Keindahan negeri di atas awan Citorek tak kalah mempesona 
                    dibandingkan panorama serupa yang bisa disaksikan di negeri di atas awan yang berada 
                    disejumlah daerah. Setelah keberadaan negeri di atas awan Gunung Luhur menjadi viral, 
                    banyak pengunjung yang datang setiap harinya. Jumlah pengunjung akan meningkat pesat 
                    saat akhir pekan, meskipun sebagian besar pengunjung itu berasal dari Lebak, dan 
                    masih sebagian kecil pengunjung dari luar daerah.<br><br>Jika pengunjung baru tiba di 
                    lokasi lebih dari pukul 08.00 WIB, awan mulai beranjak pergi dan hanya menyuguhkan 
                    pemandangan lembah Citorek dari ketinggian saja. Karena itu, menginap adalah salah 
                    satu pilihan terbaik supaya tidak ketinggalan momen samudera awan. Tapi jangan 
                    bayangkan hotel yang nyaman, karena memang belum tersedia.</div>',
            'phone' => '-',
            'website' => '-',
            'office_hours' => '07.00- 18.00 WIB',
            'address' => 'Citorek Kidul, Kec. Cibeber, Kabupaten Lebak, Banten',
            'address1' => 'Citorek Kidul, Kec. Cibeber',
            'longitude' => '106.31679010660574',
            'latitude' => '-6.757999285216089',
            'location' => '-6.757999285216089,106.31679010660574',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Place::create([
            'title' => 'Mengenal Suku Baduy, suku asli dari Provinsi Banten',
            'title1' => 'Suku Baduy',
            'slug' => 'mengenal-suku-baduy-suku-asli-dari-provinsi-banten',
            'user_id' => '1',
            'category_id' => '2',
            'excerpt' => '<div>Indonesia adalah negara yang kaya akan sumber daya alam dan beraneka ragam budaya di dalamnya. 
                    Hal ini dibuktikan dengan banyaknya suku dan buday...',
            'description' => '<div>Indonesia adalah negara yang kaya akan sumber daya alam dan beraneka ragam budaya di dalamnya. 
            Hal ini dibuktikan dengan banyaknya suku dan budaya serta alam yang tidak bosan-bosannya untuk dijelajahi. 
            Kekayaan alam dan budaya inilah yang membuat banyak orang senang mengunjungi Indonesia.<br><br></div><div>Salah satu wilayah yang memiliki potensi alam dan budaya yang menarik dan layak untuk dijelajahi adalah Provinsi Banten. Selain memiliki kekayaan berupa sumber daya alam yang indah seperti pantai, gunung, dan perbukitan, Banten juga terkenal dengan suku <a href=\"http://wisatabanten.com/\">khasnya Baduy</a>. Hampir setiap orang di Indonesia mengetahui Suku Baduy yang terletak di Banten ini. Bahkan tidak sedikit wisatawan domestik yang melakukan perjalanan untuk menjelajahi suku tersebut.<br><br></div>',
            'phone' => '085717928250',
            'website' => '-',
            'office_hours' => '-',
            'address' => 'Kadujangkung, Bojong Menteng, Kec. Leuwidamar, Kabupaten Lebak, Banten 42362',
            'address1' => 'Kadujangkung, Kec. Leuwidamar',
            'longitude' => '106.23614500862217',
            'latitude' => '-6.59453929438753',
            'location' => '-6.59453929438753,106.23614500862217',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Place::create([
            'title' => 'Sate Bebek Paling Dicari di Cilegon, Sate Dengan Rasa Nikmat dan Empuk!',
            'title1' => 'Sate Bebek Cilegon',
            'slug' => 'sate-bebek-paling-dicari-di-cilegon-sate-dengan-rasa-nikmat-dan-empuk',
            'user_id' => '1',
            'category_id' => '3',
            'excerpt' => '<div>Masih satu sate, yakni sate bebek yang sangat terkenal di kawasan Cibeber, Kota Cilegon., Sate Bebek Cindelaras. Rumah makan sate bebek yang suda...',
            'description' => '<div>Masih satu sate, yakni sate bebek yang sangat terkenal di kawasan Cibeber, Kota Cilegon., Sate Bebek Cindelaras. 
            Rumah makan sate bebek yang sudah ada sejak tiga puluh tahun silam ini sudah tidak diragukan lagi kelezatannya.<br><br></div><div>Meski bebek dikenal akan bau amisnya, tetapi sate disini sama sekali tidak berbau amis. Pengolahan yang tepat dan bumbu resep turun temurun yang dijaga keasliannya adalah kunci sate bebek ini tetap diburu pelanggannya.<br><br></div><div>Sate bebek yang empuk, menjadikan cocok wisata kuliner di kota Serang dan Banten.</div>',
            'phone' => '0877-7184-4294',
            'website' => '-',
            'office_hours' => '12.00- 22.00 WIB',
            'address' => 'Jl. Raya H. Mambruk, RT. 01/02, Cibeber, Kecamatan Cibeber, Cibeber, Kec. Cibeber, Kota Cilegon, Banten 42423',
            'address1' => 'Jl. Raya H. Mambruk, Kota Cilegon',
            'longitude' => '106.07545267103515',
            'latitude' => '-6.03852320593975',
            'location' => '-6.03852320593975,106.07545267103515',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Place::create([
            'title' => 'Tanjung Lesung yang Indah dan Mempesona',
            'title1' => 'Tanjung Lesung',
            'slug' => 'tanjung-lesung-yang-indah-dan-mempesona',
            'user_id' => '1',
            'category_id' => '1',
            'excerpt' => '<div><a href=\"https://www.merdeka.com/cari/?q=tanjunglesung\">Tanjung Lesung</a> adalah salah satu kawasan wisata yang sangat terkenal di Kota Pandegla...',
            'description' => '<div><a href=\"https://www.merdeka.com/cari/?q=tanjunglesung\">Tanjung Lesung</a> adalah salah satu kawasan wisata yang sangat terkenal di Kota Pandeglang, Provinsi Banten. Wisata Tanjung Lesung sendiri merupakan sebuah daratan berbentuk lesung yang menjorok ke laut. Tempat wisata yang memiliki luas sekitar 1.500 Ha ini memiliki pemandangan indah berupa hamparan pasir putih yang masih tampak alami.<br><br></div><div>Pantai Tanjung Lesung memiliki air biru yang jernih dan memiliki ombak yang relatif tenang dan tidak besar. Tak hanya bisa menikmati keindahan pantai, di tempat ini Anda juga akan dimanjakan dengan berbagai wahana yang menarik untuk dicoba.<br><br></div><div>Selain itu, wisata Tanjung Lesung juga menyediakan beberapa penginapan dan hotel berbintang. Untuk itu, wisata Tanjung Lesung cocok dikunjungi bersama keluarga dan dijamin tidak mengecewakan.<br><br></div>',
            'phone' => '+6281908088089',
            'website' => 'https://www.tanjunglesung.com/',
            'office_hours' => '07.00- 20.00 WIB',
            'address' => 'Pantai Tj. Lesung, Banten',
            'address1' => 'Pantai Tj. Lesung, Banten',
            'longitude' => '105.65850446088325',
            'latitude' => '-6.4808550223056125',
            'location' => '-6.4808550223056125,105.65850446088325',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Place::create([
            'title' => 'Makanan Khas Banten Sate Bandeng',
            'title1' => 'Sate Bandeng',
            'slug' => 'makanan-khas-banten-sate-bandeng',
            'user_id' => '1',
            'category_id' => '3',
            'excerpt' => 'Sate Bandeng adalah masakan tradisional khas Banten, Indonesia. Sate Bandeng dibuat dari ikan bandeng (Chanos chanos; bahasa Indonesia: ikan Bandeng)...',
            'description' => '<div><strong>Sate Bandeng</strong> adalah masakan tradisional <strong>khas Banten</strong>, Indonesia. <strong>Sate Bandeng</strong> dibuat dari ikan <strong>bandeng</strong> (Chanos chanos; bahasa Indonesia: ikan <strong>Bandeng</strong>) yang dihilangkan durinya, dagingnya dibumbui dan dimasukkan kembali ke kulitnya, lalu ditusuk atau dijepit tusukan tangkai bambu, lalu dibakar di atas bara arang.</div>',
            'phone' => '087773587187',
            'website' => 'http://www.satebandengibuamenahkhasbanten.blogspot.com/',
            'office_hours' => '07.00- 22.00 WIB',
            'address' => 'Jl. Sayabulu km 1, Lingk No.11, RT.2/RW.1, Dalung, Kec. Cipocok Jaya, Kota Serang, Banten 42127',
            'address1' => 'Jl. Sayabulu km 1, Kec. Cipocok Jaya',
            'longitude' => '106.1484829272488',
            'latitude' => '-6.134825356109146',
            'location' => '-6.134825356109146,106.1484829272488',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Place::create([
            'title' => 'Seren Taun Kasepuhan Cisungsang',
            'title1' => 'Seren Taun Kasepuhan Cisungsang',
            'slug' => 'seren-taun-kasepuhan-cisungsang',
            'user_id' => '1',
            'category_id' => '2',
            'excerpt' => 'Seren Taun merupakan sebuah ritual atau upacara adat turun temurun yang dilakukan masyarakat Cisungsang sebagai wujud rasa syukur&nbsp; setelah panen...',
            'description' => '<div>Seren Taun merupakan sebuah ritual atau upacara adat turun temurun yang dilakukan masyarakat Cisungsang sebagai wujud rasa syukur&nbsp; setelah panen padi. Upacara ini dilakukan setiap tahun secara rutin, dan diikuti seluruh warga desa. Mulai dari anak-anak sampai orang dewasa, semuanya ikut ambil bagian dalam upacara tersebut.</div><div><br></div><div>Seren Taun Adat Kasepuhan Cisungsang tahun 2021 digelar pada hari Minggu (05/09/2021) secara sederhana, bertempat di pendopo rumah adat kasepuhan Cisungsang. Kampung Cisungsang, Desa Cisungsang, Kecamatan Cibeber, Kabupaten Lebak.<br><br></div><div>Pada pelaksanaan acara Seren Tahun kali ini, setelah pandemi Covid-19, adat kasepuhan Cisungsang menggelar Seren Taun secara sederhana dan dibatasi hanya 25 persen pengunjung, dengan menerapkan protokol kesehatan yang berlaku, guna mengantisipasi penularan virus Covid-19.<br><br></div><div>Dalam kesempatan itu, Kasepuhan adat Cisungsang A Usep Suyatma yang akrab di sapa Abah Usep, mengatakan, bahwa acara seren taun di tahun 2021 dilaksanakan secara sederhana, hanya 25 persen saja.<br><br></div><div>“Karena mengingat di masa PPKM, acara ini dilaksanakan tidak seperti di tahun-tahun sebelumnya. Kami juga sudah berkoordinasi dulu dengan pihak kecamatan, untuk meminta petunjuk dan arahan,” kata Abah Usep.<br><br></div><div>“Kami mengikuti aturan pemerintah, tentang Protokol kesehatan dengan ketat dimasa pandemi Covid-19 ini. Setelah itu baru kami mengadakan acara ini, atas petunjuk dari petugas tentang aturan protokol kesehatan (Prokes) yang sudah ditentukan oleh pemerintah. Untuk itu kami melaksanakan acara seren tahun adat Kasepuhan Cisungsang di tahun 2021 ini, hanya sekitar dibawah 25 persen tidak seperti di tahun-tahun sebelumnya,” tambahnya.<br><br></div><div>Turut hadir dalam acara Seren Taun A. Usep Suyatma S.r selaku Ketua Adat kasepuhan Cisungsang, Asda 1 Provinsi Banten, Forum koordinasi pimpinan daerah, Dinas Pariwisata Provinsi Banten, Dinas Kebudayaan dan Pariwisata Kabupaten Lebak, Kepala Desa Cisungsang, dan masyarakat adat Cisungsang.</div>',
            'phone' => '-',
            'website' => '-',
            'office_hours' => '-',
            'address' => 'Cisungsang, Kabupaten Lebak, Banten',
            'address1' => 'Cisungsang, Kabupaten Lebak, Banten',
            'longitude' => '106.42227743114297',
            'latitude' => '-6.800603916612707',
            'location' => '-6.800603916612707,106.42227743114297',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);
    }
}
