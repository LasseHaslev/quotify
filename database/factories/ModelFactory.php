<?php

use App\Language;
use App\User;
use App\Quote;
use App\Author;

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

$factory->define(App\Language::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'link' => $faker->url,
        'born' => $faker->dateTimeBetween( '-100 years', '-50 years' ),
        'died' => $faker->dateTimeBetween( '-50 years', 'now' ),
    ];
});
$factory->define(App\Quote::class, function (Faker\Generator $faker) {
    return [
        'author_id'=> function () {
            $author = Author::all()->count() ? Author::all()->random() : factory(Author::class)->create()->id;
            return $author->id;
        },
    ];
});
$factory->define(App\QuoteLanguage::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->text,
        'confirmed_by'=> function () {
            $user = User::all()->count() ? User::all()->random() : factory(User::class)->create()->id;
            return $user->id;
        },
        'quote_id'=> function () {
            $quote = Quote::all()->count() ? Quote::all()->random() : factory(Quote::class)->create()->id;
            return $quote->id;
        },
        'language_id'=> function () {
            $language = Language::all()->count() ? Language::all()->random() : factory(Language::class)->create()->id;
            return $language->id;
        }
    ];
});


