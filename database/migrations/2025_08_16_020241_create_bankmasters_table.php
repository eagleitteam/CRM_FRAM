<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bankmasters', function (Blueprint $table) {
            $table->id();

            $table->string('act_type');
            $table->string('Bank_Name');
            $table->string('BankBranch');
            $table->string('BankAccountNo');
            $table->string('BankIFSCCode');
            $table->string('Remark')->nullable();
            $table->integer('status')->default(1); // 1 for active, 2 for inactive
            
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bankmasters');
    }
};
