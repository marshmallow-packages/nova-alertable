<?php

namespace Marshmallow\Alertable;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use Illuminate\View\View;

/**
 * Class Settings
 * @package Marshmallow\NovaSettingsTool
 */
class Alertable extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return View
     */
    public function renderNavigation()
    {
        return '';
    }
}
