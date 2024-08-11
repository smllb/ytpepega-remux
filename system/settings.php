<?php

require 'statics.php';

class settings
{
    private $active_theme;
    private $themes_folder_path;
    private $config_folder_path;

    private $output_folder;
    private $global_output_format;

    private $settings_file_path;

    private $raw_settings;

    public function __construct()
    {
        $this->settings_file_path = ROOT_PATH . "/config/settings.json";

        if (!file_exists($this->settings_file_path))
        {
            $this->generate_default_settings_file();
            $this->populate_default_settings_file();

        }

        $this->initialize_settings();
    }
    public function initialize_settings() {
        $this->raw_settings = json_decode(file_get_contents($this->settings_file_path), true);

        $this->active_theme = $this->raw_settings["active_theme"];

        $this->output_folder = $this->raw_settings["output_folder"];
        $this->global_output_format = $this->raw_settings["global_output_format"];
        $this->config_folder_path = $this->raw_settings["folders"]["config"]["path"];
        $this->themes_folder_path = $this-> config_folder_path . $this->raw_settings["folders"]["themes"]["path"];
    }
    public function generate_default_settings_file(): string | false {
        $vs_file_name = "settings";
        $vs_file_format = "json";
        $vs_file_folder = "config";
        $vs_file_path = ROOT_PATH . "/" . $vs_file_folder . "/" . $vs_file_name . "." . $vs_file_format;

        $vs_file_dirname = dirname($vs_file_path);
        if (!is_dir($vs_file_dirname)) {
            if (!mkdir($vs_file_dirname, 0666, true)) {
                return false;
            }
        }

        if (!file_exists($vs_file_path)) {
            $file = fopen($vs_file_path, "w+");
            if ($file === false) {
                return false;
            }
            fclose($file);
        }

        return $vs_file_path;
    }
    public function populate_default_settings_file() {

    }
    public function read_directory_recursively($ps_directory_path, $pa_files = []) {

    }

    public function get_active_theme_path() {
        return "./" .  $this->themes_folder_path . $this->active_theme . ".css";
    }

}
