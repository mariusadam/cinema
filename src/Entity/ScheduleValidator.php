<?php

namespace Entity;

use Symfony\Component\Validator\Validation;

class ScheduleValidator {

    public function validate(ScheduleEntity $schedule) {
        $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
        $violations = $validator->validate($schedule);
        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                throw new \Exception($violation->getMessage());
            }
        }
    }

}