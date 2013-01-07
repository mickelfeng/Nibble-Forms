<?php

require_once dirname(__FILE__) . '/NibbleForm.class.php';

$form = \NibbleForms\NibbleForm::getInstance('');
$form->addField('first_name', 'text', array(
    'class' => 'testy classes',
    'max_length' => 20
));
$email = $form->addfield('email', 'email', array(
    'required' => false,
    'label' => 'Please confirm your email'
        ));
$email->addConfirmation('confirm_email', array(
    'label' => 'Please confirm your email'
));
$form->addField('example_select', 'select', array(
    array('data-luke' => '2five', 'Luke'),
    'Ben'
));

if($form->validate()){
    echo "good";
} else {
    echo "bad";
}

