<?php

namespace Wiki\Catalog\Controllers;

class IndexController
{

    public function get()
    {
        echo '<a href="/article/list">Articles</a><br/>';
        echo '<a href="/reference/list">References</a><br/>';
        echo '<a href="/tag/list">Tags</a><br/>';
        echo '<a href="/article_tag/list">Tags</a><br/>';
    }
}