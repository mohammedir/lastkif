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

            /**/'show-slider-sidebar',
            'delet-slider',
            'add-slider',
            'status-slider',

          /**/  'show-pages-sidebar',
                'edit-page',

           /**/ 'show-menus-sidebar',
            'show-subscribedUsers-sidebar',
            'add-subscribedUsers',
            'edit-subscribedUsers',
            'delet-subscribedUsers',
            'exported-subscribedUsers',

            /**/'show-users-sidebar',
            'show-user-list',
            'add-user',
            'edit-user',
            'add-user',
            'show-user-permissions',
            'add-permissions',
            'edit-permissions',

            /**/'show-widgets-sidebar',
            'edit-widgets',
            /**/'show-setting-sidebar',




        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }


    }
}
