<?php

namespace Database\Seeders;

use App\Models\Theater;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Theater::factory()->count(10)->create();
        $uciCinemas = [
            
            // ABRUZZO
            [
                'name' => "UCI Luxe Megalo' | Chieti",
                'region' => 'Abruzzo',
                'city' => 'Chieti',
                'address' => "Indirizzo cinema Chieti",
                'phone' => 'Telefono cinema Chieti',
                'email' => 'email@ucicinemas.it',
            ],

            // BASILICATA
            [
                'name' => "UCI Cinemas Red Carpet | Matera",
                'region' => 'Basilicata',
                'city' => 'Matera',
                'address' => "Indirizzo cinema Matera",
                'phone' => 'Telefono cinema Matera',
                'email' => 'email@ucicinemas.it',
            ],

            // CAMPANIA
            [
                'name' => "UCI Cinemas Casoria | Napoli",
                'region' => 'Campania',
                'city' => 'Napoli',
                'address' => "Indirizzo cinema Casoria, Napoli",
                'phone' => 'Telefono cinema Casoria, Napoli',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => "UCI Cinemas Cinepolis Marcianise | Caserta",
                'region' => 'Campania',
                'city' => 'Caserta',
                'address' => "Indirizzo cinema Cinepolis Marcianise, Caserta",
                'phone' => 'Telefono cinema Cinepolis Marcianise, Caserta',
                'email' => 'email@ucicinemas.it',
            ],

             // EMILIA ROMAGNA
            [
                'name' => 'UCI Cinemas Ferrara',
                'region' => 'Emilia Romagna',
                'city' => 'Ferrara',
                'address' => 'Indirizzo cinema Ferrara',
                'phone' => 'Telefono cinema Ferrara',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Meridiana | Bologna',
                'region' => 'Emilia Romagna',
                'city' => 'Bologna',
                'address' => 'Indirizzo cinema Bologna',
                'phone' => 'Telefono cinema Bologna',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Piacenza',
                'region' => 'Emilia Romagna',
                'city' => 'Piacenza',
                'address' => 'Indirizzo cinema Piacenza',
                'phone' => 'Telefono cinema Piacenza',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Reggio Emilia',
                'region' => 'Emilia Romagna',
                'city' => 'Reggio Emilia',
                'address' => 'Indirizzo cinema Reggio Emilia',
                'phone' => 'Telefono cinema Reggio Emilia',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Romagna | Forlì Cesena',
                'region' => 'Emilia Romagna',
                'city' => 'Forlì Cesena',
                'address' => 'Indirizzo cinema Forlì Cesena',
                'phone' => 'Telefono cinema Forlì Cesena',
                'email' => 'email@ucicinemas.it',
            ],

             // FRIULI VENEZIA GIULIA
            [
                'name' => "UCI Cinemas Fiume Veneto | Pordenone",
                'region' => 'Friuli Venezia Giulia',
                'city' => 'Pordenone',
                'address' => "Indirizzo cinema Fiume Veneto, Pordenone",
                'phone' => 'Telefono cinema Fiume Veneto, Pordenone',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => "UCI Cinemas Villesse | Gorizia",
                'region' => 'Friuli Venezia Giulia',
                'city' => 'Gorizia',
                'address' => "Indirizzo cinema Villesse, Gorizia",
                'phone' => 'Telefono cinema Villesse, Gorizia',
                'email' => 'email@ucicinemas.it',
            ],

            // LAZIO
            [
                'name' => 'UCI Cinemas Parco Leonardo | Roma',
                'region' => 'Lazio',
                'city' => 'Roma',
                'address' => 'Indirizzo cinema Roma',
                'phone' => 'Telefono cinema Roma',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Porta di Roma | Roma',
                'region' => 'Lazio',
                'city' => 'Roma',
                'address' => 'Indirizzo cinema Roma',
                'phone' => 'Telefono cinema Roma',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas RomaEst | Roma',
                'region' => 'Lazio',
                'city' => 'Roma',
                'address' => 'Indirizzo cinema Roma',
                'phone' => 'Telefono cinema Roma',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => 'UCI Luxe Maximo | Roma',
                'region' => 'Lazio',
                'city' => 'Roma',
                'address' => 'Indirizzo cinema Roma',
                'phone' => 'Telefono cinema Roma',
                'email' => 'email@ucicinemas.it',
            ],

             // LIGURIA
             [
                'name' => 'UCI Cinemas Fiumara | Genova',
                'region' => 'Liguria',
                'city' => 'Genova',
                'address' => 'Indirizzo cinema Genova',
                'phone' => 'Telefono cinema Genova',
                'email' => 'email@ucicinemas.it',
            ],

            // Lombardia
            [
                'name' => 'UCI Cinemas Bicocca | Milano',
                'region' => 'Lombardia',
                'city' => 'Milano',
                'address' => 'Via Orobia, 200, 20139 Milano MI',
                'phone' => '02 641 7661',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Lissone | Milano',
                'region' => 'Lombardia',
                'city' => 'Milano',
                'address' => 'Centro Commerciale Esselunga, Via Papa Giovanni XXIII, 32, 20851 Lissone MB',
                'phone' => '02 6622 7601',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas MilanoFiori | Milano',
                'region' => 'Lombardia',
                'city' => 'Milano',
                'address' => 'Centro Commerciale MilanoFiori, Via Alcide De Gasperi, 20090 Assago MI',
                'phone' => '02 8928 971',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Pioltello | Milano',
                'region' => 'Lombardia',
                'city' => 'Milano',
                'address' => 'Via Milano, 46, 20096 Pioltello MI',
                'phone' => '02 923 937 1',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Como',
                'region' => 'Lombardia',
                'city' => 'Como',
                'address' => 'Centro Commerciale Monticello, Via Monticello, 22036 Erba CO',
                'phone' => '031 226 661',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Curno | Bergamo',
                'region' => 'Lombardia',
                'city' => 'Bergamo',
                'address' => 'Centro Commerciale Le Due Torri, Via Enrico Mattei, 17, 24035 Curno BG',
                'phone' => '035 460 01',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Orio | Bergamo',
                'region' => 'Lombardia',
                'city' => 'Bergamo',
                'address' => 'Centro Commerciale Oriocenter, Via Portico, 71, 24050 Orio al Serio BG',
                'phone' => '035 421 71',
                'email' => 'info@ucicinemas.it',
            ],

            // Piemonte
            [
                'name' => 'UCI Cinemas Moncalieri | Torino',
                'region' => 'Piemonte',
                'city' => 'Torino',
                'address' => 'Corso Trieste, 11, 10024 Moncalieri TO',
                'phone' => '011 1991 1001',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Torino Lingotto',
                'region' => 'Piemonte',
                'city' => 'Torino',
                'address' => 'Centro Commerciale 8Gallery, Via Nizza, 262, 10126 Torino TO',
                'phone' => '011 663 0611',
                'email' => 'info@ucicinemas.it',
            ],

            // Puglia
            [
                'name' => 'UCI Cinemas Molfetta | Bari',
                'region' => 'Puglia',
                'city' => 'Bari',
                'address' => 'Via dello Shopping, 2, 70056 Molfetta BA',
                'phone' => '080 337 4111',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Seven Gioia del Colle | Bari',
                'region' => 'Puglia',
                'city' => 'Bari',
                'address' => 'Via La Marmora, 70023 Gioia del Colle BA',
                'phone' => '080 348 21 11',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Showville | Bari',
                'region' => 'Puglia',
                'city' => 'Bari',
                'address' => 'Centro Commerciale Showville, S.S. 100 km 18+200, 70132 Bari BA',
                'phone' => '080 600 2111',
                'email' => 'info@ucicinemas.it',
            ],

            // Sicilia
            [
                'name' => 'UCI Cinemas Catania',
                'region' => 'Sicilia',
                'city' => 'Catania',
                'address' => 'Centro Commerciale Katane, Via Leonardo da Vinci, 50, 95125 Catania CT',
                'phone' => '095 736 81 11',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Palermo',
                'region' => 'Sicilia',
                'city' => 'Palermo',
                'address' => 'Viale Croce Rossa, 91100 Palermo PA',
                'phone' => '091 206 11 11',
                'email' => 'info@ucicinemas.it',
            ],

            // Toscana
            [
                'name' => 'UCI Cinemas Arezzo',
                'region' => 'Toscana',
                'city' => 'Arezzo',
                'address' => 'Centro Commerciale Setteponti, Via Setteponti Levante, 620, 52100 Arezzo AR',
                'phone' => '0575 908 311',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Firenze',
                'region' => 'Toscana',
                'city' => 'Firenze',
                'address' => 'Centro Commerciale I Gigli, Via San Quirico, 165, 50013 Campi Bisenzio FI',
                'phone' => '055 896 01',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Luxe Campi Bisenzio',
                'region' => 'Toscana',
                'city' => 'Firenze',
                'address' => 'Centro Commerciale I Gigli, Via San Quirico, 165, 50013 Campi Bisenzio FI',
                'phone' => '055 896 01',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Sinalunga | Siena',
                'region' => 'Toscana',
                'city' => 'Siena',
                'address' => 'Centro Commerciale La Rondinella, Località Rondinella, 53048 Sinalunga SI',
                'phone' => '0577 677 311',
                'email' => 'info@ucicinemas.it',
            ],

            // Trentino-Alto Adige
            [
                'name' => 'UCI Cinemas Bolzano',
                'region' => 'Trentino-Alto Adige',
                'city' => 'Bolzano',
                'address' => 'Via Antonio Rosmini, 19, 39100 Bolzano BZ',
                'phone' => '0471 05 50 85',
                'email' => 'info@ucicinemas.it',
            ],
            [
                'name' => 'UCI Cinemas Bozen',
                'region' => 'Trentino-Alto Adige',
                'city' => 'Bozen',
                'address' => 'Via Antonio Rosmini, 19, 39100 Bolzano BZ',
                'phone' => '0471 05 50 85',
                'email' => 'info@ucicinemas.it',
            ],

            // Umbria
            [
                'name' => 'UCI Cinemas Perugia',
                'region' => 'Umbria',
                'city' => 'Perugia',
                'address' => 'Centro Commerciale Collestrada, Via Collestrada, 20, 06135 Perugia PG',
                'phone' => '075 505 0360',
                'email' => 'info@ucicinemas.it',
            ],

            // VENETO
            [
                'name' => "UCI Luxe Marcon | Venezia",
                'region' => 'Veneto',
                'city' => 'Venezia',
                'address' => "Indirizzo cinema UCI Luxe Marcon, Venezia",
                'phone' => 'Telefono UCI Luxe Marcon, Venezia',
                'email' => 'email@ucicinemas.it',
            ],
            [
                'name' => "UCI Luxe Palladio | Vicenza",
                'region' => 'Veneto',
                'city' => 'Vicenza',
                'address' => "Indirizzo cinema UCI Luxe Palladio, Vicenza",
                'phone' => 'Telefono UCI Luxe Palladio, Vicenza',
                'email' => 'email@ucicinemas.it',
            ],
        ];
        
        foreach ($uciCinemas as $uciCinema) {
            Theater::create($uciCinema);
        }
    }
}
