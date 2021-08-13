<?php

use App\Fmmelaya;
use App\ProgramMeleya;
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
        $pid1 = Fmmelaya::create([
            'name' => 'ስዓቱን ከኛ ጋር',
            'yeteshete' => '0',
        ]);
        $pid2 = Fmmelaya::create([
            'name' => 'ሄሎውአፍሪካ',
            'yeteshete' => '0',
        ]);
        $pid3 = Fmmelaya::create([
            'name' => 'ለምን',
            'yeteshete' => '0',
        ]);
        $pid33 = Fmmelaya::create([
            'name' => 'ሙዚቃና መረጃ ',
            'yeteshete' => '0',
        ]);
        $pid4 = Fmmelaya::create([
            'name' => 'ማለዳ ስፖርት',
            'yeteshete' => '1',
        ]);
        $pid5 = Fmmelaya::create([
            'name' => 'ምን እናማክርልዎ',
            'yeteshete' => '0',
        ]);
        $pid6 = Fmmelaya::create([
            'name' => 'ሴቶች',
            'yeteshete' => '0',

        ]);
        $pid7 = Fmmelaya::create([
            'name' => 'ስሙን',
            'yeteshete' => '0',
        ]);
        $pid32 = Fmmelaya::create([
            'name' => 'ስፖት',
            'yeteshete' => '0',
        ]);


        $pid8 = Fmmelaya::create([
            'name' => 'ቅዳሜ አመሻሽ',
            'yeteshete' => '0',

        ]);
        $pid9 = Fmmelaya::create([
            'name' => 'ባለቀለም ጨዋታ',
            'yeteshete' => '1',
        ]);
        $pid10 = Fmmelaya::create([
            'name' => 'ተመስጦ',
            'yeteshete' => '0',

        ]);
        $pid11 = Fmmelaya::create([
            'name' => 'ታዋቂወቻችንምንይላሉ',
            'yeteshete' => '0',

        ]);
        $pid12 = Fmmelaya::create([
            'name' => 'የህይወት ገፆች',
            'yeteshete' => '1',

        ]);
        $pid13 = Fmmelaya::create([
            'name' => 'የልጆች ጊዜ',
            'yeteshete' => '0',

        ]);
        $pid14 = Fmmelaya::create([
            'name' => 'የምዮ ዉለታ',
            'yeteshete' => '0',

        ]);
        $pid15 = Fmmelaya::create([
            'name' => 'የፍቅርተሞክሮ',
            'yeteshete' => '0',
        ]);
        $pid16 = Fmmelaya::create([
            'name' => 'የአባይዳርጨዋታ',
            'yeteshete' => '0',
        ]);
        $pid17 = Fmmelaya::create([
            'name' => 'ከፍጥረታትዓለም',
            'yeteshete' => '0',
        ]);
        $pid18 = Fmmelaya::create([
            'name' => 'ከእዉቀት ማዕድ',
            'yeteshete' => '1',
        ]);
        $pid19 = Fmmelaya::create([
            'name' => 'ከፍርድ መዛግብት',
            'yeteshete' => '0',

        ]);
        $pid20 = Fmmelaya::create([
            'name' => 'ከተሞቻችን',
            'yeteshete' => '0',

        ]);
        $pid21 = Fmmelaya::create([
            'name' => 'ኪንሩፋት',
            'yeteshete' => '1',

        ]);
        $pid22 = Fmmelaya::create([
            'name' => 'ከዓለምዙሪያ',
            'yeteshete' => '0',

        ]);
        $pid23 = Fmmelaya::create([
            'name' => 'ጥሩዓለም',
            'yeteshete' => '0',


        ]);
        $pid24 = Fmmelaya::create([
            'name' => 'ጥበበሙዳይ',
            'yeteshete' => '0',

        ]);
        $pid25 = Fmmelaya::create([
            'name' => 'ጊዜለወጣቶች',
            'yeteshete' => '0',

        ]);
        $pid26 = Fmmelaya::create([
            'name' => 'ወግ ስለተሸከርካሪ',
            'yeteshete' => '1',
        ]);
        $pid27 = Fmmelaya::create([
            'name' => 'እስኪ እንነጋገርበት',
            'yeteshete' => '0',
        ]);
        $pid29 = Fmmelaya::create([
            'name' => 'እኔ ለሀገሬ',
            'yeteshete' => '0',
        ]);
        $pid30 = Fmmelaya::create([
            'name' =>      'ዘዋሪዉ',
            'yeteshete' => '0',
        ]);
        $pid31 = Fmmelaya::create([
            'name' => 'ፋረም ራዲዮ',
            'yeteshete' => '0',
        ]);

//        radio program id
        $rpid0 = ProgramMeleya::create([
            'name' => 'ሰዓቱን ከኛ ጋር',
            'yeteshete' => '0',
        ]);

        $rpid1 = ProgramMeleya::create([
            'name' => 'ዜና መጽሔት',
            'yeteshete' => '0',
        ]);

        $rpid2 = ProgramMeleya::create([
            'name' => 'ዜና ሙዳይ',
            'yeteshete' => '0',
        ]);
        $rpid3 = ProgramMeleya::create([
            'name' => 'ሀሳብ ለሀሳብ',
            'yeteshete' => '0',
        ]);
        $rpid4 = ProgramMeleya::create([
            'name' => 'ሁሌም ጤና',
            'yeteshete' => '0',
        ]);
        $rpid5 = ProgramMeleya::create([
            'name' => 'ልዩ ዝግጅት',
            'yeteshete' => '0',
        ]);
        $rpid6 = ProgramMeleya::create([
            'name' => 'ማህደር ልማት',
            'yeteshete' => '0',
        ]);
        $rpid7 = ProgramMeleya::create([
            'name' => 'ማህደር ስፖርት',
            'yeteshete' => '1',
        ]);
        $rpid8 = ProgramMeleya::create([
            'name' => 'ማህደረ ልማት',
            'yeteshete' => '0',
        ]);
        $rpid9 = ProgramMeleya::create([
            'name' => 'ማን እንዳገር',
            'yeteshete' => '0',
        ]);
        $rpid10 = ProgramMeleya::create([

            'name' => 'ማንን ያደንቃሉ',
            'yeteshete' => '0',
        ]);
        $rpid11 = ProgramMeleya::create([
            'name' => 'ምክረ ህግ',
            'yeteshete' => '0',
        ]);
        $rpid12 = ProgramMeleya::create([
            'name' => 'ምክር ቤት',
            'yeteshete' => '1',
        ]);
        $rpid13 = ProgramMeleya::create([
            'name' => 'ምን እናማክርልዎ',
            'yeteshete' => '0',
        ]);
   /*     $rpid14 = ProgramMeleya::create([

        ]);*/
        $rpid15 = ProgramMeleya::create([
            'name' => 'ሴቶች',
            'yeteshete' => '0',
        ]);
        $rpid16 = ProgramMeleya::create([
            'name' => 'ስፖርት መጽሄት',
            'yeteshete' => '0',
        ]);
        $rpid17 = ProgramMeleya::create([
            'name' => 'ስፖርት ቅምሻ',
            'yeteshete' => '0',
        ]);
        $rpid18 = ProgramMeleya::create([
            'name' => 'ስፖርት እንነጋገር',
            'yeteshete' => '0',
        ]);
        $rpid19 = ProgramMeleya::create([
            'name' => 'ቃላችንን እንጠብቅ',
            'yeteshete' => '1',
        ]);
        $rpid20 = ProgramMeleya::create([
            'name' => 'ቆየት ያሉ ሙዚቃዎች',
            'yeteshete' => '0',
        ]);
        $rpid21 = ProgramMeleya::create([

            'name' => 'ብሄረሰብ ቋንቋዎች /ህምጠኛ/',
            'yeteshete' => '0',
        ]);
        $rpid22 = ProgramMeleya::create([
            'name' => 'ብሄረሰብ ቋንቋዎች /ኦሮሞኛ/',
            'yeteshete' => '0',

        ]);
        $rpid23 = ProgramMeleya::create([
            'name' => 'ብሄረሰብ ቋንቋዎች /አዊኛ/',
            'yeteshete' => '0',
        ]);
        $rpid24 = ProgramMeleya::create([
            'name' => 'ብርቱዎቹ',
            'yeteshete' => '0',
        ]);
        $rpid25 = ProgramMeleya::create([
            'name' => 'አብረን እናረፋፍድ',
            'yeteshete' => '0',
        ]);
        $rpid26 = ProgramMeleya::create([
            'name' => 'አዲስ ስፖርት',
            'yeteshete' => '1',
        ]);
        $rpid27 = ProgramMeleya::create([
            'name' => 'አውደ ቅርስ/ ኤፍ ኤም',
            'yeteshete' => '0',
        ]);
        $rpid28 = ProgramMeleya::create([
            'name' => 'አግራሞት',
            'yeteshete' => '0',
        ]);
        $rpid29 = ProgramMeleya::create([
            'name' => 'እናት አትዮ',
            'yeteshete' => '0',
        ]);
        $rpid30 = ProgramMeleya::create([
            'name' => 'እይታ',
            'yeteshete' => '0',
        ]);
        $rpid31 = ProgramMeleya::create([
            'name' => 'እርካብ',
            'yeteshete' => '1',
        ]);
        $rpid100 = ProgramMeleya::create([
            'name' => 'እንግዳ',
            'yeteshete' => '0',
        ]);
        $rpid32 = ProgramMeleya::create([
            'name' => 'ከታሪክ ማህደር',
            'yeteshete' => '0',
        ]);
        $rpid33 = ProgramMeleya::create([
            'name' => 'ከፍርድ መዛግብት',
            'yeteshete' => '0',
        ]);
        $rpid34 = ProgramMeleya::create([
            'name' => 'ከዕውቀት ማዕዘ',
            'yeteshete' => '0',

        ]);
        $rpid35 = ProgramMeleya::create([
            'name' => 'ከእርሻ እስከ ጉርሻ',
            'yeteshete' => '1',
        ]);
        $rpid36 = ProgramMeleya::create([
            'name' => 'ካነበብኩት የወደድኩት',
            'yeteshete' => '0',
        ]);
        $rpid37 = ProgramMeleya::create([
            'name' => 'የህግ ጉዳይ',
            'yeteshete' => '0',
        ]);
        $rpid38 = ProgramMeleya::create([
            'name' => 'የልጆች ጊዜ ኮሮና',
            'yeteshete' => '0',

        ]);
        $rpid39 = ProgramMeleya::create([
            'name' => 'የስልክ ዘፈን ምርጫ',
            'yeteshete' => '0',
        ]);
        $rpid40 = ProgramMeleya::create([
            'name' => 'ያልተደመጡ ድምፆች',
            'yeteshete' => '0',
        ]);
        $rpid2 = ProgramMeleya::create([
            'name' => 'የኛ ቃና',
            'yeteshete' => '0',
        ]);
        $rpid43 = ProgramMeleya::create([
            'name' => 'የይቅርታ መድረክ',
            'yeteshete' => '0',
        ]);
        $rpid44 = ProgramMeleya::create([
            'name' => 'የህግ ጉዳይ',
            'yeteshete' => '0',

        ]);
        $rpid45 = ProgramMeleya::create([
            'name' => 'የወሳኝ ኩነት',
            'yeteshete' => '1',
        ]);
        $rpid46 = ProgramMeleya::create([
            'name' => 'የጋዜጠኞች ዕይታ',
            'yeteshete' => '0',
        ]);
        $rpid47 = ProgramMeleya::create([
            'name' => 'የአድማጮች መድረክ',
            'yeteshete' => '0',
        ]);
        $rpid48 = ProgramMeleya::create([
            'name' => 'ደወል',
            'yeteshete' => '1',
        ]);
        $rpid49 = ProgramMeleya::create([
            'name' => 'ድንቅ ተፈጥሮ',
            'yeteshete' => '0',
        ]);
        $rpid50 = ProgramMeleya::create([
            'name' => 'ተጠየቅ',
            'yeteshete' => '0',
        ]);
        $rpid51 = ProgramMeleya::create([
            'name' => 'GIZ /ከFM/ ውስን ሃብት',
            'yeteshete' => '0',
        ]);
        $rpid52 = ProgramMeleya::create([
            'name' => 'ፋርም',
            'yeteshete' => '0',
        ]);
        $rpid53 = ProgramMeleya::create([
            'name' => 'ጣና ስፖርት',
            'yeteshete' => '0',

        ]);
        $rpid54 = ProgramMeleya::create([
            'name' => 'ጥበበ ሙዳይ',
            'yeteshete' => '0',
        ]);
        $rpid55 = ProgramMeleya::create([
            'name' => 'ጥያቄና መልስ',
            'yeteshete' => '1',

        ]);
        $rpid59 = ProgramMeleya::create([
            'name' => 'ጥበበኞቻችን',
            'yeteshete' => '0',
        ]);
        $rpid56 = ProgramMeleya::create([
            'name' => 'ገቢያችን',
            'yeteshete' => '0',
        ]);
        $rpid57 = ProgramMeleya::create([
            'name' => 'ጉዳያችን /ዘጋቢ/',
            'yeteshete' => '0',
        ]);
        $rpid57 = ProgramMeleya::create([
            'name' => 'ጊዜ ለወጣቶች',
            'yeteshete' => '0',
        ]);
        $rpid58 = ProgramMeleya::create([
            'name' => 'ግብርናችን',
            'yeteshete' => '1',
        ]);

        $rpid60 = ProgramMeleya::create([
            'name' => 'ውሎ በአርሶደሮች ቀየ',
            'yeteshete' => '0',
        ]);



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


    }
}
