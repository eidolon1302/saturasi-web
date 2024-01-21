<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partai;

class PartaiSeeder extends Seeder
{
    protected $data= [
            [                           // nomor 1
                'nomor' => 1,
                'name' => 'PKB  ',
                'image' => 'pk-logo.png'
            ],  
            [                           // nomor 2
                'nomor' => 2,
                'name' => 'Gerindra',
                'image' => 'gerindra-logo.png'
            ],
            [                           // nomor 3
                'nomor' => 3,
                'name' => 'PDIP',
                'image' => 'pdip-logo.png'
            ],
            [                           // nomor 4
                'nomor' => 4,
                'name' => 'Partai Golkar',
                'image' => 'golkar-logo.png'
            ],
            [                           // nomor 5
                'nomor' => 5,
                'name' => 'Partai Nasdem',
                'image' => 'nasdem-logo.png'
            ],
            [                           // nomor 6
                'nomor' => 6,
                'name' => 'Partai Buruh',
                'image' => 'partaiburuh-logo.png'
            ],
            [                           // nomor 7
                'nomor' => 7,
                'name' => 'Partai Gelombang Rakyat indonesia',
                'image' => 'gelora-logo.png'
            ],
            [                           // nomor 8
                'nomor' => 8,
                'name' => 'Partai Keadilan Sejahtera',
                'image' => 'pks-logo.png'
            ],
            [                           // nomor 9
                'nomor' => 9,
                'name' => 'Partai Kebangkitan Nusantara',
                'image' => 'pkn-logo.png'
            ],
            [                           // nomor 10
                'nomor' => 10,
                'name' => 'Partai Hati Nurani Rakyat',
                'image' => 'hanura-logo.png'
            ],
            [                               // nomor 11
                'nomor' => 11,
                'name' => 'Partai Garda Republik Indonesia',
                'image' => 'partaigaruda-logo.png'
            ],
            [                               // nomor 12
                'nomor' => 12,
                'name' => 'Partai Amanat Nasional',
                'image' => 'pan-logo.png'
            ],
            [                               // nomor 13
                'nomor' => 13,
                'name' => 'Partai Bulan bintang',
                'image' => 'pbb-logo.png'
            ],
            [                               // nomor 14
                'nomor' => 14,
                'name' => 'Partai Demoktrat',
                'image' => 'demokrat-logo.png'
            ],
            [                               // nomor 15
                'nomor' => 15,
                'name' => 'Partai Solidaritas Indonesia',
                'image' => 'psi-logo.png'
            ],
            [                               // nomor 16
                'nomor' => 16,
                'name' => 'Partai Perindo',
                'image' => 'perindo-logo.png'
            ],
            [                               // nomor 17
                'nomor' => 17,
                'name' => 'Partai Persatuan Pembangunan',
                'image' => 'ppp-logo.png'
            ],
            [                               // nomor 18
                'nomor' => 18,
                'name' => 'Partai Nanggroe Aceh',
                'image' => 'pna-logo.png'
            ],
            [                               // nomor 19
                'nomor' => 19,
                'name' => 'Partai Generasi Atjeh Beusaboh Tha\'at Dan Taqwa',
                'image' => 'gabthat-logo.png'
            ],
            [                               // nomor 30
                'nomor' => 20,
                'name' => 'Partai Darul Aceh',
                'image' => 'pda-logo.png' 
            ],
            [                               // nomor 21
                'nomor' => 21,
                'name' => 'Partai Aceh',
                'image' => 'partaiaceh-logo.png'
            ],
            [                               // nomor 22
                'nomor' => 22,
                'name' => 'Partai Adil Sejahtera Aceh',
                'image' => 'pas-logo.jpg'
            ],
            [                               // nomor 23
                'nomor' => 23,
                'name' => 'Partai Sira',
                'image' => 'sira-logo.png'
            ],
            [                               // nomor 24
                'nomor' => 24,
                'name' => 'Partai Ummat',
                'image' => 'ummat-logo.png'
            ],

    ];



    public function run(): void
    {
        foreach($this->data as $d){
            Partai::create([
                'nomor' => $d['nomor'],
                'name' => $d['name'],
                'image' => $d['image']
            ]);
        }
    }
}
