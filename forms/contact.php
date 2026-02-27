<?php

$receiving_email_address = 'miguelantoniomunoz03@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('No se pudo cargar la librería PHP Email Form');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['nombre'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['asunto'];

$contact->add_message($_POST['nombre'], 'Nombre');
$contact->add_message($_POST['email'], 'Correo');
$contact->add_message($_POST['mensaje'], 'Mensaje', 10);

echo $contact->send();

?>
