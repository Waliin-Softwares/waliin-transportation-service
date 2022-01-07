<?php


namespace app\core\form;
use app\core\Model;


class Field{
    public Model $model;
    public string $attribute;
    public string $type;
    public array $options;
    public function __construct(Model $model, $attribute, $type, $options){
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
        $this->options = $options;
    }

    public function __toString(){
        $label = ucfirst(preg_replace('/([A-Z])/', ' $1', $this->attribute));
        if($this->type == 'select'){
            $options = ''; 
            foreach($this->options as $key => $value){
                $options .= sprintf("<option value='%s' %s>%s</option>" . PHP_EOL,
                    $key,
                    $this->model->{$this->attribute} == $key ? 'selected' : '',
                    $value
                );
            }
            return "
                <div class='form-group'>
                    <label>$label</label>
                    <select class='form-control' name='{$this->attribute}'>
                        $options
                    </select>
                </div>"
            ;
            
        }
        elseif($this->type == 'checkbox'){
            $userid = $this->options[0];
            $username = $this->options[1];
            return "
                <div class='form-group'>
                <div class='checkbox'>
                    <label><input type='checkbox' name='others[]' value='$userid'> $username</label>
                </div>
                </div>"
            ;
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