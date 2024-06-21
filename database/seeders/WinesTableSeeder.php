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
        $this->WinesType('http://api.sampleapis.com/wines/reds', 'red');

        $this->WinesType('http://api.sampleapis.com/wines/whites', 'white');

        $this->WinesType('http://api.sampleapis.com/wines/sparkling', 'sparkling');

        $this->WinesType('http://api.sampleapis.com/wines/rose', 'rose');
        
        $this->WinesType('http://api.sampleapis.com/wines/dessert', 'dessert');
        
        $this->WinesType('http://api.sampleapis.com/wines/port', 'port');
        
    }

    public function seeder(Wine $newWine, $wine)
    {
        $newWine->winery = $wine['winery'];
        $newWine->wine = $wine['wine'];
        $newWine->average = floatval($wine['rating']['average']);
        $newWine->reviews = intval(explode(' ', $wine['rating']['reviews'])[0]);
        $newWine->location = $wine['location'];
        $newWine->image = $wine['image'];
        return $newWine;
    }

    public function WinesType(string $urlApi, string $type)
    {
        $response = Http::withUrlParameters([
            'verify' => false
        ])->get($urlApi);

        $wines = $response->json();
        foreach ($wines as $wine) {
            $newWine = new Wine();
            $newwine = $this->seeder($newWine, $wine);
            $newWine->type = $type;
            // dd($newWine);
            $newwine->save();
        }
    }
}
