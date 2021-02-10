<?php

namespace backend\components;

use yii\validators\Validator;

class BussinessValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {

        if (is_array($model->$attribute)) {

            if (in_array(5, $model->$attribute) && in_array(4, $model->$attribute)) {
                $this->addError($model, $attribute, 'You can not be an officer and a director');
            }


            if (in_array(5, $model->$attribute) && in_array(6, $model->$attribute)) {
                $this->addError($model, $attribute, 'You can not be a director and an employee');
            }
        }
    }
}
