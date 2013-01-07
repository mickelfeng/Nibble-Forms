<?php
namespace NibbleForms\Field;

class Checkbox extends MultipleOptions 
{

    public function returnField($form_name, $name, $value = '') 
    {
        $field = '';
        foreach ($this->options as $key => $val) {
            $attributes = $this->getAttributeString($val);
            $field .= sprintf('<input type="checkbox" name="%6$s[%1$s][]" id="%6$s_%3$s" value="%2$s" %4$s/>' .
                    '<label for="%6$s_%3$s">%5$s</label>'
                    , $name, $key, \NibbleForms\Useful::slugify($name) . '_' . \NibbleForms\Useful::slugify($key), (is_array($value) && in_array((string) $key, $value) ? 'checked="checked"' : '') . $attributes['string'], $attributes['val'], $form_name);
        }
        $class = !empty($this->error) ? ' class="error"' : '';
        return array(
            'messages' => !empty($this->custom_error) && !empty($this->error) ? $this->custom_error : $this->error,
            'label' => $this->label == false ? false : sprintf('<p%s>%s</p>', $class, $this->label),
            'field' => $field,
            'html' => $this->html
        );
    }

}
