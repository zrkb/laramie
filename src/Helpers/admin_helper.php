<?php

use Illuminate\Support\Arr;
use Laramie\Admin\Admin;
use Laramie\Admin\Html\Html;
use Laramie\Admin\Html\Elements\Form;

if (! function_exists('admin')) {
    /**
     * @return \Laramie\Admin\Admin
     */
    function admin()
    {
        return app(Admin::class);
    }
}

if (! function_exists('resource')) {
    /**
     * @return \Laramie\Admin\Html\Html
     */
    function resource($action = null) : String
    {
        $action = $action ? ('.' . $action) : '';

        return Arr::first(explode('.', request()->route()->getName())) . $action;
    }
}

