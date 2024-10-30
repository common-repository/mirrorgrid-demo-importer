<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * MirrorgridToolKit Autoloader.
 *
 * @class           MG_Config_Demo
 * @version        1.0.0
 * @package        MirrorgridToolKit/Classes
 * @category        Class
 * @author        Mirrorgrid
 */
class MG_Admin_Demo_Config
{

    private $theme = '';
    private $import_class = '';

    public function __construct()
    {
        $this->theme = wp_get_theme();
        add_filter('mg-demo-content-import', array($this, 'import_files'));
        add_action('mg-after-demo-content-import', array($this, 'after_import'));
    }

    private function get_import_class()
    {

        $supported_themes = $this->supported_themes();
        $demo_class = '';
        foreach ($supported_themes as $theme) {
            $theme_name = isset($theme['theme_name']) ? $theme['theme_name'] : '';
            if (trim($theme_name) === trim($this->theme)) {

                $demo_class = isset($theme['demo_class']) ? $theme['demo_class'] : '';
                break;
            }
        }

        return $demo_class;
    }

    private function supported_themes()
    {

        return array(

            'newspaper_lite' => array(

                'theme_name' => 'Newspaper Lite',
                'demo_class' => 'MG_Theme_Demo_Newspaper_Lite',
            ),
            'newspaper_plus' => array(

                'theme_name' => 'Newspaper Plus',
                'demo_class' => 'MG_Theme_Demo_Newspaper_Plus',
            )
        );


    }


    public function import_files()
    {

        $import_class = $this->get_import_class();

        if (empty($import_class)) {

            return array();
        }


        return $import_class::import_files();

    }

    public function after_import($selected_import)
    {


        $import_class = $this->get_import_class();


        if (empty($import_class)) {

            return '';
        }

        $import_class::after_import($selected_import);
    }
}

new MG_Admin_Demo_Config();
