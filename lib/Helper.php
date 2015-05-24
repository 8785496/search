<?php

class Helper 
{
    /**
     * Renders view and layout
     * 
     * @param string $view name view
     * @param array $data
     */
    public static function render($view, $data = array()) 
    {
        $content = self::renderPart($view, $data);
        require BASE_DIR . '/view/layout.php';
    }
    /**
     * Renders view
     * 
     * @param string $view name view
     * @param array $data
     * @return string
     */
    public static function renderPart($view, $data = array()) 
    {
        ob_start();
        extract($data);
        require BASE_DIR . "/view/$view.php";
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    /**
     * Creates object parser
     * 
     * @param string $className class name parser
     * @param string $interfaceName
     * @return className
     */
    public static function createParser($className, $interfaceName) {
        $filename = BASE_DIR . "/model/$className.php";
        if (file_exists($filename)) {
            require_once $filename;
            $parser = new $className();
            if($parser instanceof $interfaceName){
                return $parser;
            }
        }
        return null;
    }
}
