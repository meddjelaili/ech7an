<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
                    'Game Card',
                    'Codes',
                    'Direct Top Up',
                    'Game Top Up',
                    'Top Up Amount',
                    'Wallets',
                    'Merchants',
                    'Card/New Orders',
                    'Card/Failed Orders',
                    'Card/Confermed Orders',
                    'Card/Failed Payment',
                    'Top Up/New Orders',
                    'Top Up/Failed Orders',
                    'Top Up/Confermed Orders',
                    'Top Up/Failed Payment',
                    'Localisation',
                    'Users',
                    'Pages',
                    'Configurations'
                ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
