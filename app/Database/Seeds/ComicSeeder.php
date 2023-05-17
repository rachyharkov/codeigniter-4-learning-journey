<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ComicSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'         =>  'One Piece',
                'slug'          =>  'one-piece',
                'author'        =>  'Eiichiro Oda',
                'publisher'     =>  'Shueisha',
                'volume'        =>  98,
                'description'   =>  'One Piece adalah sebuah anime dan manga tentang sekelompok bajak laut yang dipimpin oleh Monkey D. Luffy dan pergi mencari harta karun peninggalan raja bajak laut Gol D. Roger, One Piece. Luffy menjadi manusia karet yang memiliki kekuatan memanjangkan tubuhnya setelah secara tak sengaja memakan buah Gomu Gomu, salah satu dari buah iblis. Ditemani oleh kru bajak lautnya yang bernama Luffy berlayar mencari One Piece, harta karun legendaris milik raja bajak laut Gol D. Roger. Dalam perjalanannya Luffy merekrut beragam anggota kru untuk kelompok bajak lautnya, Bajak Laut Topi Jerami, termasuk di antaranya ahli pedang Roronoa Zoro, navigator Nami, inventor dan penembak jitu Usopp, koki dan ahli bela diri Sanji, rusa antropomorfik dan dokter Tony Tony Chopper, arkeolog Nico Robin, cyborg ahli kapal Franky, dan musisi kerangka Brook.',
                'cover'         =>  'banana.jpg'
            ],
            [
                'title'         =>  'Naruto',
                'slug'          =>  'naruto',
                'author'        =>  'Masashi Kishimoto',
                'publisher'     =>  'Shueisha',
                'volume'        =>  72,
                'description'   =>  'Naruto adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, pemimpin dan ninja terkuat di desanya. Serial ini diserialkan di majalah Weekly Shōnen Jump terbitan Shueisha sejak tanggal 21 September 1999, dan telah dibundel dan diterbitkan menjadi 72 volume tankōbon oleh Shueisha hingga Oktober 2015.',
                'cover'         =>  'building.jpg'
            ]
        ];  

        foreach ($data as $comic) {
            $this->db->table('comics')->insert($comic);
        }
    }

}
