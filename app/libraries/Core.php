<?php

class Core
{
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        if ($url) {
            $param = ucwords(strtolower($url[0]));

            // check if controller exists 
            if (file_exists("../app/controllers/$param.php")) {
                $this->currentController = $param;
                unset($url[0]);
            }
        }
        require_once "../app/controllers/" . $this->currentController . ".php";
        $this->currentController = new $this->currentController;


        if (isset($url[1])) {
            $param = strtolower($url[1]);
            if (method_exists($this->currentController, $param)) {
                $this->currentMethod = $param;
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /*
     * @returns url as an array  
     */
    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url']);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
