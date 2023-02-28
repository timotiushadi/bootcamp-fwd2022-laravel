<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ManagementAccess\RoleUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // userID ->  -> roleID
        User::findOrFail(1)->role()->sync(1);

        // Set user id '2' to get role id '2' Admin
        User::findOrFail(2)->role()->sync(2);
    }
}
