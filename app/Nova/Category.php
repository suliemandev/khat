<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Category>
     */
    public static $model = \App\Models\Category::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Fields\ID::make()->sortable(),

            Fields\Text::make(__('Title'), 'title')
                ->help('Title (H1)')
                ->nullable(),

            Fields\Slug::make(__('Slug'), 'slug')
                ->from('title'),   

            Fields\Textarea::make(__('Summary'), 'summary')
                ->maxlength(200)
                ->alwaysShow()
                ->rows(2),

            Fields\Textarea::make(__('Icon'), 'icon')
                ->maxlength(200)
                ->alwaysShow()
                ->rows(2),

            new Panel(__('Search Engine Optimization'), [
                Fields\Text::make(__('Meta Title'), 'meta_title')
                    ->maxlength(60),

                Fields\Textarea::make(__('Meta Description'), 'meta_description')
                    ->maxlength(160)
                    ->alwaysShow()
                    ->rows(2),
            ]),

            new Panel(__('Publish'), [
                Fields\Boolean::make(__('Active'), 'is_active'),
                Fields\Boolean::make(__('Featured'), 'featured')
            ]),

            Fields\HasMany::make(__('Articles'), 'articles', Article::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
