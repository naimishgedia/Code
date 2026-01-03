if yoou want to make below tabble using migrations, then

sub_expanse_category
id,user_id,subcategory_name,created_at,updated_at,deleted_at


php artisan make:migration sub_expanse_category

aa command run karso atle database/migrations ma ek file banse je aavi hase

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//up function will be blank
        Schema::create('sub_expanse_category', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for the user
            $table->string('subcategory_name'); // Subcategory name
            $table->timestamps(); // created_at and updated_at columns
            $table->softDeletes(); // deleted_at column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		//down function will also be blank
         Schema::dropIfExists('sub_expanse_category');
    }
};

?>
tmare up and down function ma Schema no code add karine 

php artisan migrate  -  aa comand run karvo atle database ma table bani jase 

============================
have jo tamare aa table ma exp_cat_id field add karvi hoy to,


php artisan make:migration add_exp_cat_id_to_sub_expanse_category_table // aa comand run karvano

new generated migration file me nicheno code mukavano

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpCatIdToSubExpanseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_expanse_category', function (Blueprint $table) {
            $table->unsignedBigInteger('exp_cat_id')->after('user_id'); // Add the field after 'user_id'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_expanse_category', function (Blueprint $table) {
            $table->dropColumn('exp_cat_id'); // Remove the column if the migration is rolled back
        });
    }
}

?>
and pacho aa command run karvano - php artisan migrate

field add thai jase
