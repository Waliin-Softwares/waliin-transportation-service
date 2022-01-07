<?php 
namespace app\core;

abstract class Model{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public const RULE_ALPHA = 'alpha';
    public const RULE_PHONENUM = 'phonenum';
    public const RULE_NUNIQUE = 'nunique';
    public const RULE_DBMATCH = 'dbmatch';
    public array $errors = [];

    abstract public function rules();

    public function loadData($data){
        foreach($data as $key => $value){
            if(property_exists($this, $key)){
                var_dump($this->{$key});
                var_dump($value);
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
                    $this->addErrorForRule($attribute, $ruleName);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addErrorForRule($attribute, $ruleName);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule["min"]){
                    $this->addErrorForRule($attribute, $ruleName, $rule);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule["max"]){
                    $this->addErrorForRule($attribute, $ruleName, $rule);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule["match"]}){
                    $this->addErrorForRule($attribute, $ruleName, $rule);
                }
                if($ruleName === self::RULE_UNIQUE && $this->findBy($attribute, $value)){
                    $this->addErrorForRule($attribute, $ruleName);
                }
                if($ruleName === self::RULE_ALPHA && !ctype_alpha($value)){
                    $this->addErrorForRule($attribute, $ruleName);
                }
                if($ruleName === self::RULE_PHONENUM && (!ctype_digit($value) || strlen($value) != 10)){
                    $this->addErrorForRule($attribute, $ruleName);
                }
                if($ruleName === self::RULE_NUNIQUE && $this->findBy($attribute, $value) && $value != Application::$app->user->{$attribute}){
                    $this->addErrorForRule($attribute, self::RULE_UNIQUE);
                }
                if($ruleName === self::RULE_DBMATCH && $value != $this->{$rule["match"]} && !password_verify($value, $this->{$rule["match"]})){
                    $this->addErrorForRule($attribute, $ruleName, $rule);
                }
            }
        }
        return empty($this->errors);
    }
    
    private function addErrorForRule($attribute, $ruleName, $params = []){
        $message = $this->errorMessages()[$ruleName] ?? "";
        foreach($params as $key => $value){
            if($key !== 0){
                $message = str_replace("{{$key}}", $value, $message);
            }
        }
        $this->errors[$attribute][] = $message;
    }
    public function addError($attribute, $message){
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
            self::RULE_ALPHA => 'This feild must be an alphabet',
            self::RULE_PHONENUM => 'Incorrect phone number format',
            self::RULE_DBMATCH => 'This field must be similar to your {match}' 
        ];
    }
    public function getError($attribute){
        return $this->errors[$attribute][0] ?? false;
    }
    public function hasError($attribute){
        return $this->errors[$attribute] ?? false;
    }
    public function findBy($attribute, $value){
        $tableName = $this->tableName();
        $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $attribute = :$attribute");
        $statement->bindValue(":$attribute", $value);
        $statement->execute();
        $val = $statement->fetch();
        return $val;
        
    }
    
}
?>