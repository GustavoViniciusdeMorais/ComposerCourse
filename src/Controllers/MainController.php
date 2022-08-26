<?php

namespace Gustavo\Package\Controllers;

class MainController
{
    public function test($msg)
    {
        return sprintf("Message: %s", $msg);
    }
}