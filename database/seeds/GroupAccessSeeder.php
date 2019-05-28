<?php

use Illuminate\Database\Seeder;

class GroupAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_accesses = [
            0  =>
                [
                    'id'          => 424,
                    'group_id'    => 1,
                    'module_id'   => 1,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            1  =>
                [
                    'id'          => 425,
                    'group_id'    => 2,
                    'module_id'   => 1,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            2  =>
                [
                    'id'          => 426,
                    'group_id'    => 3,
                    'module_id'   => 1,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            3  =>
                [
                    'id'          => 430,
                    'group_id'    => 1,
                    'module_id'   => 2,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            4  =>
                [
                    'id'          => 431,
                    'group_id'    => 2,
                    'module_id'   => 2,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            5  =>
                [
                    'id'          => 432,
                    'group_id'    => 3,
                    'module_id'   => 2,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            6  =>
                [
                    'id'          => 439,
                    'group_id'    => 1,
                    'module_id'   => 11,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"1"}',
                ],
            7  =>
                [
                    'id'          => 440,
                    'group_id'    => 2,
                    'module_id'   => 11,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"1"}',
                ],
            8  =>
                [
                    'id'          => 441,
                    'group_id'    => 3,
                    'module_id'   => 11,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            9  =>
                [
                    'id'          => 460,
                    'group_id'    => 1,
                    'module_id'   => 8,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"0"}',
                ],
            10 =>
                [
                    'id'          => 461,
                    'group_id'    => 2,
                    'module_id'   => 8,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"0"}',
                ],
            11 =>
                [
                    'id'          => 462,
                    'group_id'    => 3,
                    'module_id'   => 8,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            12 =>
                [
                    'id'          => 463,
                    'group_id'    => 1,
                    'module_id'   => 26,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"0"}',
                ],
            13 =>
                [
                    'id'          => 464,
                    'group_id'    => 2,
                    'module_id'   => 26,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            14 =>
                [
                    'id'          => 465,
                    'group_id'    => 3,
                    'module_id'   => 26,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            15 =>
                [
                    'id'          => 466,
                    'group_id'    => 1,
                    'module_id'   => 24,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"0"}',
                ],
            16 =>
                [
                    'id'          => 467,
                    'group_id'    => 2,
                    'module_id'   => 24,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            17 =>
                [
                    'id'          => 468,
                    'group_id'    => 3,
                    'module_id'   => 24,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            18 =>
                [
                    'id'          => 538,
                    'group_id'    => 1,
                    'module_id'   => 21,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"1"}',
                ],
            19 =>
                [
                    'id'          => 539,
                    'group_id'    => 2,
                    'module_id'   => 21,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"0"}',
                ],
            20 =>
                [
                    'id'          => 540,
                    'group_id'    => 3,
                    'module_id'   => 21,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"0"}',
                ],
            21 =>
                [
                    'id'          => 550,
                    'group_id'    => 1,
                    'module_id'   => 53,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            22 =>
                [
                    'id'          => 551,
                    'group_id'    => 2,
                    'module_id'   => 53,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            23 =>
                [
                    'id'          => 552,
                    'group_id'    => 3,
                    'module_id'   => 53,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            24 =>
                [
                    'id'          => 586,
                    'group_id'    => 1,
                    'module_id'   => 25,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            25 =>
                [
                    'id'          => 587,
                    'group_id'    => 2,
                    'module_id'   => 25,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            26 =>
                [
                    'id'          => 588,
                    'group_id'    => 3,
                    'module_id'   => 25,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            27 =>
                [
                    'id'          => 598,
                    'group_id'    => 1,
                    'module_id'   => 7,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            28 =>
                [
                    'id'          => 599,
                    'group_id'    => 2,
                    'module_id'   => 7,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            29 =>
                [
                    'id'          => 600,
                    'group_id'    => 3,
                    'module_id'   => 7,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            30 =>
                [
                    'id'          => 604,
                    'group_id'    => 1,
                    'module_id'   => 55,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            31 =>
                [
                    'id'          => 605,
                    'group_id'    => 2,
                    'module_id'   => 55,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            32 =>
                [
                    'id'          => 606,
                    'group_id'    => 3,
                    'module_id'   => 55,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            33 =>
                [
                    'id'          => 619,
                    'group_id'    => 1,
                    'module_id'   => 57,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            34 =>
                [
                    'id'          => 620,
                    'group_id'    => 2,
                    'module_id'   => 57,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"1","is_add":"1","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            35 =>
                [
                    'id'          => 621,
                    'group_id'    => 3,
                    'module_id'   => 57,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"1","is_add":"1","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            36 =>
                [
                    'id'          => 622,
                    'group_id'    => 4,
                    'module_id'   => 57,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"1","is_add":"1","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            37 =>
                [
                    'id'          => 629,
                    'group_id'    => 1,
                    'module_id'   => 58,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            38 =>
                [
                    'id'          => 630,
                    'group_id'    => 2,
                    'module_id'   => 58,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"1","is_remove":"0","is_excel":"1"}',
                ],
            39 =>
                [
                    'id'          => 631,
                    'group_id'    => 3,
                    'module_id'   => 58,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            40 =>
                [
                    'id'          => 632,
                    'group_id'    => 4,
                    'module_id'   => 58,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            41 =>
                [
                    'id'          => 633,
                    'group_id'    => 5,
                    'module_id'   => 58,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            42 =>
                [
                    'id'          => 634,
                    'group_id'    => 6,
                    'module_id'   => 58,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            43 =>
                [
                    'id'          => 677,
                    'group_id'    => 1,
                    'module_id'   => 62,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            44 =>
                [
                    'id'          => 678,
                    'group_id'    => 2,
                    'module_id'   => 62,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"1","is_remove":"0","is_excel":"0"}',
                ],
            45 =>
                [
                    'id'          => 679,
                    'group_id'    => 3,
                    'module_id'   => 62,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            46 =>
                [
                    'id'          => 680,
                    'group_id'    => 4,
                    'module_id'   => 62,
                    'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            47 =>
                [
                    'id'          => 681,
                    'group_id'    => 5,
                    'module_id'   => 62,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            48 =>
                [
                    'id'          => 682,
                    'group_id'    => 6,
                    'module_id'   => 62,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            49 =>
                [
                    'id'          => 689,
                    'group_id'    => 1,
                    'module_id'   => 63,
                    'access_data' => '{"is_global":"1","is_view":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            50 =>
                [
                    'id'          => 690,
                    'group_id'    => 2,
                    'module_id'   => 63,
                    'access_data' => '{"is_global":"1","is_view":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"1"}',
                ],
            51 =>
                [
                    'id'          => 691,
                    'group_id'    => 3,
                    'module_id'   => 63,
                    'access_data' => '{"is_global":"0","is_view":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            52 =>
                [
                    'id'          => 692,
                    'group_id'    => 4,
                    'module_id'   => 63,
                    'access_data' => '{"is_global":"0","is_view":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            53 =>
                [
                    'id'          => 693,
                    'group_id'    => 5,
                    'module_id'   => 63,
                    'access_data' => '{"is_global":"1","is_view":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            54 =>
                [
                    'id'          => 694,
                    'group_id'    => 6,
                    'module_id'   => 63,
                    'access_data' => '{"is_global":"1","is_view":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            55 =>
                [
                    'id'          => 695,
                    'group_id'    => 1,
                    'module_id'   => 64,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            56 =>
                [
                    'id'          => 696,
                    'group_id'    => 2,
                    'module_id'   => 64,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            57 =>
                [
                    'id'          => 697,
                    'group_id'    => 3,
                    'module_id'   => 64,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            58 =>
                [
                    'id'          => 698,
                    'group_id'    => 4,
                    'module_id'   => 64,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            59 =>
                [
                    'id'          => 699,
                    'group_id'    => 5,
                    'module_id'   => 64,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            60 =>
                [
                    'id'          => 700,
                    'group_id'    => 6,
                    'module_id'   => 64,
                    'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
                ],
            61 =>
                [
                    'id'          => 702,
                    'group_id'    => 1,
                    'module_id'   => 65,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            62 =>
                [
                    'id'          => 703,
                    'group_id'    => 2,
                    'module_id'   => 65,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            63 =>
                [
                    'id'          => 704,
                    'group_id'    => 3,
                    'module_id'   => 65,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            64 =>
                [
                    'id'          => 705,
                    'group_id'    => 4,
                    'module_id'   => 65,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            65 =>
                [
                    'id'          => 706,
                    'group_id'    => 5,
                    'module_id'   => 65,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],
            66 =>
                [
                    'id'          => 707,
                    'group_id'    => 6,
                    'module_id'   => 65,
                    'access_data' => '{"is_global":"0","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
                ],

        ];

        foreach ($group_accesses as $group_access_data) {
            \DB::table('tb_groups_access')->insert($group_access_data);
        }
    }
}
