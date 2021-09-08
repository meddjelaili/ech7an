<?php

namespace Database\Seeders;

use App\Models\TopUp;
use App\Models\TopUpAmount;
use App\Models\TopUpInformation;
use Illuminate\Database\Seeder;

class TopUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TopUp::create([
            'slug' => 'mobile-legends-diamonds',
            'title_en' => 'Mobile Legends Diamonds',
            'title_ar' => 'الماس أساطير المحم',
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
            'cover_image' => '1629507864.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        TopUp::create([
            'slug' => 'free-fire-diamonds',
            'title_en' => 'Free Fire Diamonds',
            'title_ar' => 'الماس النار الحرة',
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
            'cover_image' => '1629510141.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        TopUp::create([
            'slug' => 'pubg-mobile-uc-global',
            'title_en' => 'PUBG Mobile UC (Global)',
            'title_ar' => 'ببجي موبايل',
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
            'cover_image' => '1629510343.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        TopUp::create([
            'slug' => 'riot-access-code-mena',
            'title_en' => 'Riot Access Code (MENA)',
            'title_ar' => 'رمز الوصول إلى مكافحة الشغب',
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
            'cover_image' => '1629510560.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        TopUp::create([
            'slug' => 'be-the-king-global-gold',
            'title_en' => 'Be The King (Global) Gold',
            'title_ar' => 'كن الملك (عالمي) ذهبي',
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
            'cover_image' => '1629510736.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        TopUp::create([
            'slug' => 'call-of-duty-mobile',
            'title_en' => 'Call of Duty Mobile',
            'title_ar' => 'كول اوف ديوتي موبايل',
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
            'cover_image' => '1629510967.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        TopUp::create([
            'slug' => 'rules-of-survival',
            'title_en' => 'Rules of Survival',
            'title_ar' => 'قواعد البقاء',
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
            'cover_image' => '1629511164.webp',
            'popular' => '1',
            'status' => '0',

        ]);

        for ($i=1; $i < 8; $i++) { 
            TopUpAmount::create([
                'topUp_id' => "$i",
                'amount' => '60 Unknown Cash',
                'price' => '1',
                'merchant_price' => '0.9',
                'status' => '0',
                'stock' => '10',
            ]);
            TopUpAmount::create([
                'topUp_id' => "$i",
                'amount' => '300 + 25 Extra Unknown Cash',
                'price' => '5',
                'merchant_price' => '4.5',
                'status' => '0',
                'stock' => '10',
            ]);
            TopUpAmount::create([
                'topUp_id' => "$i",
                'amount' => '600 + 90 Extra Unknown Cash',
                'price' => '10',
                'merchant_price' => '7',
                'status' => '0',
                'stock' => '10',
            ]);
            TopUpAmount::create([
                'topUp_id' => "$i",
                'amount' => '1500 + 375 Extra Unknown Cash',
                'price' => '15',
                'merchant_price' => '12',
                'status' => '0',
                'stock' => '10',
            ]);
        }

        for ($i=1; $i < 8; $i++) { 
            TopUpInformation::create([
                'topUp_id' => "$i",
                'name' => "Player ID",
                'placeholder' => "Please Enter Player ID"
            ]);
        }
        
        
    }
}
