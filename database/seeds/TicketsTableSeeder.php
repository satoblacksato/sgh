<?php

use Illuminate\Database\Seeder;
use SGH\Models\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = factory(Ticket::class)->times(1000)->create();
    }
}
