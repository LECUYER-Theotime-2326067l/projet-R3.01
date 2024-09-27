<?php

namespace modules\blog\views;

class error
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function show()
    {
        echo "<h1>Erreur : " . htmlspecialchars($this->message) . "</h1>";
    }
}
