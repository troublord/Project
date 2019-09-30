<?php

use Illuminate\Database\Seeder;
use App\Company as CompanyEloquent;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = factory(CompanyEloquent::class, 10)->create();
    }
}
