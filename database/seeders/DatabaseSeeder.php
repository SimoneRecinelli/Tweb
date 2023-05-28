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

        [   'NomeAzienda' => 'Nike',
            'Sede' => 'Beaverton, Oregon',
            'Tipologia' => 'Moda',
            'RagioneSociale' => 'Nike Inc.',
            'image' => 'nike.png',
            'Descrizione' => "Nike è un'azienda leader nel settore della moda e degli articoli sportivi. Offre una vasta
             gamma di prodotti, tra cui abbigliamento, calzature e accessori, che uniscono stile e funzionalità.
             Con un'impronta globale, Nike è riconosciuta per la sua qualità e innovazione nel mondo dello sport e della
             moda.",
        ],

        [   'NomeAzienda' => 'Apple',
            'Sede' => 'Cupertino, California',
            'Tipologia' => 'Tecnologia',
            'RagioneSociale' => 'Apple Inc.',
            'image' => 'apple.png',
            'Descrizione' => "Apple è un'azienda di fama mondiale che opera nel settore tecnologico. È nota per la 
             progettazione e la produzione di dispositivi elettronici innovativi, come iPhone, iPad, Mac e Apple Watch, 
             oltre a fornire servizi come App Store, iCloud e Apple Music. Apple si distingue per il suo design elegante,
             l'interfaccia utente intuitiva e l'ecosistema integrato.",

        ],

        [   'NomeAzienda' => 'Amazon',
            'Sede' => 'Seattle, Washington',
            'Tipologia' => 'E-commerce',
            'RagioneSociale' => 'Amazon.com, Inc.',
            'image' => 'amazon.png',
            'Descrizione' => "Amazon è un'azienda leader nel settore dell'e-commerce e dei servizi online.
            Offre una vasta gamma di prodotti, tra cui libri, elettronica, abbigliamento, articoli per la casa e molto
            altro. Amazon è conosciuta per la sua piattaforma di vendita online, la consegna veloce e affidabile e una 
            vasta selezione di prodotti provenienti da tutto il mondo.",
        ],

        [   'NomeAzienda' => 'Fashion Trend',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'E-commerce',
            'RagioneSociale' => 'Fashion Trend Srl',
            'image' => 'fashion_trend.png',
            'Descrizione' => "Fashion Trend è un'azienda di moda online specializzata nell'offrire le ultime tendenze
            di abbigliamento, calzature e accessori per uomo e donna. Con una curata selezione di marchi e prodotti 
            di alta qualità, Fashion Trend si impegna a offrire ai suoi clienti un'esperienza di shopping conveniente 
            e alla moda.",

        ],
        [   'NomeAzienda' => 'Douglas',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'E-commerce',
            'RagioneSociale' => 'Beauty Cosmetics Srl',
            'image' => 'douglas.png',
            'Descrizione' => "Douglas è un'azienda specializzata in prodotti cosmetici e di bellezza. Offre 
            una vasta gamma di marchi e prodotti per la cura della pelle, il trucco, i capelli e il benessere personale.
             Beauty Cosmetics si impegna a offrire prodotti di alta qualità e a soddisfare le esigenze dei clienti per 
             migliorare la loro bellezza e il loro benessere.",
        ],

        [   'NomeAzienda' => 'City Explorers',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'E-commerce',
            'RagioneSociale' => 'City Explorers Srl',
            'image' => 'city_explorers.png',
            'Descrizione' => "City Explorers è un'azienda che si occupa di turismo e viaggi. Offre esperienze e servizi 
            di viaggio unici, come tour guidati, attività emozionanti e pacchetti vacanza personalizzati per scoprire le
             città e le destinazioni più affascinanti in tutto il mondo. City Explorers si impegna a offrire esperienze 
             indimenticabili ai suoi clienti, permettendo loro di esplorare nuovi luoghi e scoprire culture diverse.",
        ]


    ]);



    DB::table('Offerte')->insert([
        ['Categoria'=>'Animali',
            'DescrizioneOfferta'=> "Il tiragraffi per gatto è un prodotto essenziale per tutti i proprietari di gatti. 
             Questi tiragraffi sono progettati per offrire al tuo felino un'alternativa sicura e divertente per graffiare, mantenendo al contempo le unghie del tuo gatto in buone condizioni. 
             Realizzati con materiali resistenti e durevoli, i tiragraffi per gatti offrono diverse superfici e altezze su cui il tuo amico a quattro zampe può arrampicarsi e affilare le unghie. 
             Con l'uso di un coupon, puoi ottenere un ottimo affare su un tiragraffi per gatto di alta qualità, offrendo al tuo animale domestico una superficie apposita e risparmiando allo stesso tempo.",
            'Scadenza'=>'2023/05/20',
            'Oggetto'=>'Tiragraffi per gatto',
            'NomeAzienda'=>'Amazon',
            'Prezzo'=>160,
            'PercentualeSconto'=>'10',
            'Luogo'=>'Negozio fisico',
            'Modalità'=>'Utilizzo online',
            'Evidenza'=>'no',
            'image' => 'Tiragraffi.png'],

        ['Categoria'=>'Elettronica',
         'DescrizioneOfferta'=> "L'iPad 5 è una delle ultime generazioni di tablet di Apple. Dotato di un display ad
          alta risoluzione e di prestazioni potenti, l'iPad 5 offre una vasta gamma di funzionalità che lo rendono ideale
          per l'intrattenimento, la produttività e molto altro ancora. Puoi utilizzare l'iPad 5 per navigare su Internet,
          guardare film, leggere libri, giocare a giochi e persino lavorare su documenti o progetti creativi.
          Con un coupon, puoi ottenere uno sconto su questo dispositivo di fascia alta, consentendoti di godere di tutte
          le sue caratteristiche senza dover spendere il prezzo pieno.",
         'Scadenza'=>'2025/10/20',
         'Oggetto'=>'Ipad 5',
         'NomeAzienda'=>'Apple',
         'Prezzo'=>1200,
         'PercentualeSconto'=>'40',
         'Luogo'=>'Negozio fisico',
         'Modalità'=>'Utilizzo una sola volta',
         'Evidenza'=>'no',
         'image' => 'ipad2022.png'],

        ['Categoria'=>'Elettronica',
         'DescrizioneOfferta'=> "L'iPhone 13 è l'ultimo modello di smartphone di Apple, noto per le sue avanzate funzionalità 
         e il design elegante. Questo telefono offre prestazioni di alta qualità, una fotocamera eccezionale, una durata
          della batteria migliorata e una serie di altre caratteristiche innovative. Con l'iPhone 13, puoi scattare foto
           straordinarie, registrare video di alta qualità, accedere a una vasta gamma di app e goderti un'esperienza di
            navigazione fluida. Applicando un coupon, puoi ottenere uno sconto sull'iPhone 13, permettendoti di possedere
             uno dei migliori smartphone disponibili sul mercato a un prezzo più conveniente.",
         'Scadenza'=>'2023/05/28',
         'Oggetto'=>'Iphone 13',
         'NomeAzienda'=>'Apple',
         'Prezzo'=>1400,
         'PercentualeSconto'=>'50',
         'Luogo'=>'Telefono o chiamata',
         'Modalità'=>'Utilizzo limitato nel tempo',
         'Evidenza'=>'si',
         'image' =>'iphone13.png'],

        ['Categoria'=>'Abbigliamento',
         'DescrizioneOfferta'=> "Le Air Force 1 sono famose scarpe da ginnastica prodotte da Nike. Questi iconici modelli
          offrono un design classico e senza tempo, che si è guadagnato un posto speciale nella cultura sneaker. Le Air 
          Force 1 presentano un'ammortizzazione eccellente, una tomaia resistente e una suola antiscivolo, che le rendono
           perfette per l'uso quotidiano o per l'attività sportiva. Con l'applicazione di un coupon, puoi ottenere uno 
           sconto sulle Air Force 1, consentendoti di sfoggiare un paio di scarpe di alta qualità a un prezzo più conveniente.",
         'Scadenza'=>'2023/06/25',
         'Oggetto'=>'Air Force 1',
         'NomeAzienda'=>'Nike',
         'Prezzo'=>1230,
         'PercentualeSconto'=>'60',
         'Luogo'=>'Evento',
         'Modalità'=>'Utilizzo online',
        'Evidenza'=>'si',
        'image' => 'AirForce.png'],

        ['Categoria'=>'Abbigliamento',
            'DescrizioneOfferta'=> 'Aggiungi un tocco di stile retrò al tuo guardaroba con questa t-shirt stile vintage.
             Realizzata con tessuto di alta qualità e stampa vintage ispirata agli anni \'80, questa t-shirt è perfetta 
             per un look casual ma alla moda. Con uno sconto del 30%, puoi portare a casa questa t-shirt unica e distintiva
              a un prezzo conveniente. Non perdere l\'opportunità di esprimere il tuo stile personale con questa offerta
               limitata nel tempo.',
            'Scadenza'=>'2023/07/15',
            'Oggetto'=>'T-Shirt Stile Vintage',
            'NomeAzienda'=>'Fashion Trend',
            'Prezzo'=>50,
            'PercentualeSconto'=>'30',
            'Luogo'=>'Negozio fisico',
            'Modalità'=>'Acquisto in negozio o online',
            'Evidenza'=>'no',
            'image' => 'tshirt_vintage.png'],

        ['Categoria'=>'Bellezza',
            'DescrizioneOfferta'=> 'Crea look di trucco impeccabili con questo set di pennelli professionali. Realizzati con setole morbide e di alta qualità, questi pennelli sono ideali per applicare fondotinta, ombretto, blush e altri prodotti per il trucco. Grazie al coupon speciale, puoi ottenere questo set di pennelli a un prezzo scontato. Aggiungi questi pennelli alla tua routine di trucco e ottieni risultati sorprendenti ogni volta.',
            'Scadenza'=>'2023/08/10',
            'Oggetto'=>'Set di Pennelli per il Trucco',
            'NomeAzienda'=>'Douglas',
            'Prezzo'=>80,
            'PercentualeSconto'=>'20',
            'Luogo'=>'Acquisto online',
            'Modalità'=>'Utilizzo online',
            'Evidenza'=>'si',
            'image' => 'pennelli_trucco.png'],

        ['Categoria'=>'Esperienze',
            'DescrizioneOfferta'=> 'Esplora la tua città in modo unico con un tour guidato appassionante. Scopri i luoghi storici, le attrazioni principali e le storie nascoste che rendono questa città così affascinante. Con questa offerta speciale, puoi partecipare a un tour guidato a un prezzo scontato. Prenota ora e vivi un\'esperienza indimenticabile mentre scopri i segreti della tua città.',
            'Scadenza'=>'2023/09/05',
            'Oggetto'=>'Tour Guidato della Città',
            'NomeAzienda'=>'City Explorers',
            'Prezzo'=>120,
            'PercentualeSconto'=>'15',
            'Luogo'=>'Punto di partenza specifico',
            'Modalità'=>'Acquisto online e prenotazione',
            'Evidenza'=>'no',
            'image' => 'tour_citta.png']

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
            'id' => '1',
            'idOfferta' => '4',
            'codice' => '1234567890',
        ]
        ]);

}
}
