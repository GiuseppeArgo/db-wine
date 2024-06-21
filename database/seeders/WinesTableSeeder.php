<?php

namespace Database\Seeders;

use App\Models\Wine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class WinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $response = Http::get('http://api.sampleapis.com/wines/reds');

        $data = $response->json();
        
        $this->seeder($data);
    }

    public function seeder($data) {

        foreach ($data as $wine) {
            $newWine = new Wine();
            $newWine->winery = $wine['winery'];
            $newWine->wine = $wine['wine'];
            $newWine->type = 'red'; // da cancellare
            $newWine->average = floatval($wine['rating']['average']);
            $newWine->reviews = intval(explode(' ', $wine['rating']['reviews'])[0]);
            $newWine->location = $wine['location'];
            $newWine->image = $wine['image'];
            $newWine->save();
        }
    }
}
