<?php

class Helper 
{
    public static function render($view, $data = array()) 
    {
        $content = self::renderPart($view, $data);
        require BASE_DIR . '/view/layout.php';
    }

    public static function renderPart($view, $data = array()) 
    {
        ob_start();
        extract($data);
        require BASE_DIR . "/view/$view.php";
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
