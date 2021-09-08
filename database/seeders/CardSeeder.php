<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardType;
use App\Models\Code;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Card::create([
            'slug' => 'razer-gold-usd-global-pin',
            'title_en' => 'Razer Gold USD (Global Pin)',
            'title_ar' => 'رازر جولد USD',
            'region_en' => 'Global',
            'region_ar' => 'عالمي',
            'note_en' => 'This Top Up Service is ONLY Applicable for CODM Players in Indonesia.',
            'note_ar' => 'خدمة الشحن هذه قابلة للتطبيق فقط على مشغلات CODM في إندونيسيا.',
            'instruction_en' => '<p><b>Free Fire Diamond</b> allows you to purchase weapons, pets, skins 
                                and items in Store. Plus, you can participate in Luck Royale and Diamond
                                Spin to obtain various unique character skins, weapon skins, weapon 
                                upgrades and even cosmetics.</p><p>With over 100 secure payment options,
                                buy and receive your code instantly. There is no need to go through the
                                App Store or Google Play Store anymore. Simply redeem your code and buy
                                all the characters, weapons and skins that you want!</p>',
            'instruction_ar' => '<p>يسمح لك Free Fire Diamond بشراء الأسلحة والحيوانات الأليفة والجلود 
                                والعناصر في المتجر.  بالإضافة إلى ذلك ، يمكنك المشاركة في Luck Royale و 
                                Diamond Spin للحصول على العديد من مظاهر الشخصيات الفريدة وجلود الأسلحة 
                                وترقيات الأسلحة وحتى مستحضرات التجميل.</p>',
            'cover_image' => '1629511459.webp',
            'popular' => '1',
            'status' => '0',

        ]);
        Card::create([
            'slug' => 'cyberpunk-2077',
            'title_en' => 'Cyberpunk 2077',
            'title_ar' => 'فيلم Cyberpunk 2077',
            'region_en' => 'Global',
            'region_ar' => 'عالمي',
            'note_en' => 'This Top Up Service is ONLY Applicable for CODM Players in Indonesia.',
            'note_ar' => 'خدمة الشحن هذه قابلة للتطبيق فقط على مشغلات CODM في إندونيسيا.',
            'instruction_en' => '<p><b>Free Fire Diamond</b> allows you to purchase weapons, pets, skins 
                                and items in Store. Plus, you can participate in Luck Royale and Diamond
                                Spin to obtain various unique character skins, weapon skins, weapon 
                                upgrades and even cosmetics.</p><p>With over 100 secure payment options,
                                buy and receive your code instantly. There is no need to go through the
                                App Store or Google Play Store anymore. Simply redeem your code and buy
                                all the characters, weapons and skins that you want!</p>',
            'instruction_ar' => '<p>يسمح لك Free Fire Diamond بشراء الأسلحة والحيوانات الأليفة والجلود 
                                والعناصر في المتجر.  بالإضافة إلى ذلك ، يمكنك المشاركة في Luck Royale و 
                                Diamond Spin للحصول على العديد من مظاهر الشخصيات الفريدة وجلود الأسلحة 
                                وترقيات الأسلحة وحتى مستحضرات التجميل.</p>',
            'cover_image' => '1629511600.webp',
            'popular' => '1',
            'status' => '0',

        ]);
        Card::create([
            'slug' => 'free-fire-diamonds-pins',
            'title_en' => 'Free Fire Diamonds Pins',
            'title_ar' => 'دبابيس الماس النار الحرة',
            'region_en' => 'Global',
            'region_ar' => 'عالمي',
            'note_en' => 'This Top Up Service is ONLY Applicable for CODM Players in Indonesia.',
            'note_ar' => 'خدمة الشحن هذه قابلة للتطبيق فقط على مشغلات CODM في إندونيسيا.',
            'instruction_en' => '<p><b>Free Fire Diamond</b> allows you to purchase weapons, pets, skins 
                                and items in Store. Plus, you can participate in Luck Royale and Diamond
                                Spin to obtain various unique character skins, weapon skins, weapon 
                                upgrades and even cosmetics.</p><p>With over 100 secure payment options,
                                buy and receive your code instantly. There is no need to go through the
                                App Store or Google Play Store anymore. Simply redeem your code and buy
                                all the characters, weapons and skins that you want!</p>',
            'instruction_ar' => '<p>يسمح لك Free Fire Diamond بشراء الأسلحة والحيوانات الأليفة والجلود 
                                والعناصر في المتجر.  بالإضافة إلى ذلك ، يمكنك المشاركة في Luck Royale و 
                                Diamond Spin للحصول على العديد من مظاهر الشخصيات الفريدة وجلود الأسلحة 
                                وترقيات الأسلحة وحتى مستحضرات التجميل.</p>',
            'cover_image' => '1629511789.webp',
            'popular' => '1',
            'status' => '0',

        ]);
        Card::create([
            'slug' => 'battlefield-5-origin',
            'title_en' => 'Battlefield 5 (Origin)',
            'title_ar' => 'Battlefield 5 (الأصل)',
            'region_en' => 'Global',
            'region_ar' => 'عالمي',
            'note_en' => 'This Top Up Service is ONLY Applicable for CODM Players in Indonesia.',
            'note_ar' => 'خدمة الشحن هذه قابلة للتطبيق فقط على مشغلات CODM في إندونيسيا.',
            'instruction_en' => '<p><b>Free Fire Diamond</b> allows you to purchase weapons, pets, skins 
                                and items in Store. Plus, you can participate in Luck Royale and Diamond
                                Spin to obtain various unique character skins, weapon skins, weapon 
                                upgrades and even cosmetics.</p><p>With over 100 secure payment options,
                                buy and receive your code instantly. There is no need to go through the
                                App Store or Google Play Store anymore. Simply redeem your code and buy
                                all the characters, weapons and skins that you want!</p>',
            'instruction_ar' => '<p>يسمح لك Free Fire Diamond بشراء الأسلحة والحيوانات الأليفة والجلود 
                                والعناصر في المتجر.  بالإضافة إلى ذلك ، يمكنك المشاركة في Luck Royale و 
                                Diamond Spin للحصول على العديد من مظاهر الشخصيات الفريدة وجلود الأسلحة 
                                وترقيات الأسلحة وحتى مستحضرات التجميل.</p>',
            'cover_image' => '1629511892.webp',
            'popular' => '1',
            'status' => '0',

        ]);
        Card::create([
            'slug' => 'apex-legends-coins',
            'title_en' => 'Apex Legends Coins',
            'title_ar' => 'عملات Apex Legends',
            'region_en' => 'Global',
            'region_ar' => 'عالمي',
            'note_en' => 'This Top Up Service is ONLY Applicable for CODM Players in Indonesia.',
            'note_ar' => 'خدمة الشحن هذه قابلة للتطبيق فقط على مشغلات CODM في إندونيسيا.',
            'instruction_en' => '<p><b>Free Fire Diamond</b> allows you to purchase weapons, pets, skins 
                                and items in Store. Plus, you can participate in Luck Royale and Diamond
                                Spin to obtain various unique character skins, weapon skins, weapon 
                                upgrades and even cosmetics.</p><p>With over 100 secure payment options,
                                buy and receive your code instantly. There is no need to go through the
                                App Store or Google Play Store anymore. Simply redeem your code and buy
                                all the characters, weapons and skins that you want!</p>',
            'instruction_ar' => '<p>يسمح لك Free Fire Diamond بشراء الأسلحة والحيوانات الأليفة والجلود 
                                والعناصر في المتجر.  بالإضافة إلى ذلك ، يمكنك المشاركة في Luck Royale و 
                                Diamond Spin للحصول على العديد من مظاهر الشخصيات الفريدة وجلود الأسلحة 
                                وترقيات الأسلحة وحتى مستحضرات التجميل.</p>',
            'cover_image' => '1629511985.webp',
            'popular' => '1',
            'status' => '0',

        ]);
        Card::create([
            'slug' => 'counter-strike',
            'title_en' => 'Counter-Strike',
            'title_ar' => 'ضربة مضادة',
            'region_en' => 'Global',
            'region_ar' => 'عالمي',
            'note_en' => 'This Top Up Service is ONLY Applicable for CODM Players in Indonesia.',
            'note_ar' => 'خدمة الشحن هذه قابلة للتطبيق فقط على مشغلات CODM في إندونيسيا.',
            'instruction_en' => '<p><b>Free Fire Diamond</b> allows you to purchase weapons, pets, skins 
                                and items in Store. Plus, you can participate in Luck Royale and Diamond
                                Spin to obtain various unique character skins, weapon skins, weapon 
                                upgrades and even cosmetics.</p><p>With over 100 secure payment options,
                                buy and receive your code instantly. There is no need to go through the
                                App Store or Google Play Store anymore. Simply redeem your code and buy
                                all the characters, weapons and skins that you want!</p>',
            'instruction_ar' => '<p>يسمح لك Free Fire Diamond بشراء الأسلحة والحيوانات الأليفة والجلود 
                                والعناصر في المتجر.  بالإضافة إلى ذلك ، يمكنك المشاركة في Luck Royale و 
                                Diamond Spin للحصول على العديد من مظاهر الشخصيات الفريدة وجلود الأسلحة 
                                وترقيات الأسلحة وحتى مستحضرات التجميل.</p>',
            'cover_image' => '1629512062.webp',
            'popular' => '1',
            'status' => '0',

        ]);


        for ($i=1; $i < 7; $i++) { 
            CardType::create([
                'card_id' => "$i",
                'type' => 'Free Fire 100+10 Diamonds',
                'price' => '1',
                'merchant_price' => '0.5',
            ]);
            CardType::create([
                'card_id' => "$i",
                'type' => 'Free Fire 210+21 Diamonds',
                'price' => '2',
                'merchant_price' => '1.5',
            ]);
            CardType::create([
                'card_id' => "$i",
                'type' => 'Free Fire 530+53 Diamonds',
                'price' => '5',
                'merchant_price' => '4',
            ]);
            CardType::create([
                'card_id' => "$i",
                'type' => 'Free Fire 1080+108 Diamonds',
                'price' => '10',
                'merchant_price' => '8',
            ]);
        }


        // for ($i=1; $i < 29; $i++) { 
        //     for ($j=0; $j < 4; $j++) { 
        //         $code = Str::random(14);
        //         Code::create([
        //             'cardType_id' => "$i",
        //             'order_id' => null,
        //             'code' => $code,
        //             'serial_number' => null,
        //             'bought' => "0",
        //         ]);
        //     }
            
        // }
        
    }
}
