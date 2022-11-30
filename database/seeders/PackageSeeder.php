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
        // Kategori ke 1
        Package::create([
            'name' => 'Deep Cleaning / Dry Cleaning',
            'slug' => Str::slug('deep-cleaning-or-dry-cleaning'),
            'price' => 7000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Pembersihan baju atau cuci kering di hanger',
            'category_id' => 1,
        ]);
        Package::create([
            'name' => 'Deep Cleaning',
            'slug' => Str::slug('deep-cleaning'),
            'price' => 5000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Pakaian 1 pcs / 1 pack dilipat menggunakan karton punggung',
            'category_id' => 1,
        ]);
        Package::create([
            'name' => 'Kiloan Premium',
            'slug' => Str::slug('kiloan-premium'),
            'price' => 10000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Laundry Kiloan',
            'category_id' => 1,
        ]);
        Package::create([
            'name' => 'KK 20',
            'slug' => Str::slug('kk-20'),
            'price' => 10000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Bed cover dan Sejenisnya',
            'category_id' => 1,
        ]);
        Package::create([
            'name' => 'KK 25',
            'slug' => Str::slug('kk-25'),
            'price' => 15000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Karpet dan Sejenisnya',
            'category_id' => 1,
        ]);
        Package::create([
            'name' => 'KK 50',
            'slug' => Str::slug('kk-50'),
            'price' => 20000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Spotting Noda',
            'category_id' => 1,
        ]);
        // Kategori ke 2
        Package::create([
            'name' => '3 Jam',
            'slug' => Str::slug('3-jam'),
            'price' => 30000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Selesai dalam waktu 3 Jam',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => '6 Jam',
            'slug' => Str::slug('6-jam'),
            'price' => 25000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Selesai dalam waktu 6 Jam',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => '12 Jam',
            'slug' => Str::slug('12-jam'),
            'price' => 20000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Selesai dalam waktu 12 Jam',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => '1 Hari',
            'slug' => Str::slug('1-hari'),
            'price' => 15000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Selesai dalam waktu 1 Hari',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => '2 Hari',
            'slug' => Str::slug('2-hari'),
            'price' => 12000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Selesai dalam waktu 2 Hari',
            'category_id' => 2,
        ]);
        Package::create([
            'name' => '3 Hari',
            'slug' => Str::slug('3-hari'),
            'price' => 10000,
            'qty' => 1,
            'type' => 'KG',
            'body' => 'Selesai dalam waktu 3 Hari',
            'category_id' => 2,
        ]);
        // Kategori ke 3
        Package::create([
            'name' => 'Ironing Clothes',
            'slug' => Str::slug('ironing-clothes'),
            'price' => 10000,
            'qty' => 1,
            'type' => 'Pcs',
            'body' => 'Setrika baju di hanger',
            'category_id' => 1,
        ]);
    }
}
