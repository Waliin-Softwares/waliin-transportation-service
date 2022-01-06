<?php


namespace app\core\form;
use app\core\Model;


class Field{
    public Model $model;
    public string $attribute;
    public string $type;
    public function __construct(Model $model, $attribute, $type="text"){
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
    }

    public function __toString(){
        $label = ucfirst(preg_replace('/([A-Z])/', ' $1', $this->attribute));
        if($this->type == 'gender'){
            return sprintf('
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="M" %s>Male </option>
                        <option value="F" %s>Female </option>
                    </select>
                </div>
                ', 
                $this->model->gender=="M" ? "selected" : "",
                $this->model->gender=="F" ? "selected" : ""

        );
                
        }
        return sprintf('
                <div class="form-group">
                    <label>%s</label>
                    <input type="%s" name="%s" value="%s" class="form-control%s">
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
            ', 
                $label, 
                $this->type,
                $this->attribute,
                $this->model->{$this->attribute},
                $this->model->hasError($this->attribute) ? ' is-invalid' : '',
                $this->model->getError($this->attribute)
            );
    } 
}

?>