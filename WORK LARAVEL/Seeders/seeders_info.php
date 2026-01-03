<?php
To insert 20 records into your users table using seeders in Laravel, follow these steps:

Step 1: Create a Seeder
- Run the following Artisan command to generate a new seeder file:

php artisan make:seeder UsersTableSeeder

- This will create a file named UsersTableSeeder.php in the database/seeders directory.


Step 2: Update the Seeder File
Edit the UsersTableSeeder.php file as follows:

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel; // Import your UserModel
use Illuminate\Support\Facades\Hash; // For password hashing

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	//run function is initially blank
    public function run()
    {
        // Insert 20 records
        for ($i = 1; $i <= 20; $i++) {
            UserModel::create([
                'type' => 'user', // You can set a default type or generate dynamically
                'name' => "User $i",
                'email' => "user$i@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Encrypt the password
                'visible_password' => 'password123', // Store plain text if required
            ]);
        }
    }
}



To insert 20 records into your users table using seeders in Laravel, follow these steps:

Step 1: Create a Seeder
Run the following Artisan command to generate a new seeder file:

bash
Copy code
php artisan make:seeder UsersTableSeeder
This will create a file named UsersTableSeeder.php in the database/seeders directory.

Step 2: Update the Seeder File
Edit the UsersTableSeeder.php file as follows:

php
Copy code
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel; // Import your UserModel
use Illuminate\Support\Facades\Hash; // For password hashing

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert 20 records
        for ($i = 1; $i <= 20; $i++) {
            UserModel::create([ 
                'type' => 0, // You can set a default type or generate dynamically
                'name' => "User $i",
                'email' => "user$i@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Encrypt the password
                'visible_password' => 'password123', // Store plain text if required
            ]);
        }
    }
}
Step 3: Run the Seeder
Run the seeder with the following command:

php artisan db:seed --class=UsersTableSeeder

This will insert 20 records into your users table.
