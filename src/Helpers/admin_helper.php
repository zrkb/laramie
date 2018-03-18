<?php

use Laramie\Admin\Html\Html;
use Laramie\Admin\Admin;

if (! function_exists('admin')) {
    /**
     * @return \Laramie\Admin\Admin
     */
    function admin()
    {
        return app(Admin::class);
    }
}

if (! function_exists('html')) {
    /**
     * @return \Laramie\Admin\Html\Html
     */
    function html()
    {
        return app(Html::class);
    }
}
