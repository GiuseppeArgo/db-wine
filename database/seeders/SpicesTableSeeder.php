<?php

namespace Database\Seeders;

use App\Models\Spice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
    $aromi = [
    "ciliegia",
    "fragola",
    "lampone",
    "mora",
    "ribes",
    "prugna",
    "mirtillo",
    "more",
    "amarena",
    "pesca",
    "albicocca",
    "mela gialla",
    "pera",
    "ananas",
    "mango",
    "banana",
    "papaya",
    "rosa",
    "gelsomino",
    "violetta",
    "fiore darancio",
    "lavanda",
    "pepe",
    "vaniglia",
    "chiodi di garofano",
    "cannella",
    "noce moscata",
    "menta",
    "basilico",
    "eucalipto",
    "timo",
    "salvia",
    "grafite",
    "pietra focaia",
    "gesso",
    "calcare",
    "caffè",
    "cioccolato",
    "cacao",
    "caramello",
    "pane tostato",
    "cuoio",
    "tabacco",
    "catrame",
    "miele",
    "nocciola"
        ];

        foreach ($aromi as $aroma) {
            $newSpice = new Spice();
            $newSpice->name = $aroma;
            $newSpice->save();
        }
    }
}
