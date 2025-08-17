<?php
    class Views
    {
        function getView($controller,$view,$data = "")
            // Load the view file based on the controller and view name
        {
            $controller = get_class($controller);
            if($controller == "Home"){
                $view = "Views/".$view.".php";
            }else{
                $view = "Views/".$controller."/".$view.".php";
            }
            require_once($view);
        }
    }
?>