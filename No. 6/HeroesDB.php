<?php

/**
 *  Hello, I've updated the database to fit your request better.
 * 
 *  And this is the database schema (the mickey mouse version) for creating table in PHP Laravel.
 *  Since the real way to do it in Laravel is by creating migration file per table.
 *
 *  Lastly, I want to ensure normalization across all of the data - 
 *  as such there will be no data repeat across the DB (unless its a name or a Foreign Key).
 */


/**
 *  Countries Table
 *
 *  ID | Country
 */ 
 Schema::create('countries', function (Blueprint $table) {
    $table->increments('id');
    $table->string('country');
    $table->boolean('isExist')->default(true);
});

/**
 *  Cities Table
 *
 *  ID | City | Country_ID
 */
Schema::create('cities', function (Blueprint $table) {
    $table->increments('id');
    $table->string('city');
    $table->boolean('isExist')->default(true);
    $table->integer('country_id')->unsigned(); // Foreign Key
    $table->foreign('country_id')->references('id')->on('countries');
});

/**
 *  Genders Table
 *
 *  ID | Gender
 */
Schema::create('genders', function (Blueprint $table) {
    $table->increments('id');
    $table->string('gender');
});

/**
 *  Statuses Table
 *
 *  ID | Status
 */
Schema::create('statuses', function (Blueprint $table) {
    $table->increments('id');
    $table->string('status'); // Missing, Dead, Active, Retired etc
});

/**
 *  Superheroes Table
 *
 *  ID | First Name | Last Name | Alter Ego | Status_ID | Gender_ID
 */
Schema::create('superheroes', function (Blueprint $table) {
    $table->increments('id');
    $table->string('first_name');
    $table->string('last_name');
    $table->string('alter_ego');
    $table->integer('status_id')->unsigned(); // Foreign Key
    $table->integer('gender_id')->unsigned(); // Foreign Key
    $table->foreign('status_id')->references('id')->on('statuses');
    $table->foreign('gender_id')->references('id')->on('genders');
});

/**
 *  Heroes Addresses Table
 *
 *  ID | Address | Superhero ID | City ID | isActive
 */
Schema::create('heroes_addresses', function (Blueprint $table) {
    $table->increments('id');
    $table->string('address');
    $table->integer('superhero_id')->unsigned(); // Foreign Key
    $table->integer('city_id')->unsigned(); // Foreign Key
    $table->foreign('superhero_id')->references('id')->on('superheroes');
    $table->foreign('city_id')->references('id')->on('cities');
    $table->string('isActive')->default(true);
});

/**
 *  Powers Table
 *
 *  ID | Power | Description | PowerLv
 */
Schema::create('powers', function (Blueprint $table) {
    $table->increments('id');
    $table->string('power');
    $table->string('description');
    $table->integer('PowerLv');
});

/**
 *  Superheroes Powers Table
 *
 *  ID | Superhero_ID | Power_ID
 */
Schema::create('superheroes_powers', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('superhero_id')->unsigned(); // Foreign Key
    $table->integer('power_id')->unsigned(); // Foreign Key
    $table->foreign('superhero_id')->references('id')->on('superheroes');
    $table->foreign('power_id')->references('id')->on('powers');
});

?>