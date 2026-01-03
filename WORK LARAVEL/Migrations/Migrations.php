<?php

- php artisan make:migration table_name  // Open the newly created migration file, located in database/migrations 
- you need to modify up() and down() function in new generated migratioin file 
- php artisan migrate  //This will create the new table with the specified columns in your database.

- php artisan migrate:status // to check migration status
- php artisan migrate:rollback // undo the previous migration 
- php artisan migrate:refresh // If you want to roll back and re-run all migrations, you can use

//To add a user_id column in the user_income_category table
- php artisan make:migration add_user_id_to_user_income_category_table --table=user_income_category 
- Open the generated migration file and add the user_id column with a foreign key constraint
- php artisan migrate //Run the Migration
 