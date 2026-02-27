<?php

class PHP_Email_Form {

  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $ajax = false;

  private $messages = [];

  public function add_message($content, $label = '', $priority = 0) {
    $this->messages[] = $label . ': ' . $content;
  }

  public function send() {

    if(empty($this->to) || empty($this->from_email) || empty($this->subject)) {
      return 'Error: Datos incompletos';
    }

    $body = implode("\n\n", $this->messages);

    $headers  = "From: {$this->from_name} <{$this->from_email}>\r\n";
    $headers .= "Reply-To: {$this->from_email}\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($this->to, $this->subject, $body, $headers)) {
      return 'OK';
    } else {
      return 'Error al enviar el mensaje';
    }
  }
}
?>
