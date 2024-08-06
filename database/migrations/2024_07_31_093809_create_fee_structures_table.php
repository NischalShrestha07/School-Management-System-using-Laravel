<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**$table->foreignId('class_id'): This creates a new column called class_id in your table, which will store the ID of a class. This column is used to link rows in this table to rows in another table (usually called classes).

    ->constrained(): This tells Laravel that the class_id column should be treated as a foreign key. A foreign key is a way to enforce a link between two tables, meaning that the value in class_id must exist in the id column of the classes table.

    ->onDelete('cascade'): This means that if a row in the classes table is deleted, then all rows in the current table that reference this class (through class_id) will also be deleted automatically. This helps to keep your database clean and consistent. */

    public function up(): void
    {
        if (!Schema::hasTable('fee_structures')) {
            Schema::create('fee_structures', function (Blueprint $table) {
                $table->id();
                $table->foreignId('class_id')->constrained()->onDelete('cascade');
                $table->foreignId('academic_year_id')->constrained()->onDelete('cascade');
                $table->foreignId('feehead_id')->constrained()->onDelete('cascade');
                $table->string('april')->nullable();
                $table->string('may')->nullable();
                $table->string('june')->nullable();
                $table->string('july')->nullable();
                $table->string('august')->nullable();
                $table->string('september')->nullable();
                $table->string('october')->nullable();
                $table->string('november')->nullable();
                $table->string('december')->nullable();
                $table->string('january')->nullable();
                $table->string('february')->nullable();
                $table->string('march')->nullable();
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_structures');
    }
};
