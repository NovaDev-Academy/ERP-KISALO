<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\provincias;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        // provincias::create([
        //     'vc_nome'=>"Luanda",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Benguela",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Huambo",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Cunene",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Malange",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Kwanza Norte",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Kwanza Sul",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Bié",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Cabinda",
        // ]);
        // provincias::create([
        //     'vc_nome'=>"Namibe",
        // ]);

    }
}
