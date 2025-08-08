<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Line;
use App\Models\Piclabel;
use App\Models\Qcpass;
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

        Qcpass::factory()->create([
            'qc_username'=> "NANDANG",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "R.ARIES",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "SURYADI",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "M. SYAHLANI",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "VIRDI R.",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "A.LUTFAN",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "RIZKY MUTIARA",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "RIZKY SUFIANDI",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "ALDI P.",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "GILBAN H.",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "TEGUH S.",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "M.RIZKI ALFAROBY",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "M.RIZKI WAHYUDIN",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "M.IBNU FADIL",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "YUDHA A.P",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "ADI ALFAISAL",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "NANDA MAULANA",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "OKTO BERLIANDO",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "TULUS IMAM R.",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "AHMAD AKBAR",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "YAYANG ZIGO",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "TORRY MARYONO",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "MUHAMMAD IQBAL",
        ]);
        Qcpass::factory()->create([
            'qc_username'=> "ENDANG TEGAR",
        ]);

        Piclabel::factory()->create([
            'name'=> "ABYAN TAHTA",
            'npk'=> 18240489,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "NANDA MAULANA",
            'npk'=> 18140107,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "OKTO BERLIANDO",
            'npk'=> 18180230,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "TULUS IMAM RAMDHANI ",
            'npk'=> 18170215,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "AHMAD AKBAR",
            'npk'=> 1814083,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "YAYANG ZIGO",
            'npk'=> 18190289,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "TORRY MARYONO",
            'npk'=> 18190306,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "MUHAMMAD IQBAL",
            'npk'=> 18210344,
            'uniqueCode'=> 'Poporemo'
        ]);
        Piclabel::factory()->create([
            'name'=> "ENDANG TEGAR",
            'npk'=> 18210365,
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
        Label::factory()->create([
           'part_no'=>"67406-BZ090-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"GUIDE SUB-ASSY, RR DOOR WINDOW, FR LH",
           'qty'=>40,
           'job_no'=>"BX-0842",
           'kode_unik'=>"AX 6",
           'kode'=>"T325",
           'marking'=>"X3L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67407-BZ090-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"FRAME SUB-ASSY, RR DOOR WDO, RR LWR RH",
           'qty'=>16,
           'job_no'=>"BX-0433",
           'kode_unik'=>"AX 4",
           'kode'=>"T359",
           'marking'=>"XRR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67408-BZ090-00",
           'customer'=>"ADM SAP",
           'model'=>"D26",
           'part_name'=>"FRAME SUB-ASSY, RR DOOR WDO, RR LWR LH",
           'qty'=>16,
           'job_no'=>"BX-0434",
           'kode_unik'=>"AX 7",
           'kode'=>"T360",
           'marking'=>"XRL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67401-BZ120-00",
           'customer'=>"ADM SAP",
           'model'=>"D14",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, FR LWR RH",
           'qty'=>16,
           'job_no'=>"NT-2167",
           'kode_unik'=>"TR 2",
           'kode'=>"-",
           'marking'=>"SR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67402-BZ130-00",
           'customer'=>"ADM SAP",
           'model'=>"D14",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, FR LWR LH",
           'qty'=>16,
           'job_no'=>"NT-2168",
           'kode_unik'=>"TR 4",
           'kode'=>"-",
           'marking'=>"SL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67403-BZ160-00",
           'customer'=>"ADM SAP",
           'model'=>"D14",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR RH",
           'qty'=>20,
           'job_no'=>"NT-0512",
           'kode_unik'=>"TR 1",
           'kode'=>"-",
           'marking'=>"SFR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67404-BZ160-00",
           'customer'=>"ADM SAP",
           'model'=>"D14",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR LH",
           'qty'=>20,
           'job_no'=>"NT-0513",
           'kode_unik'=>"TR 3",
           'kode'=>"-",
           'marking'=>"SFL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67403-BZ170-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR RH",
           'qty'=>20,
           'job_no'=>"RC-1885",
           'kode_unik'=>"RR 1",
           'kode'=>"-",
           'marking'=>"AFR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67404-BZ170-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR LH",
           'qty'=>20,
           'job_no'=>"RC-1886",
           'kode_unik'=>"RR 3",
           'kode'=>"-",
           'marking'=>"AFL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67405-BZ080-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"GUIDE SUB-ASSY, RR DOOR WINDOW, FR RH",
           'qty'=>40,
           'job_no'=>"RC-1887",
           'kode_unik'=>"RR 2",
           'kode'=>"-",
           'marking'=>"ARR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67406-BZ080-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"GUIDE SUB-ASSY, RR DOOR WINDOW, FR LH",
           'qty'=>40,
           'job_no'=>"RC-1888",
           'kode_unik'=>"RR 4",
           'kode'=>"-",
           'marking'=>"ARL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67407-BZ150-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"BAR SUB-ASSY, RR DOOR WDO DIVISION, RH",
           'qty'=>16,
           'job_no'=>"RC-1889",
           'kode_unik'=>"RR 5",
           'kode'=>"-",
           'marking'=>"AR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67408-BZ150-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"BAR SUB-ASSY, RR DOOR WDO DIVISION, LH",
           'qty'=>16,
           'job_no'=>"RC-1890",
           'kode_unik'=>"RR 6",
           'kode'=>"-",
           'marking'=>"AL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"25051-BZ120-00",
           'customer'=>"ADM SAP",
           'model'=>"D05",
           'part_name'=>"CONVERTER SUB-ASSY, EXHAUST MANIFOLD",
           'qty'=>2,
           'job_no'=>"GT-5331",
           'kode_unik'=>"GL 1",
           'kode'=>"-",
           'marking'=>"-",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"25051-BZ130-00",
           'customer'=>"ADM SAP",
           'model'=>"D05",
           'part_name'=>"CONVERTER SUB-ASSY, EXHAUST MANIFOLD",
           'qty'=>2,
           'job_no'=>"GT-5332",
           'kode_unik'=>"GL 2",
           'kode'=>"-",
           'marking'=>"ORANGE",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"25051-BZ190-00",
           'customer'=>"ADM SAP",
           'model'=>"D05",
           'part_name'=>"CONVERTER SUB-ASSY, EXHAUST MANIFOLD",
           'qty'=>2,
           'job_no'=>"GT-6209",
           'kode_unik'=>"GL 3",
           'kode'=>"-",
           'marking'=>"PUTIH",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZA10-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>25,
           'job_no'=>"RC-1064",
           'kode_unik'=>"RR 7",
           'kode'=>"-",
           'marking'=>"KUNING",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZA20-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>25,
           'job_no'=>"RC-1065",
           'kode_unik'=>"RR 8",
           'kode'=>"-",
           'marking'=>"UNGU",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZA30-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>25,
           'job_no'=>"RC-1066",
           'kode_unik'=>"RR 9",
           'kode'=>"-",
           'marking'=>"ORANGE",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ430-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"RC-1067",
           'kode_unik'=>"RR 10",
           'kode'=>"-",
           'marking'=>"KUNING",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ440-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"RC-1068",
           'kode_unik'=>"RR 11",
           'kode'=>"-",
           'marking'=>"UNGU",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ450-00",
           'customer'=>"ADM KAP",
           'model'=>"D55",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"RC-1069",
           'kode_unik'=>"RR 12",
           'kode'=>"-",
           'marking'=>"ORANGE",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZ730-00",
           'customer'=>"ADM KAP",
           'model'=>"D30 NR",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>15,
           'job_no'=>"SC-0982",
           'kode_unik'=>"-",
           'kode'=>"B027",
           'marking'=>"MERAH",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZ740-00",
           'customer'=>"ADM KAP",
           'model'=>"D30 KR",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>15,
           'job_no'=>"SC-0977",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"PUTIH",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZD40-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>25,
           'job_no'=>"AA-2932",
           'kode_unik'=>"AA 7",
           'kode'=>"-",
           'marking'=>"J1",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZD50-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>25,
           'job_no'=>"AA-2933",
           'kode_unik'=>"AA 8",
           'kode'=>"-",
           'marking'=>"J2",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17410-BZD70-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST, FR",
           'qty'=>25,
           'job_no'=>"AA-2934",
           'kode_unik'=>"AA 9",
           'kode'=>"-",
           'marking'=>"J3",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ660-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"AA-2935",
           'kode_unik'=>"AA 10",
           'kode'=>"-",
           'marking'=>"R5",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ670-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"AA-2936",
           'kode_unik'=>"AA 11",
           'kode'=>"-",
           'marking'=>"R6",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ680-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"AA-2937",
           'kode_unik'=>"AA 12",
           'kode'=>"-",
           'marking'=>"R7",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ690-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"AA-2938",
           'kode_unik'=>"AA 13",
           'kode'=>"-",
           'marking'=>"R8",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17430-BZ700-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"PIPE ASSY, EXHAUST TAIL",
           'qty'=>15,
           'job_no'=>"AA-2939",
           'kode_unik'=>"AA 14",
           'kode'=>"-",
           'marking'=>"R9",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67403-BZ210-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR RH",
           'qty'=>20,
           'job_no'=>"AA-3544",
           'kode_unik'=>"AA 1",
           'kode'=>"-",
           'marking'=>"JR1",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67404-BZ200-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, RR LWR LH",
           'qty'=>20,
           'job_no'=>"AA-3545",
           'kode_unik'=>"AA 3",
           'kode'=>"-",
           'marking'=>"JL1",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67405-BZ120-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"GUIDE SUB-ASSY, RR DOOR WINDOW, FR RH",
           'qty'=>40,
           'job_no'=>"AA-3546",
           'kode_unik'=>"AA 2",
           'kode'=>"-",
           'marking'=>"JR2",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67406-BZ120-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"GUIDE SUB-ASSY, RR DOOR WINDOW, FR LH",
           'qty'=>40,
           'job_no'=>"AA-3547",
           'kode_unik'=>"AA 4",
           'kode'=>"-",
           'marking'=>"JL2",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67407-BZ250-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"BAR SUB-ASSY, RR DOOR WDO DIVISION, RH",
           'qty'=>16,
           'job_no'=>"AA-3548",
           'kode_unik'=>"AA 5",
           'kode'=>"-",
           'marking'=>"JR3",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67408-BZ250-00",
           'customer'=>"ADM KAP",
           'model'=>"D74",
           'part_name'=>"BAR SUB-ASSY, RR DOOR WDO DIVISION, LH",
           'qty'=>16,
           'job_no'=>"AA-3549",
           'kode_unik'=>"AA 6",
           'kode'=>"-",
           'marking'=>"JL3",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17400-BZ040-00",
           'customer'=>"ADM KEP",
           'model'=>"D08",
           'part_name'=>"CONVERTER ASSY, W/CATALYST-D08E",
           'qty'=>2,
           'job_no'=>"E2781",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"G",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17400-BZ090-00",
           'customer'=>"ADM KEP",
           'model'=>"D08",
           'part_name'=>"CONVERTER ASSY, W/CATALYST-D08E",
           'qty'=>2,
           'job_no'=>"E2782",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"H",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"17400-BZ060-00",
           'customer'=>"ADM KEP",
           'model'=>"D78",
           'part_name'=>"CONVERTER ASSY, W/CATALYST",
           'qty'=>2,
           'job_no'=>"E2002",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"Z",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"25051-BZ230-00",
           'customer'=>"ADM KEP",
           'model'=>"D09",
           'part_name'=>"CONVERTER SUB-ASSY, EXHAUST MANIFOLD",
           'qty'=>2,
           'job_no'=>"E2751",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"A",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"25051-BZ240-00",
           'customer'=>"ADM KEP",
           'model'=>"D09",
           'part_name'=>"CONVERTER SUB-ASSY, EXHAUST MANIFOLD",
           'qty'=>2,
           'job_no'=>"E2752",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"C",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"25051-BZ300-00",
           'customer'=>"ADM KEP",
           'model'=>"D09",
           'part_name'=>"CONVERTER SUB-ASSY, EXHAUST MANIFOLD",
           'qty'=>2,
           'job_no'=>"E2788",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"E",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67401-BZ190-00",
           'customer'=>"TMMIN LOKAL",
           'model'=>"D03",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, FR LWR RH",
           'qty'=>6,
           'job_no'=>"R243",
           'kode_unik'=>"YC 1",
           'kode'=>"4700",
           'marking'=>"NR",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67402-BZ190-00",
           'customer'=>"TMMIN LOKAL",
           'model'=>"D03",
           'part_name'=>"FRAME SUB-ASSY, FR DOOR, FR LWR LH",
           'qty'=>6,
           'job_no'=>"R244",
           'kode_unik'=>"YC 2",
           'kode'=>"4701",
           'marking'=>"NL",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"14220-52S00-000",
           'customer'=>"SUZUKI",
           'model'=>"Y4L E4",
           'part_name'=>"CASE COMP EXH W/ CATALYST",
           'qty'=>4,
           'job_no'=>"EURO 4",
           'kode_unik'=>"299",
           'kode'=>"-",
           'marking'=>"F",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"14220-52S10-000",
           'customer'=>"SUZUKI",
           'model'=>"Y4L E6",
           'part_name'=>"CASE COMP EXH W/ CATALYST",
           'qty'=>4,
           'job_no'=>"EURO 6",
           'kode_unik'=>"156",
           'kode'=>"-",
           'marking'=>"S",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"14110-52S00-000",
           'customer'=>"SUZUKI",
           'model'=>"Y4L",
           'part_name'=>"MANIFOLD EXHAUST",
           'qty'=>2,
           'job_no'=>"MANIFOLD",
           'kode_unik'=>"200",
           'kode'=>"-",
           'marking'=>"-",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67711-3M0-J012-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF COMP R RR DOOR HINGE",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67751-3M0-J012-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF COMP L RR DOOR HINGE",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67312-3M0-J011-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF COMP R FR DOOR FR PLR",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67352-3M0-J011-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF COMP L FR DOOR FR PLR",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67313-3M0-J011-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF COMP R FR DOOR CTR PLR",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67353-3M0-J011-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF COMP L FR DOOR CTR PLR",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"72231-3M0-J010-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"SASH R FR DOOR CTR LWR",
           'qty'=>15,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"72271-3M0-J010-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"SASH L FR DOOR CTR LWR",
           'qty'=>15,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"72731-3M0-J010-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"SASH R RR DOOR RR LWR",
           'qty'=>15,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"72771-3M0-J010-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"SASH L RR DOOR RR LWR",
           'qty'=>15,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67813-3M0-J012-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF R RR DOOR RR PLR",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0R",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
        Label::factory()->create([
           'part_no'=>"67853-3M0-J012-Y1",
           'customer'=>"HPM",
           'model'=>"3M0A",
           'part_name'=>"STIFF L RR DOOR RR PLR",
           'qty'=>30,
           'job_no'=>"-",
           'kode_unik'=>"-",
           'kode'=>"-",
           'marking'=>"M0L",
           'warna_kertas'=>"",
           'line_id'=>2
        ]);
    }
}
