<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/*Factory to create new people*/

$factory->define(App\People::class, function ($faker) {

	return [
		'user_id'			=> App\User::all()->random()->id,
		'first_name' 		=> $faker->firstName,
		'last_name'			=> $faker->lastName,
		'email' 			=> $faker->unique()->safeEmail,
		'contact_no'		=> $faker->e164PhoneNumber,
		'country' 			=> $faker->country,
		'city'				=> $faker->city,
		'address'			=> $faker->address
	];
});



/* Factory to create new courses */

$factory->define(App\Course::class, function ($faker) {

	return [
		'user_id'		=> App\User::all()->random()->id,
		'title' 		=> $faker->sentence,
		'body'			=> $faker->paragraph,
		'country' 		=> $faker->country,
		'city'			=> $faker->city,
		'address'		=> $faker->address
	];
});

/*Factory to create new events*/

$factory->define(App\Event::class, function ($faker) {

	return [
		'user_id'		=> App\User::all()->random()->id,
		'title' 		=> $faker->sentence,
		'body'			=> $faker->paragraph,
		'country' 		=> $faker->country,
		'city'			=> $faker->city,
		'address'		=> $faker->address
	];
});

/* Factory to create new batches */

$factory->define(App\Batch::class, function ($faker) {

	// Random datetime for starting date within a week
	$startingDate = $faker->dateTimeBetween('this week', '+6 days');
	// Random datetime for ending date of the current week *after* `$startingDate`
	$endingDate   = $faker->dateTimeBetween($startingDate, '+3 months');

	// Random datetime for starting time
	$startingTime = $faker->dateTimeBetween('this week', '+1 hours');
	// Random datetime of ending time from the starting
	$endingTime   = $faker->dateTimeBetween($startingTime, '+3 hours');

	$createbatchforcourse[] = [
		'user_id'		=> App\User::all()->random()->id,
		'parent_id'		=> App\Course::all()->random()->id,
		'start_date'	=> $startingDate,
		'end_date'		=> $endingDate,
		'start_time'	=> $startingTime,
		'end_time'		=> $endingTime,
		'start_day'		=> $faker->dayOfWeek,
		'end_day'		=> $faker->dayOfWeek,
		'price'			=> $faker->numberBetween($min = 1, $max = 10) * 100 
	];

	$createbatchforcourse[] = [
		'user_id'		=> App\User::all()->random()->id,
		'parent_id'		=> App\Event::all()->random()->id,
		'start_date'	=> $startingDate,
		'end_date'		=> $endingDate,
		'start_time'	=> $startingTime,
		'end_time'		=> $endingTime,
		'start_day'		=> $faker->dayOfWeek,
		'end_day'		=> $faker->dayOfWeek,
		'price'			=> $faker->numberBetween($min = 1, $max = 10) * 100 
	];

	return $createbatchforcourse[array_rand($createbatchforcourse,1)];
});