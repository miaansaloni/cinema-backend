<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use App\Models\DiscountCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ottieni tutte le prenotazioni
        $reservations = Reservation::all();

        // Cicla su ogni prenotazione e crea un biglietto
        foreach ($reservations as $reservation) {
            // Calcola il prezzo base (può essere calcolato in base alla logica del tuo sistema)
            $basePrice = 20.00; // Esempio di prezzo base fisso

            // Scegli un eventuale sconto casuale
            $discountId = null;
            if (rand(0, 1) == 1) { // 50% di probabilità di applicare uno sconto
                $discount = DiscountCategory::inRandomOrder()->first();
                $discountId = $discount->id;
                $finalPrice = $basePrice * (1 - ($discount->discount_percentage / 100));
            } else {
                $finalPrice = $basePrice;
            }

            // Creazione del biglietto
            Ticket::create([
                'reservation_id' => $reservation->id,
                'base_price' => $basePrice,
                'discount_id' => $discountId,
                'final_price' => $finalPrice,
                'purchase_date' => Carbon::now(),
            ]);
        }
    }
}