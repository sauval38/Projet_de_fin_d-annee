<?php
namespace Controllers;

use Views\LegalNoticesViews;

class LegalNoticesController {
    protected $legalNoticeViews;

    public function __construct() {
        $this->legalNoticeViews = new LegalNoticesViews;
    }

    public function notice() {
        $this->legalNoticeViews->legalNotices();
    }
}