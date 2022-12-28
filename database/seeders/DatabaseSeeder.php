<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            'product',
            'category'
        ];
        $permissions = ['all', 'show', 'create', 'update', 'delete'];

        foreach ($models as $model) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $model . '_' . $permission]);
            }
        }
        $role1 = Role::create(['name' => 'product-editor']);

        $role1->givePermissionTo('product_update');
        $role1->givePermissionTo('product_all');

        $role2 = Role::create(['name' => 'product-delete']);
        $role2->givePermissionTo('product_delete');
        $role2->givePermissionTo('product_all');


        $role = Role::create(['name' => 'Super Admin']);



        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make(123456)
        ]);
        $user1 = User::factory()->create([
            'name' => 'Product Update',
            'email' => 'product@update.com',
            'password' => Hash::make(123456)
        ]);
        $user2 = User::factory()->create([
            'name' => 'Product Delete',
            'email' => 'product@delete.com',
            'password' => Hash::make(123456)
        ]);
        $user->assignRole($role);
        $user1->assignRole($role1);
        $user2->assignRole($role2);
    }
}
