<?php

class brahma {
    public $settings;

    public function __construct() {
        $this->settings = new settings;

    }

    public function build_screen($ps_screen_name) {
        echo $ps_screen_name;
    }

    public function import_active_theme() {
        echo '<link rel="stylesheet" href="' . $this->settings->get_active_theme_path() . '">';
    }

}