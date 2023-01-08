<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'Cuci Kering Setrika',
            'slug' => Str::slug('cuci-kering-setrika'),
            'price' => 7000,
            'qty' => 1,
            'type' => 'Kg',
            'body' => 'Mencuci + Mengeringkan + Setrika Baju',
            'category_id' => 1,
        ]);
        Package::create([
            'name' => 'Cuci Kering',
            'slug' => Str::slug('cuci-kering'),
            'price' => 6000,
            'qty' => 1,
            'type' => 'Kg',
            'body' => 'Mencuci + Mengeringkan Baju',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => 'Setrika',
            'slug' => Str::slug('setrika'),
            'price' => 4000,
            'qty' => 1,
            'type' => 'Kg',
            'body' => 'Setrika Saja',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => 'Cuci',
            'slug' => Str::slug('cuci'),
            'price' => 3000,
            'qty' => 1,
            'type' => 'Kg',
            'body' => 'Mencuci Saja',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => 'Bed Cover',
            'slug' => Str::slug('bed-cover'),
            'price' => 25000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Mencuci Bed Cover Saja',
            'category_id' => 3,
        ]);
        Package::create([
            'name' => 'Gorden',
            'slug' => Str::slug('gorden'),
            'price' => 10000,
            'qty' => 1,
            'type' => 'Kg',
            'body' => 'Mencuci Gorden Saja',
            'category_id' => 3,
        ]);
        Package::create([
            'name' => 'Boneka Besar',
            'slug' => Str::slug('boneka-besar'),
            'price' => 25000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Mencuci Boneka Besar Saja',
            'category_id' => 3,
        ]);
        Package::create([
            'name' => 'Boneka Sedang',
            'slug' => Str::slug('boneka-sedang'),
            'price' => 15000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Mencuci Boneka Sedang Saja',
            'category_id' => 3,
        ]);
        Package::create([
            'name' => 'Boneka Kecil',
            'slug' => Str::slug('boneka-kecil'),
            'price' => 10000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Mencuci Boneka Kecil Saja',
            'category_id' => 3,
        ]);
    }
}
