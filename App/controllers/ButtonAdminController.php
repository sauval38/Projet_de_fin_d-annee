<?php
namespace Controllers;

use Views\ButtonAdminViews;

class ButtonAdminController {
    protected $buttonAdminViews;

    public function __construct() {
        $this->buttonAdminViews = new ButtonAdminViews();
    }
    public function boutton() {
        $this->buttonAdminViews->button();
    }
}