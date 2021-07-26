<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::create([
            'name' => 'ሬዲዮ አዘጋጅ', // azegaj
        ]);
        $role2 = \App\Role::create([
            'name' => 'ሬዲዮ ኤዲተር', // azegaj
        ]);
        $role3 = \App\Role::create([
            'name' => 'የቴሌቪዥን ምክትል አዘጋጅ', // azegaj
        ]);
        $role4 = \App\Role::create([
            'name' => 'የቴሌቪዥን ኤዲተር ባለሙያ', // azegaj
        ]);
        $role5 = \App\Role::create([
            'name' => 'ኤፍኤም አዘጋጅ', // azegaj
        ]);
        $role6 = \App\Role::create([
            'name' => 'ኤፍኤም ኤዲተር', // azegaj
        ]);
        $role7 = \App\Role::create([
//            'name' => 'የቴሌቪዥን ሰርጭት ተቆጣጣሪ(ቴክኒሻን)', // azegaj
            'name' => 'የቴሌቪዥን ፕሌአውት ማናጀር', // azegaj
        ]);
        $role8 = \App\Role::create([
            'name' => 'ቴክኒሻን ኤፍኤም/ሬዲዮ', // azegaj
        ]);
        $role9 = \App\Role::create([
            'name' => 'ማሰታዎቂያና ህትመት ባለሙያ', // azegaj
        ]);
        $role10 = \App\Role::create([
            'name' => 'ማሰታዎቂያና ህትመት ኃላፊ', // azegaj
        ]);
        $role11 = \App\Role::create([
            'name' => 'ሲስተም ተቆጣጣሪ', // azegaj
        ]);

        $role12 = \App\Role::create([
            'name' => 'እንግዳ አካውንት', // እንግዳ
        ]);
        $role13 = \App\Role::create([
            'name' => 'የቴሌቪዥን ስርጭት ሱፐርቫይዘር', // ሱፐርቫይዘር
        ]);

//        $tvpcontent = \App\Tvpcontent::create([
//            'name' => 'chalie'
//        ]);
//        $tvpcontent1 = \App\Tvpcontent::create([
//            'name' => 'abebeb'
//        ]);
//        $tvpcontent2 = \App\Tvpcontent::create([
//            'name' => 'ketema'
//        ]);
//        $tvpcontent3 = \App\Tvpcontent::create([
//            'name' => 'kombolcha'
//        ]);

        $tvmitelalefbet = \App\Tvmitelalefbet::create([
            'name' => 'ጠዋት[12:00-6:00]',
//            'tvpcontent_id' => $tvpcontent->id
        ]);
        $tvmitelalefbet1 = \App\Tvmitelalefbet::create([
            'name' => 'ቀን[6:00 - 12:00]',
//            'tvpcontent_id' => $tvpcontent1->id
        ]);

        $tvmitelalefbet2 = \App\Tvmitelalefbet::create([
            'name' => 'ማታ[12:00 - 6:00]',
//            'tvpcontent_id' => $tvpcontent3->id
        ]);
        $tvmitelalefbet3 = \App\Tvmitelalefbet::create([
            'name' => 'ሌሊት[6:00 - 12:00]',
//            'tvpcontent_id' => $tvpcontent2->id
        ]);
//
// start comment
//        $users = \App\User::create([
//            'name' => 'Azegaji radio Abebe',
////            'email' => 'azegajr@gmail.com',
//            'username' => 'azegajr',
//            'role_id' => $role->id,
//
//            'password' => Hash::make('adminadmin'),
//        ]);
//        $users2 = \App\User::create([
//            'name' => 'editor radio zelalem',
//            'role_id' => $role2->id,
//            'username' => 'editorr',
////            'email' => 'editorr@gmail.com',
//            'password' => Hash::make('adminadmin'),
//        ]);
//
//        $users3 = \App\User::create([
//            'name' => 'television azegaj solomon ',
//            'username' => 'tva',
////            'email' => 'tva@gmail.com',
//            'role_id' => $role3->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users4 = \App\User::create([
//            'name' => 'television editor solomon ',
//            'username' => 'tve',
////            'email' => 'tve@gmail.com',
//            'role_id' => $role4->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users5 = \App\User::create([
//            'name' => 'fm azegaj solomon ',
//            'username' => 'fma',
////            'email' => 'fma@gmail.com',
//            'role_id' => $role5->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users6 = \App\User::create([
//            'name' => 'fm editor solomon ',
//
//            'username' => 'fme',
////            'email' => 'fme@gmail.com',
//            'role_id' => $role6->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users7 = \App\User::create([
//            'name' => 'tv technician  ',
//
//            'username' => 'tvt',
////            'email' => 'tvt@gmail.com',
//            'role_id' => $role7->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users8 = \App\User::create([
//            'name' => 'fm/radio technician ',
//
//            'username' => 'tfmr',
////            'email' => 'tfmr@gmail.com',
//            'role_id' => $role8->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users9 = \App\User::create([
//            'name' => 'promotion  ባለሙያ',
//
//            'username' => 'promotion',
////            'email' => 'pro@gmail.com',
//            'role_id' => $role9->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//        $users10 = \App\User::create([
//            'name' => 'promotion1  ኃላፊ',
//
//            'username' => 'promotion1',
////            'email' => 'pro@gmail.com',
//            'role_id' => $role10->id,
//            'password' => Hash::make('adminadmin'),
////            'gender' => 'Male'
//        ]);
//


//        end comment
        $users13 = \App\User::create([
            'name' => 'Challelign Tilahun',

            'username' => 'chalie',
//            'email' => 'pro@gmail.com',
            'role_id' => $role11->id,
            'password' => Hash::make('adminadmin'),
//            'gender' => 'Male'
        ]);


        $miraf1 = \App\Miraf::create([
            'name' => 'ምዕራፍ አንድ',
        ]);
        $miraf2 = \App\Miraf::create([
            'name' => 'ምዕራፍ ሁለት',
        ]);
        $miraf3 = \App\Miraf::create([
            'name' => 'ምዕራፍ ሶስት',
        ]);

        $program_ken1 = \App\ProgramKen::create([
            'name' => 'ሰኞ',
//            'tvmitelalefbet_id' => $tvmitelalefbet->id
        ]);
        $program_ken2 = \App\ProgramKen::create([
            'name' => 'ማክሰኞ',
//            'tvmitelalefbet_id' => $tvmitelalefbet->id

        ]);
        $program_ken3 = \App\ProgramKen::create([
            'name' => 'ረቡዕ',
//            'tvmitelalefbet_id' => $tvmitelalefbet1->id

        ]);
        $program_ken4 = \App\ProgramKen::create([
            'name' => 'ሐሙስ',
//            'tvmitelalefbet_id' => $tvmitelalefbet2->id

        ]);
        $program_ken5 = \App\ProgramKen::create([
            'name' => 'ዓርብ',
//            'tvmitelalefbet_id' => $tvmitelalefbet3->id

        ]);
        $program_ken6 = \App\ProgramKen::create([
            'name' => 'ቅዳሜ',
//            'tvmitelalefbet_id' => $tvmitelalefbet2->id
        ]);
        $program_ken7 = \App\ProgramKen::create([
            'name' => 'እሁድ',
//            'tvmitelalefbet_id' => $tvmitelalefbet2->id

        ]);

        $mtfm = \App\Mt::create([
            'name' => 'አማራ ራዲዮ',
        ]);
        $mt1 = \App\Mt::create([
            'name' => 'ባሕር ዳር ኤፍኤም'
        ]);

//        $program1 = \App\Program::create([
//            'program_meleya_id' => $program_meleyas2->id,
//            'program_ken_id' =>$program_ken1->id,
//            'today_date' => '20/02/2013',
//            'program_mitelalefbet' => 'ቀን[6:00-12:00]',
////            'program_m_time'=>'',
//            'program_file' => 'tana feret 18/02/13',
//            'program_yizet' => 'Before renaming a table, you should verify that any foreign key constraints on the table have an explicit name in your migration files instead of letting Laravel assign a convention based name. Otherwise, the foreign key constraint name will refer to the old table name.',
//            'program_artayi' => 'Solomon',
//            'program_azegagi' => 'Berihun',
//            'program_minute' => '30:00',
//            'is_artayi_check' => '0',
//            'is_transmit' => '0'
//
//        ]);
//        $program2 = \App\Program::create([
//            'program_meleya_id' => $program_meleyas2->id,
//            'program_ken_id' => $program_ken3->id,
//            'today_date' => '20/02/2013',
//            'program_mitelalefbet' => 'ጠዋት[12:00-6:00]',
////            'program_m_time'=>'',
//            'program_file' => 'Yesport Sew 18/02/13',
//            'program_yizet' => 'To create a new database table, use the create method on the Schema facade. The create method accepts two arguments: the first is the name of the table, while the second is a Closure which receives a Blueprint object that may be used to define the new table:',
//            'program_artayi' => 'Abel Solomon',
//            'program_azegagi' => 'Dawit Tsiga',
//            'program_minute' => '40:00',
//            'is_artayi_check' => '0',
//            'is_transmit' => '0'
//
//        ]);
    }
}
