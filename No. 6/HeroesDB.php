<?php

/**
 *  Hello, please be advised that I am assuming all Heroes in the Database HAVE ONE ADDRESS.
 *  
 *  Because it seems all heroes have different addresses.
 *
 *  And this is the database schema (the mickey mouse version) for creating table in PHP Laravel.
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
});

/**
 *  Cities Table
 *
 *  ID | City | Country_ID
 */
Schema::create('cities', function (Blueprint $table) {
    $table->increments('id');
    $table->string('city');
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
 *  Heroes Table
 *
 *  ID | First Name | Last Name | Alter Ego | Address | Status_ID | Gender_ID | City_ID
 */
Schema::create('superheroes', function (Blueprint $table) {
    $table->increments('id');
    $table->string('first_name');
    $table->string('last_name');
    $table->string('alter_ego');
    $table->string('address');
    $table->integer('status_id')->unsigned(); // Foreign Key
    $table->integer('gender_id')->unsigned(); // Foreign Key
    $table->integer('city_id')->unsigned(); // Foreign Key
    $table->foreign('status_id')->references('id')->on('statuses');
    $table->foreign('gender_id')->references('id')->on('genders');
    $table->foreign('city_id')->references('id')->on('cities');
});

/**
 *  Powers Table
 *
 *  ID | Power | Description
 */
Schema::create('powers', function (Blueprint $table) {
    $table->increments('id');
    $table->string('power');
    $table->string('description');
});

/**
 *  Hero Powers Table
 *
 *  ID | Superhero_ID | Power_ID | isActive
 */
Schema::create('hero_powers', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('superhero_id')->unsigned(); // Foreign Key
    $table->integer('power_id')->unsigned(); // Foreign Key
    $table->foreign('superhero_id')->references('id')->on('superheroes');
    $table->foreign('power_id')->references('id')->on('powers');
    $table->boolean('isActive'); // So nothing needs to be deleted
});



?>