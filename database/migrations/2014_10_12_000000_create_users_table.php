<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->boolean('is_active')->default(true);
            $table->string('email_verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('Schoolname')->nullable();
            $table->string('AdmNo')->nullable();
            $table->date('DOB')->nullable();
            $table->string('S_photo')->nullable();
            $table->timestamps();
        });

        Schema::create('user_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('current_year_of_university')->nullable();
            $table->text('personality')->nullable();
            $table->text('neighbor_expectations')->nullable();
            $table->text('self_description')->nullable();
            $table->text('additional_info')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('hostel_owners', function (Blueprint $table) {
            $table->id('HO_id'); // Auto-incrementing primary key
            $table->string('HO_name');
            $table->string('HO_email')->unique();
            $table->string('Password');
            $table->boolean('is_active')->default(true);
            $table->string('email_verification_code')->nullable();
            $table->timestamp('email_verification_at')->nullable();
            $table->rememberToken();
            $table->string('BusinessPermit')->nullable();;
            $table->string('Phone_number');
            $table->timestamps();
        });

        // Create hostels table
        Schema::create('hostels', function (Blueprint $table) {
            $table->id('H_id'); // Auto-incrementing primary key
            $table->string('H_name');
            $table->unsignedBigInteger('HO_id'); // Define the foreign key column
            $table->string('Address');
            $table->text('H_description');
            $table->decimal('Rent', 8, 2);
            $table->text('Amenities');
            $table->text('Rules');
            $table->boolean('Availability');
            $table->integer('NumberBeds');
            $table->integer('VacantBeds');
            $table->text('Photos')->nullable();
            $table->timestamps();

            // Set the foreign key constraint
            $table->foreign('HO_id')->references('HO_id')->on('hostel_owners')->onDelete('cascade');
        });

        // Create residents table
       /* Schema::create('residents', function (Blueprint $table) {
            $table->id('R_id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id'); // Changed from S_id to user_id
            $table->unsignedBigInteger('H_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Updated foreign key
            $table->foreign('H_id')->references('H_id')->on('hostels')->onDelete('cascade');
        });

        // Create reviews table
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('Reviewid'); // Auto-incrementing primary key
            $table->foreignId('R_id');
            $table->foreignId('H_id');
            $table->text('Review');
            $table->boolean('Flagged')->default(false);
            $table->timestamps();

            $table->foreign('H_id')->references('H_id')->on('hostels')->onDelete('cascade');
            $table->foreign('R_id')->references('R_id')->on('residents')->onDelete('cascade');
        });*/

        // Create admins table
        Schema::create('admins', function (Blueprint $table) {
            $table->id('A_id'); // Auto-incrementing primary key
            $table->string('A_name');
            $table->string('A_email')->unique();
            $table->string('A_password');
            $table->string('A_phonenumber');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop all tables in reverse order of creation
        Schema::dropIfExists('admins');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('residents');
        Schema::dropIfExists('hostels');
        Schema::dropIfExists('hostel_owners');
        Schema::dropIfExists('users'); // Updated from students to users
    }
};
