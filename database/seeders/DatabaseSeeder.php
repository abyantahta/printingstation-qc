<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Line;
use App\Models\Piclabel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Piclabel::factory()->create([
            'name'=> "Abyan Tahta",
            'npk'=> 18240489,
            'uniqueCode'=> 'Poporemo'
        ]);

        Line::factory()->create([
            'line_name'=>"ASSY 1"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY 2"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY 3"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY-05 (D26)"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY-05 (D14)"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY-05 (D55)"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY-05 (D74)"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY-05 (D03)"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY-05 (3M0A)"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY 6"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY 7"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY 8"
        ]);
        Line::factory()->create([
            'line_name'=>"ASSY 9"
        ]);

        Label::factory()->create([
           'part_no'=>"67401-BZ150-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, FR LWR RH",
           'qty'=>10,
           'job_no'=>"BX-0843",
           'kode_unik'=>"AX 1",
           'kode'=>"Y526",
           'marking'=>"XR",
           'warna_kertas'=>"",
           'line_id'=>1
        ]);
        Label::factory()->create([
           'part_no'=>"67402-BZ160-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, FR LWR LH",
           'qty'=>10,
           'job_no'=>"BX-0841",
           'kode_unik'=>"AX 8",
           'kode'=>"Y527",
           'marking'=>"XL",
           'warna_kertas'=>"",
           'line_id'=>1
        ]);
        Label::factory()->create([
           'part_no'=>"67403-BZ180-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR RH",
           'qty'=>20,
           'job_no'=>"BX-0839",
           'kode_unik'=>"AX 2",
           'kode'=>"T322",
           'marking'=>"XFR",
           'warna_kertas'=>"",
           'line_id'=>3
        ]);
        Label::factory()->create([
           'part_no'=>"67404-BZ180-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR LH",
           'qty'=>20,
           'job_no'=>"BX-0837",
           'kode_unik'=>"AX 5",
           'kode'=>"T323",
           'marking'=>"XFL",
           'warna_kertas'=>"",
           'line_id'=>1
        ]);
        Label::factory()->create([
           'part_no'=>"67405-BZ090-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"GUIDE SUB-ASSY, RR DOOR WINDOW, FR RH",
           'qty'=>40,
           'job_no'=>"BX-0844",
           'kode_unik'=>"AX 3",
           'kode'=>"T324",
           'marking'=>"X3R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
    }
}
