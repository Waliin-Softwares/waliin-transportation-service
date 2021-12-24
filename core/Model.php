<?php 
namespace app\core;

abstract class Model{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public array $errors = [];

    abstract public function rules();

    public function loadData($data){
        foreach($data as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }
    



    public function validate(){
        foreach($this->rules() as $attribute => $rules){
            $value = $this->{$attribute};
            foreach($rules as $rule){
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, $ruleName);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, $ruleName);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule["min"]){
                    $this->addError($attribute, $ruleName, $rule);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule["max"]){
                    $this->addError($attribute, $ruleName, $rule);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule["match"]}){
                    $this->addError($attribute, $ruleName, $rule);
                }

            }
        }
        return empty($this->errors);
    }

    public function addError($attribute, $ruleName, $params = []){
        $message = $this->errorMessages()[$ruleName] ?? "";
        foreach($params as $key => $value){
            if($key !== 0){
                $message = str_replace("{{$key}}", $value, $message);
            }
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages(){
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be a valid email',
            self::RULE_MIN => 'This field must be at least {min} characters long',
            self::RULE_MAX => 'This field must be at most {max} characters long',
            self::RULE_MATCH => 'This field must match {match}',
            self::RULE_UNIQUE => 'This field must be unique',
        ];
    }
    public function getError($attribute){
        return $this->errors[$attribute][0] ?? false;
    }
    public function hasError($attribute){
        return $this->errors[$attribute] ?? false;
    }
}
?>