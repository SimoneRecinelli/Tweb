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

        [   'NomeAzienda' => 'Zalando',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'E-commerce',
            'RagioneSociale' => 'Zalando Srl',
            'image' => 'zalando.png',
            'Descrizione' => "Zalando è una nota piattaforma di e-commerce specializzata nella vendita di abbigliamento, calzature, accessori 
            e prodotti di moda per uomo, donna e bambino. Fondata nel 2008 in Germania, Zalando è diventata uno dei principali rivenditori online di moda in Europa.",

        ],
        [   'NomeAzienda' => 'Douglas',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'Cosmetica',
            'RagioneSociale' => 'Douglas Srl',
            'image' => 'douglaslogo.png',
            'Descrizione' => "Douglas è un'azienda specializzata in prodotti cosmetici e di bellezza. Offre 
             una vasta gamma di marchi e prodotti per la cura della pelle, il trucco, i capelli e il benessere personale.
             Douglas si impegna a offrire prodotti di alta qualità e a soddisfare le esigenze dei clienti per 
             migliorare la loro bellezza e il loro benessere.",
        ],

        [   'NomeAzienda' => 'City Explorers',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'E commerce',
            'RagioneSociale' => 'City Explorers Srl',
            'image' => 'city_explorers.png',
            'Descrizione' => "City Explorers è un'azienda che si occupa di turismo e viaggi. Offre esperienze e servizi 
             di viaggio unici, come tour guidati, attività emozionanti e pacchetti vacanza personalizzati per scoprire le
             città e le destinazioni più affascinanti in tutto il mondo. City Explorers si impegna a offrire esperienze 
             indimenticabili ai suoi clienti, permettendo loro di esplorare nuovi luoghi e scoprire culture diverse.",
        ],


        [   'NomeAzienda' => 'Burger King',
            'Sede' => 'Ancona, Italia',
            'Tipologia' => 'Ristorazione',
            'RagioneSociale' => 'BurgerKing spa.',
            'image' => 'burgerking.png',
            'Descrizione' => "Burger King è una famosa catena di fast food specializzata in hamburger e cibi veloci. 
            Fondata nel 1954 negli Stati Uniti, Burger King è diventato un marchio internazionale con numerosi ristoranti presenti in tutto il mondo.",
    ],

        [   'NomeAzienda' => 'MSI',
            'Sede' => 'Redmond, Usa',
            'Tipologia' => 'Tecnologia',
            'RagioneSociale' => 'MSI spa.',
            'image' => 'MSI.png',
            'Descrizione' => "MSI (Micro-Star International) è un'azienda leader nel settore della produzione di componenti hardware 
             e dispositivi per il gaming e l'informatica. Fondata nel 1986, MSI ha guadagnato una solida reputazione per la produzione di schede madri, 
             schede grafiche, laptop, desktop, monitor e altri prodotti correlati.",
        ],




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
         'Prezzo'=>120,
         'PercentualeSconto'=>'30',
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
            'NomeAzienda'=>'Zalando',
            'Prezzo'=>50,
            'PercentualeSconto'=>'30',
            'Luogo'=>'Negozio fisico',
            'Modalità'=>'Acquisto in negozio o online',
            'Evidenza'=>'no',
            'image' => 'T-shirt Vintage.png'],

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
            'image' => 'pennello-trucco.png'],

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
            'image' => 'tour_citta.png'],

            
        [   'Categoria'=>'Abbigliamento',
            'DescrizioneOfferta'=> 'Una sola parola: tradizione. Icona del running, poi fenomeno della moda e infine star del cinema: con il suo fascino rétro, intersuola morbida come una spugna e i dettagli ondulati, Cortez continua a collezionare successi, decennio dopo decennio. Questa nuova versione del look onnipresente ne accentua il carattere vintage con elementi in suede e brand rétro. Il Verde Green e il Sail (tipica combinazione di colori dello stile college) offrono un tocco sportivo, mentre il battistrada in gomma completa il look.',
            'Scadenza'=>'2025/06/11',
            'Oggetto'=>'Nike Cortez',
            'NomeAzienda'=>'Nike',
            'Prezzo'=>100,
            'PercentualeSconto'=>'15',
            'Luogo'=>'Acquisto online',
            'Modalità'=>'Utilizzo online',
            'Evidenza'=>'si',
            'image' => 'nike-cortez.png'],

            ['Categoria'=>'Elettronica',
            'DescrizioneOfferta'=> "Apple M2 con CPU 8‑core, GPU 10‑core e Neural Engine 16‑core 8GB di memoria unificata Unità SSD da 256GB Gigabit Ethernet Due porte Thunderbolt 4, porta HDMI, due porte USB‑A, jack cuffie",
            'Scadenza'=>'2023/09/28',
            'Oggetto'=>'Mac Mini',
            'NomeAzienda'=>'Apple',
            'Prezzo'=>750,
            'PercentualeSconto'=>'15',
            'Luogo'=>'Telefono o chiamata',
            'Modalità'=>'Utilizzo limitato nel tempo',
            'Evidenza'=>'si',
            'image' =>'mac-mini.png'],

            
            ['Categoria'=>'Alimentare',
            'DescrizioneOfferta'=> "Triplo hamburger di carne, formaggio fuso, bacon, senape e ketchup.",
            'Scadenza'=>'2023/07/05',
            'Oggetto'=>'Menu Double Cheese',
            'NomeAzienda'=>'Burger King',
            'Prezzo'=>7,
            'PercentualeSconto'=>'15',
            'Luogo'=>'Fisico',
            'Modalità'=>'Una volta sola',
            'Evidenza'=>'no',
            'image' =>'menuburgerCheese.png'],

            ['Categoria'=>'Alimentare',
            'DescrizioneOfferta'=> "hamburger di carne vegana, formaggio fuso, bacon, cetriolini, senape e ketchup.",
            'Scadenza'=>'2023/11/30',
            'Oggetto'=>'Burger Veggie',
            'NomeAzienda'=>'Burger King',
            'Prezzo'=>8,
            'PercentualeSconto'=>'15',
            'Luogo'=>'Fisico',
            'Modalità'=>'Una volta sola',
            'Evidenza'=>'no',
            'image' =>'menuburgerVeggie.png'],

            ['Categoria'=>'Elettronica',
            'DescrizioneOfferta'=> "Notebook MSI Raider GE78HX 13VH-068IT 17″ QHD+, i9-13950HX, DDR5 32GB*2, RTX 4080, 2TB SSD, Windows11 Pro",
            'Scadenza'=>'2023/10/28',
            'Oggetto'=>'MSI Raider',
            'NomeAzienda'=>'MSI',
            'Prezzo'=>1750,
            'PercentualeSconto'=>'25',
            'Luogo'=>'Fisico',
            'Modalità'=>'Una volta sola',
            'Evidenza'=>'si',
            'image' =>'MSI-Raider.png'],




    ]);

    DB::table('users')->insert([
        [
            'cognome' => 'UserCognome',
            'email' => 'user@gmail.com',
            'eta' => 22,
            'genere' => 'Uomo',
            'role' => 'user',
            'nome' => 'userNome',
            'password' => Hash::make('mqtSVfs3'),
            'residenza' => 'Ancona',
            'telefono' => '0123456789',
            'username' => 'useruser',
        ],
        [
            'cognome' => 'StaffCognome',
            'email' => 'staff@gmail.com',
            'eta' => 32,
            'genere' => 'Uomo',
            'role' => 'staff',
            'nome' => 'StaffNome',
            'password' => Hash::make('mqtSVfs3'),
            'residenza' => 'Martinsicuro',
            'telefono' => '0123456789',
            'username' => 'staffstaff',
        ],
        [
            'cognome' => 'AdminCognome',
            'email' => 'admin@gmail.com',
            'eta' => 42,
            'genere' => 'Uomo',
            'role' => 'admin',
            'nome' => 'AdminNome',
            'password' => Hash::make('mqtSVfs3'),
            'residenza' => 'Ancona',
            'telefono' => '0123456789',
            'username' => 'adminadmin',
        ],
        
    ]);

    DB::table('Faqs')->insert([
        ['Domanda'=>"Che cos'è un sito di coupons?",
        'Risposta'=>"Un sito di coupons è una piattaforma online che offre codici promozionali e offerte speciali per 
        consentire agli utenti di ottenere sconti su prodotti o servizi presso determinati negozi o aziende."],

        ['Domanda'=>'Come funziona il sito di coupons?',
        'Risposta'=>"Il sito di coupons raccoglie e pubblica una vasta gamma di offerte e codici promozionali 
        provenienti da vari negozi e marchi. Gli utenti possono visitare il sito, cercare le offerte che desiderano
         e utilizzare i codici promozionali durante l'acquisto per ottenere lo sconto o l'offerta speciale."],

        ['Domanda'=>'Quali tipi di coupons posso trovare su questo sito?',
            'Risposta'=>"Sul nostro sito di coupons, puoi trovare una varietà di offerte, tra cui sconti percentuali, 
            coupon per la spedizione gratuita, promozioni e molto altro ancora. Le offerte possono essere disponibili 
            per diversi settori, come moda, elettronica, viaggi, ristoranti e altro ancora."],

        ['Domanda'=>'I coupons su questo sito sono gratuiti?',
            'Risposta'=>"Cerchiamo di mantenere tutte le offerte e i coupons sul nostro sito il più aggiornati possibile.
             Tuttavia, le offerte potrebbero essere soggette a modifiche o terminare senza preavviso. Per assicurarti di
              ottenere il miglior affare, ti consigliamo di utilizzare l'offerta o il coupon il prima possibile dopo 
              averlo trovato."],

        ['Domanda'=>'Cosa devo fare se un coupon non funziona?',
            'Risposta'=>"Se riscontri problemi con un coupon, controlla attentamente i dettagli e i requisiti dell'offerta.
             Assicurati di inserire correttamente il codice promozionale e verifica che l'offerta non sia scaduta. 
             Se il problema persiste, ti consigliamo di contattarci direttamente o di contattare l'assistenza del negozio
              specifico per ulteriori assistenza."],
    ]);
}
}
