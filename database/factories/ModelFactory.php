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
$factory->define(Sisec\Enterprise::class, function (Faker\Generator $faker) {
    return [
        'rfc' => $faker->swiftBicNumber,
        'nameemp' => $faker->company,
        'legalagent' => $faker->name($gender = null|'male'|'female'),
        'type' => 'Supervisora',
        'status' => 'Activa',
        'email' => $faker->email,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});


$factory->define(cultiva\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'firstlastname' => $faker->lastname,
        'secondlastname' => $faker->lastname,
        'email' => $faker->email,
        'celphone' => $faker->phoneNumber,
        'status' => 'Activo',
        'state_id' => cultiva\States::all()->random()->id,
        'municipalities_id' => cultiva\Municipalities::all()->random()->id,
        'typeuser' => '1',
        'password' => (str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(Sisec\Commitment::class, function (Faker\Generator $faker) {
    return [
        'codeCG' => $faker ->randomDigit, 
        'nameCommitment' => $faker->name,
    ];
});

$factory->define(Sisec\ContractWork::class, function (Faker\Generator $faker) {
    return [
        'secondment' => $faker->randomElement($array = array ('Federal','Alimentadora')),
        'amount' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'nameWork' => $faker->company,
        'placeTender' => $faker->randomElement($array = array ('Centro SCT','SCT')),
        'descriptionWork' => $faker->text,
        'numberContract' => $faker->creditCardNumber,
        'numberTender' => $faker->creditCardNumber,
        'dateFailure' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'dateAdjudication' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'startContract' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'finishContract' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'startReal' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'finishReal' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'amount1a' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'percentage1a' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'amount2a' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'percentage2a' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'state_id' => Sisec\State::all()->random()->id,
        'residentWork_id' => Sisec\User::all()->random()->id,
        'commitment_id' => Sisec\Commitment::all()->random()->id,
    ];
});

$factory->define(Sisec\ContractSupervision::class, function (Faker\Generator $faker) {
    return [
        'concept' => $faker->text,
        'amount' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'tenderNumber' => $faker->creditCardNumber,
        'tenderPlace' => $faker->randomElement($array = array ('Centro SCT','SCT')),
        'contractNumber' => $faker->creditCardNumber,
        'startDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'endDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'meeting' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'failure' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'realStart' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'realFinish' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'opening' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'enterprise_id' => Sisec\Enterprise::all()->random()->id,
        'user_id' => Sisec\User::all()->random()->id,
    ];
});

$factory->define(Sisec\ContractEnviromental::class, function (Faker\Generator $faker) {
    return [
        'concept' => $faker->text,
        'amount' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'tenderNumber' => $faker->creditCardNumber,
        'tenderPlace' => $faker->randomElement($array = array ('Centro SCT','SCT')),
        'contractNumber' => $faker->creditCardNumber,
        'startDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'endDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'meeting' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'failure' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'realStart' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'realFinish' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'opening' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'enterprise_id' => Sisec\Enterprise::all()->random()->id,
        'user_id' => Sisec\User::all()->random()->id,
    ];
});

$factory->define(Sisec\EpWorkplan::class, function (Faker\Generator $faker) {
    return [
        'January' => $faker->boolean($chanceOfGettingTrue = 1),
        'February' => $faker->boolean($chanceOfGettingTrue = 1),
        'March' => $faker->boolean($chanceOfGettingTrue = 1),
        'April' => $faker->boolean($chanceOfGettingTrue = 1),
        'May' => $faker->boolean($chanceOfGettingTrue = 1),
        'June' => $faker->boolean($chanceOfGettingTrue = 1),
        'July' => $faker->boolean($chanceOfGettingTrue = 1),
        'Agust' => $faker->boolean,
        'September' => $faker->boolean,
        'October' => $faker->boolean,
        'November' => $faker->boolean,
        'December' => $faker->boolean,
        'Code' => $faker->name,
    ];
});

$factory->define(Sisec\Workplan::class, function (Faker\Generator $faker) {
    return [
        'Year' => $faker->year($max = 'now'),
        'entailment_cont_sups_id' => Sisec\EntailmentContSup::all()->random()->id,
        'Ep1' => Sisec\EpWorkplan::all()->random()->id,
        'Ep4' => Sisec\EpWorkplan::all()->random()->id,
        'Ep6' => Sisec\EpWorkplan::all()->random()->id,
        'Ep8' => Sisec\EpWorkplan::all()->random()->id,
        'Ep10' => Sisec\EpWorkplan::all()->random()->id,
        'Ep18' => Sisec\EpWorkplan::all()->random()->id,
    ];
});
