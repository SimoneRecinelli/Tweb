<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = '<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p><p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.</p>';

    public function run() {




 /*       DB::table('category')->insert([
            ['catId' => 1, 'name' => 'Computer', 'parId' => 0, 'desc' => 'Desktop, Laptop, Netbook'],
            ['catId' => 2, 'name' => 'Periferiche', 'parId' => 0, 'desc' => 'Hard Disk, Tastiere, Mouse'],
            ['catId' => 3, 'name' => 'Desktop', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Desktop'],
            ['catId' => 4, 'name' => 'Laptop', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Laptop'],
            ['catId' => 5, 'name' => 'NetBook', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Netbook'],
            ['catId' => 6, 'name' => 'HardDisk', 'parId' => 2, 'desc' => 'Descrizione dei Dischi Rigidi'],
        ]);

        DB::table('product')->insert([
            ['name' => 'NetBook Modello2', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook2', 'descLong' => self::DESCPROD,
                'price' => 219.34, 'discountPerc' => 12, 'discounted' => 0, 'image' => ''],
            ['name' => 'HardDisk Modello2', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk2', 'descLong' => self::DESCPROD,
                'price' => 86.37, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Italy.gif'],
            ['name' => 'Desktop Modello1', 'catId' => 3,
                'descShort' => 'Caratteristiche Desktop1', 'descLong' => self::DESCPROD,
                'price' => 1230.49, 'discountPerc' => 25, 'discounted' => 1, 'image' => 'Brazil.gif'],
            ['name' => 'Laptop Modello1', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 455.37, 'discountPerc' => 17, 'discounted' => 1, 'image' => ''],
            ['name' => 'Laptop Modello2', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 1889.67, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Argentina.gif'],
            ['name' => 'Netbook Modello3', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook3', 'descLong' => self::DESCPROD,
                'price' => 259.99, 'discountPerc' => 17, 'discounted' => 0, 'image' => 'Red Apple.gif'],
            ['name' => 'Laptop Modello3', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop3', 'descLong' => self::DESCPROD,
                'price' => 998.99, 'discountPerc' => 23, 'discounted' => 1, 'image' => 'UK.gif'],
            ['name' => 'HardDisk Modello1', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk1', 'descLong' => self::DESCPROD,
                'price' => 88.93, 'discountPerc' => 5, 'discounted' => 0, 'image' => 'USA.gif'],
            ['name' => 'HardDisk Modello4', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk4', 'descLong' => self::DESCPROD,
                'price' => 78.66, 'discountPerc' => 7, 'discounted' => 01, 'image' => 'Ukraine.gif']
        ]);

        DB::table('users')->insert([
            ['name' => 'Alex', 'surname' => 'Verdi', 'email' => 'alex@verdi.it', 'username' => 'alexalex',
                'password' => Hash::make('alexalex'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Marco', 'surname' => 'Bianchi', 'email' => 'marco@bianchi.it', 'username' => 'useruser',
                'password' => Hash::make('useruser'), 'role' => 'user', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Mario', 'surname' => 'Rossi', 'email' => 'mario@rossi.it', 'username' => 'adminadmin',
                'password' => Hash::make('adminadmin'), 'role' => 'admin', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
        ]);
    }*/
    


    DB::table('Aziende')->insert([
        [
            'NomeAzienda' => 'Nike',
            'Sede' => 'Polverigi',
            'Tipologia' => 'e-commerce',
            'RagioneSociale' => 'jhwfhewg743',
            'image' => 'nike.png',

        ],
        [
            'NomeAzienda' => 'Apple',
            'Sede' => 'Polverigi',
            'Tipologia' => 'sport',
            'RagioneSociale' => 'vrt73',
            'image' => 'apple.png',

        ],

        [
            'NomeAzienda' => 'Amazon',
            'Sede' => 'Martinsicuro',
            'Tipologia' => 'sport',
            'RagioneSociale' => 'jhwfhewg7453',
            'image' => 'amazon.png',

        ],

        [
            'NomeAzienda' => 'Ebay',
            'Sede' => 'Ancona',
            'Tipologia' => 'e-commerce',
            'RagioneSociale' => 'jhwfhewg7487983',
            'image' => '',


        ]


    ]);



    DB::table('Offerte')->insert([
        ['Categoria'=>'Animali',
        'DescrizioneOfferta'=> '...',
        'Scadenza'=>'20/07/2023',
        'Oggetto'=>'Tiragraffi per gatto',
        'NomeAzienda'=>'Amazon',
        'Prezzo'=>160,
        'PercentualeSconto'=>'10',
        'Luogo'=>'Negozio fisico',
        'Modalità'=>'Utilizzo online',
        'Evidenza'=>'no',
        'image' => 'Tiragraffi.png'],

        ['Categoria'=>'Elettronica',
         'DescrizioneOfferta'=> '...',
         'Scadenza'=>'20/10/2025',
         'Oggetto'=>'Ipad 5',
         'NomeAzienda'=>'Apple',
         'Prezzo'=>1200,
         'PercentualeSconto'=>'40',
         'Luogo'=>'Negozio fisico',
         'Modalità'=>'Utilizzo una sola volta',
         'Evidenza'=>'no',
         'image' => 'ipad2022.png'],

        ['Categoria'=>'Elettronica',
         'DescrizioneOfferta'=> '...',
         'Scadenza'=>'28/05/2023',
         'Oggetto'=>'Iphone 13',
         'NomeAzienda'=>'Apple',
         'Prezzo'=>1400,
         'PercentualeSconto'=>'50',
         'Luogo'=>'Telefono o chiamata',
         'Modalità'=>'Utilizzo limitato nel tempo',
         'Evidenza'=>'sì',
         'image' =>'iphone13.png'],

        ['Categoria'=>'Abbigliamento',
         'DescrizioneOfferta'=> '...',
         'Scadenza'=>'25/05/2023',
         'Oggetto'=>'Air Force 1',
         'NomeAzienda'=>'Nike',
         'Prezzo'=>1230,
         'PercentualeSconto'=>'60',
         'Luogo'=>'Evento',
         'Modalità'=>'Utilizzo online',
        'Evidenza'=>'sì',
        'image' => 'AirForce.png'],

        
    ]);

    DB::table('users')->insert([
        [
            'cognome' => 'Recinelli',
            'email' => 's@gmail.com',
            'eta' => 22,
            'genere' => 'Uomo',
            'role' => 'user',
            'nome' => 'Simone',
            'password' => Hash::make('14'),
            'possibilità_abbinamento' => 0,
            'residenza' => 'Roseto',
            'telefono' => '3409139863',
            'username' => 'simone',
        ],
        [
            'cognome' => 'Staff',
            'email' => 'membro@gmail.com',
            'eta' => 32,
            'genere' => 'Uomo',
            'role' => 'staff',
            'nome' => 'Membro',
            'password' => Hash::make('14'),
            'possibilità_abbinamento' => 1,
            'residenza' => 'Martinsicuro',
            'telefono' => '3758492345',
            'username' => 'membrostaff',
        ],
        [
            'cognome' => 'prova',
            'email' => 'admin@gmail.com',
            'eta' => 42,
            'genere' => 'Uomo',
            'role' => 'admin',
            'nome' => 'prova',
            'password' => Hash::make('14'),
            'possibilità_abbinamento' => 0,
            'residenza' => 'Ancona',
            'telefono' => '3409139863',
            'username' => 'admin',
        ],
        [
            'cognome' => 'Staff',
            'email' => 'membro@gmail.com',
            'eta' => 32,
            'genere' => 'Uomo',
            'role' => 'user',
            'nome' => 'Diego',
            'password' => Hash::make('11'),
            'possibilità_abbinamento' => 1,
            'residenza' => 'Martinsicuro',
            'telefono' => '3758492345',
            'username' => 'dieghez',
        ],
        [
            'cognome' => 'Provaaaaaaa',
            'email' => 'membro@gmail.com',
            'eta' => 32,
            'genere' => 'Uomo',
            'role' => 'staff',
            'nome' => 'Diego',
            'password' => Hash::make('11'),
            'possibilità_abbinamento' => 1,
            'residenza' => 'Ancona',
            'telefono' => '3758492345',
            'username' => 'dieghezstaff',
        ]
    ]);

    DB::table('Faqs')->insert([
        ['Domanda'=>'come stai?',
        'Risposta'=>'bene'],

        ['Domanda'=>'prova',
        'Risposta'=>'prova'],
    ]);

    
    DB::table('Coupons')->insert([
        [
            'Combinazione' => '...',
            'id' => '2',
            'idOfferta' => '4',
            'codice' => '1234567890',
        ]
        ]);

}
}
