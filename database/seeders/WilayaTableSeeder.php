<?php

namespace Database\Seeders;
use App\Models\Wilaya;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayaTableSeeder extends Seeder
{
    public function run()
    {

      DB::table('wilayas')->delete();

      $wilayas = [

        [
            'en' => 'Adrar',
            'ar' => 'أدرار',
        ],
        [
            'en' => 'Chlef',
            'ar' => 'الشلف',
        ],
        [
            'en' => 'Laghouat',
            'ar' => 'الأغواط',
        ],
        [
            'en' => 'Oum El Bouaghi',
            'ar' => 'أم البواقي',
        ],
        [
            'en' => 'Batna',
            'ar' => 'باتنة',
        ],
        [
            'en' => 'Béjaïa',
            'ar' => 'بجاية',
        ],
        [
            'en' => 'Biskra',
            'ar' => 'بسكرة',
        ],
        [
            'en' => 'Bechar',
            'ar' => 'بشار',
        ],
        [
            'en' => 'Blida',
            'ar' => 'البليدة',
        ],
        [
            'en' => 'Bouira',
            'ar' => 'البويرة',
        ],
        [
            'en' => 'Tamanrasset',
            'ar' => 'تمنراست',
        ],
        [
            'en' => 'Tbessa',
            'ar' => 'تبسة',
        ],
        [
            'en' => 'Tlemcen',
            'ar' => 'تلمسان',
        ],
        [
            'en' => 'Tiaret',
            'ar' => 'تيارت',
        ],
        [
            'en' => 'Tizi Ouzou',
            'ar' => 'تيزي وزو',
        ],
        [
            'en' => 'Alger',
            'ar' => 'الجزائر',
        ],
        [
            'en' => 'Djelfa',
            'ar' => 'الجلفة',
        ],
        [
            'en' => 'Jijel',
            'ar' => 'جيجل',
        ],
        [
            'en' => 'Setif',
            'ar' => 'سطيف',
        ],
        [
            'en' => 'Saida',
            'ar' => 'سعيدة',
        ],
        [
            'en' => 'Skikda',
            'ar' => 'سكيكدة',
        ],
        [
            'en' => 'Sidi Bel Abbes',
            'ar' => 'سيدي بلعباس',
        ],
        [
            'en' => 'Annaba',
            'ar' => 'عنابة',
        ],
        [
            'en' => 'Guelma',
            'ar' => 'قالمة',
        ],
        [
            'en' => 'Constantine',
            'ar' => 'قسنطينة',
        ],
        [
            'en' => 'Medea',
            'ar' => 'المدية',
        ],
        [
            'en' => 'Mostaganem',
            'ar' => 'مستغانم',
        ],
        [
            'en' => "M'Sila",
            'ar' => 'المسيلة',
        ],
        [
            'en' => 'Mascara',
            'ar' => 'معسكر',
        ],
        [
            'en' => 'Ouargla',
            'ar' => 'ورقلة',
        ],
        [
            'en' => 'Oran',
            'ar' => 'وهران',
        ],
        [
            'en' => 'El Bayadh',
            'ar' => 'البيض',
        ],
        [
            'en' => 'Illizi',
            'ar' => 'إليزي',
        ],
        [
            'en' => 'Bordj Bou Arreridj',
            'ar' => 'برج بوعريريج',
        ],
        [
            'en' => 'Boumerdes',
            'ar' => 'بومرداس',
        ],
        [
            'en' => 'El Tarf',
            'ar' => 'الطارف',
        ],
        [
            'en' => 'Tindouf',
            'ar' => 'تندوف',
        ],
        [
            'en' => 'Tissemsilt',
            'ar' => 'تيسمسيلت',
        ],
        [
            'en' => 'El Oued',
            'ar' => 'الوادي',
        ],
        [
            'en' => 'Khenchela',
            'ar' => 'خنشلة',
        ],
        [
            'en' => 'Souk Ahras',
            'ar' => 'سوق أهراس',
        ],
        [
            'en' => 'Tipaza',
            'ar' => 'تيبازة',
        ],
        [
            'en' => 'Mila',
            'ar' => 'ميلة',
        ],
        [
            'en' => 'Ain Defla',
            'ar' => 'عين الدفلى',
        ],
        [
            'en' => 'Naama',
            'ar' => 'النعامة',
        ],
        [
            'en' => 'Ain Temouchent',
            'ar' => 'عين تموشنت',
        ],
        [
            'en' => 'Ghardaefa',
            'ar' => 'غرداية',
        ],
        [
            'en' => 'Relizane',
            'ar' => 'غليزان',
        ],
        [
            'en' => "El M'ghair",
            'ar' => 'المغير',
        ],
        [
            'en' => 'El Menia',
            'ar' => 'المنيعة',
        ],
        [
            'en' => 'Ouled Djellal',
            'ar' => 'أولاد جلال',
        ],
        [
            'en' => 'Bordj Baji Mokhtar',
            'ar' => 'برج باجي مختار',
        ],
        [
            'en' => 'Béni Abbès',
            'ar' => 'بني عباس',
        ],
        [
            'en' => 'Timimoun',
            'ar' => 'تيميمون',
        ],
        [
            'en' => 'Touggourt',
            'ar' => 'تقرت',
        ],
        [
            'en' => 'Djanet',
            'ar' => 'جانت',
        ],
        [
            'en' => 'In Salah',
            'ar' => 'عين صالح',
        ],
        [
            'en' => 'In Guezzam',
            'ar' => 'عين قزام',
        ],
    ];

      foreach ($wilayas as $w) {
        Wilaya::create(['name' => $w]);
      }

    }
}
