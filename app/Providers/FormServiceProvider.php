<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('rowText', 'snippets.components.text', ['name', 'value' => null, 'label' => null, 'attributes' => [], 'subtitle' => null]);
        Form::component('rowPassword', 'snippets.components.password', ['name', 'label' => null, 'attributes' => [], 'subtitle' => null]);
        Form::component('rowTextarea', 'snippets.components.textarea', ['name', 'value' => null, 'label' => null, 'attributes' => []]);
        Form::component('rowEmail', 'snippets.components.email', ['name', 'value' => null, 'label' => null, 'attributes' => []]);
        Form::component('rowSelect', 'snippets.components.select', ['name', 'values' => [], 'label' => null, 'selected' => null, 'attributes' => [], 'subtitle' => null]);
        Form::component('rowFile', 'snippets.components.file', ['name', 'label' => null, 'attributes' => [], 'subtitle' => null]);
        Form::component('rowSubmit', 'snippets.components.submit', ['label' => trans('labels.submit.label'), 'attributes' => []]);
        Form::component('rowCheckbox', 'snippets.components.checkbox', ['name', 'label' => null, 'checkboxes' => []]);
        Form::component('rowRadio', 'snippets.components.radio', ['name', 'label' => null, 'value' => null, 'radios' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
