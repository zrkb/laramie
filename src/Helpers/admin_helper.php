<?php

use Laramie\Admin\Html\Html;
use Laramie\Admin\Admin;
use Illuminate\Support\Arr;

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

if (! function_exists('resource')) {
    /**
     * @return \Laramie\Admin\Html\Html
     */
    function resource() : String
    {
        return Arr::first(explode('.', request()->route()->getName()));
    }
}

