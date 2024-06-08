<?php

namespace App\Providers;

use Faker\Provider\Base as BaseProvider;

class FilipinoNameProvider extends BaseProvider
{
    protected static $maleFirstNames = [
        'Juan', 'Pedro', 'Jose', 'Ramon', 'Rafael', 'Mark', 'John Paul', 'Mikko', 'Bryan', 'Allen', 'Chirstian', 'Norman', 'Micaheal', 'Darwin', 'Maximo', 'Mark Justin', 'Justin', 'Ariel', 'John Mark', 'Mattew' // Add more Filipino male names
    ];

    protected static $femaleFirstNames = [
        'Maria', 'Anna', 'Luz', 'Carmen', 'Josephine', 'Grace', 'Trisha', 'Alex Nicole', 'Janela', 'Ashly', 'Pauline' // Add more Filipino female names
    ];

    protected static $lastNames = [
        'Santos', 'Gonzales', 'Reyes', 'Cruz', 'Torres', 'Dela Cruz', 'Cruz', 'Santiago', 'Roxas', 'Tomas', 'Delos Reyes', 'Ramos', 'Chua', 'Luartes', 'Domingo', 'Valentin', 'Muyut', 'Sambuena', 'Banting', 'Samson', 'Lopez' // Add more Filipino last names
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
