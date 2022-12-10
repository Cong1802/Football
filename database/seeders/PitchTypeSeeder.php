<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class PitchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('tbl_type')->insert([
                'type_name' => '5',
                'type_time' => time(),
            ]);
        }catch (\Exception $exception){
            Log::error("[Seed Admin]". $exception->getMessage());
        }
    }
}
