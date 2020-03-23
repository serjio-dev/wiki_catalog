<?php

namespace Wiki\Catalog\Controllers;

class BaseController
{
    protected function render(string $viewName, array $params = [])
    {
        if (!empty($params)) {
            extract($params);
        }

        $arrClassName = explode('\\', get_called_class());
        $className = end($arrClassName);

        $pathView = sprintf('%s/view/%s/%s.php', DIR_ROOT, $className, $viewName);

        require_once $pathView;
    }

    protected function redirect(string $uri)
    {
        header(sprintf('Location: %s', $uri));
        exit();
    }
}