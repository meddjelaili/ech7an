<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'site_logo',
            'value' => 'logo.svg',
        ]);
        Setting::create([
            'name' => 'site_name',
            'value' => 'Ich7anDz',
        ]);
        Setting::create([
            'name' => 'facebook',
            'value' => '#',
        ]);
        Setting::create([
            'name' => 'twitter',
            'value' => '#',
        ]);
        Setting::create([
            'name' => 'instagram',
            'value' => '#',
        ]);
        Setting::create([
            'name' => 'linkedIn',
            'value' => '#',
        ]);
        
        Setting::create([
            'name' => 'about_us_en',
            'value' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ducimus reiciendis reprehenderit delectus.',
        ]);
        Setting::create([
            'name' => 'about_us_ar',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
        ]);

        Setting::create([
            'name' => 'about_wallet_en',
            'value' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ducimus reiciendis reprehenderit delectus.',
        ]);
        Setting::create([
            'name' => 'about_wallet_ar',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
        ]);
        Setting::create([
            'name' => 'site_email',
            'value' => 'ismail.sadouki.0@gmail.com',
        ]);
        Setting::create([
            'name' => 'site_address',
            'value' => 'Algeria - Mostaganem',
        ]);
        Setting::create([
            'name' => 'paysera_orderId1_projectId',
            'value' => '222899',
        ]);
        Setting::create([
            'name' => 'paysera_orderId1_password',
            'value' => 'fb7f07c358989bdf148e4a0c5a87e088',
        ]);

        Setting::create([
            'name' => 'paysera_orderId2_projectId',
            'value' => '223343',
        ]);
        Setting::create([
            'name' => 'paysera_orderId2_password',
            'value' => '38f9777249dc800fbf1f2b13c1674414',
        ]);
        Setting::create([
            'name' => 'paysera_status',
            'value' => '1',
        ]);
        Setting::create([
            'name' => 'ccp_status',
            'value' => '1',
        ]);
        Setting::create([
            'name' => 'baridimob_status',
            'value' => '1',
        ]);
        Setting::create([
            'name' => 'paysera_wallet_status',
            'value' => '1',
        ]);
        Setting::create([
            'name' => 'ccp',
            'value' => '23232323 cle 23',
        ]);
        Setting::create([
            'name' => 'ccp_name',
            'value' => 'ismail sadouki',
        ]);
        Setting::create([
            'name' => 'ccp_city',
            'value' => 'mostaganem',
        ]);
        Setting::create([
            'name' => 'baridimob',
            'value' => '007999992323232332',
        ]);
        Setting::create([
            'name' => 'paysera_wallet_address',
            'value' => 'AVENUE lOUIS 54,Room S52
                        Brussels
                        1050
                        Belgium',
        ]);
        Setting::create([
            'name' => 'paysera_wallet_swif',
            'value' => 'TRWIBEB1XXX',
        ]);
        Setting::create([
            'name' => 'paysera_wallet_iban',
            'value' => 'BE30 9671 9649 7411',
        ]);
        Setting::create([
            'name' => 'paysera_wallet_acount',
            'value' => 'ECH7ANDZ LTD',
        ]);

        Setting::create([
            'name' => 'maildriver',
            'value' => 'smtp',
        ]);

        Setting::create([
            'name' => 'mailhost',
            'value' => 'smtp.mailtrap.io',
        ]);

        Setting::create([
            'name' => 'mailport',
            'value' => '2525',
        ]);

        Setting::create([
            'name' => 'mailencryption',
            'value' => 'tls',
        ]);

        Setting::create([
            'name' => 'mailusername',
            'value' => '9c514cb3457ea2',
        ]);

        Setting::create([
            'name' => 'mailpassword',
            'value' => '150ebb6e70594c',
        ]);
        Setting::create([
            'name' => 'mailaddress',
            'value' => 'ich7andz@gmail.com',
        ]);
        
        Setting::create([
            'name' => 'slideshow_1',
            'value' => '1.webp',
        ]);
        Setting::create([
            'name' => 'slideshow_2',
            'value' => '2.webp',
        ]);
        Setting::create([
            'name' => 'slideshow_3',
            'value' => '3.webp',
        ]);
        Setting::create([
            'name' => 'slideshow_4',
            'value' => '4.webp',
        ]);
        Setting::create([
            'name' => 'slideshow_5',
            'value' => '5.webp',
        ]);

        Setting::create([
            'name' => 'slideshow_1_link',
            'value' => 'link',
        ]);
        Setting::create([
            'name' => 'slideshow_2_link',
            'value' => 'link',
        ]);
        Setting::create([
            'name' => 'slideshow_3_link',
            'value' => 'link',
        ]);
        Setting::create([
            'name' => 'slideshow_4_link',
            'value' => 'link',
        ]);
        Setting::create([
            'name' => 'slideshow_5_link',
            'value' => 'link',
        ]);
        Setting::create([
            'name' => 'merchant_en',
            'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure exercitationem asperiores dicta quaerat labore illum perferendis corrupti et animi delectus',
        ]);
        Setting::create([
            'name' => 'merchant_ar',
            'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure exercitationem asperiores dicta quaerat labore illum perferendis corrupti et animi delectus',
        ]);
        Setting::create([
            'name' => 'dark_mode',
            'value' => '0',
        ]);
    }
}
