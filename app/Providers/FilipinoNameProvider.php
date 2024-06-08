<?php

namespace App\Providers;

use Faker\Provider\Base as BaseProvider;

class FilipinoNameProvider extends BaseProvider
{
    protected static $maleFirstNames = [
        'Juan', 'Pedro', 'Jose', 'Ramon', 'Rafael', 'Mark', 'John Paul', 'Mikko', 'Bryan' // Add more Filipino male names
    ];

    protected static $femaleFirstNames = [
        'Maria', 'Anna', 'Luz', 'Carmen', 'Josephine', 'Grace', 'Trisha', 'Alex Nicole', 'Janela', 'Ashly', 'Pauline' // Add more Filipino female names
    ];

    protected static $lastNames = [
        'Santos', 'Gonzales', 'Reyes', 'Cruz', 'Torres', 'Dela Cruz', 'Cruz', 'Santiago', 'Roxas' // Add more Filipino last names
    ];
    public function filipinoName($gender = null)
    {
        $firstName = $gender == 'Male'
            ? static::randomElement(static::$maleFirstNames)
            : static::randomElement(static::$femaleFirstNames);

        return $firstName;
    }
    public function filipinoLastName()
    {
        return static::randomElement(static::$lastNames);
    }
}
