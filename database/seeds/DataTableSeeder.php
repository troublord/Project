<?php

use Illuminate\Database\Seeder;
use App\Customer;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::table('customers')->insert([
            'customer_id'=>str_random()
        ]);
    }
}
///UNDONE BUSINESS