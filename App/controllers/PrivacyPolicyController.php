<?php
namespace Controllers;

use Views\PrivacyPolicyViews;

class PrivacyPolicyController {
    protected $privacyPolicyViews;

    public function __construct() {
        $this->privacyPolicyViews = new PrivacyPolicyViews();
    }

    public function privacy() {
        $this->privacyPolicyViews->privacyPolicy();
    }
}

