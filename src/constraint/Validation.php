<?php

namespace App\src\constraint;

use App\config\Parameter;
use App\src\constraint\UserValidation;
class Validation{
    public function validate(Parameter $data, string $name){
        $classValidationName = ucfirst($name).'Validation';
        $this->createValidateClass($classValidationName, $data);
    }
    public function createValidateClass($classValidationName, $data){
        $class = 'App\src\constraint\\'.$classValidationName;
        $classValidtion = new $class;
        $errors = $classValidtion->check($data);
        return $errors;
    }
}