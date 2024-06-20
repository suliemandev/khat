<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Manogi\Tiptap\Tiptap;

class Author extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Author>
     */
    public static $model = \App\Models\Author::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
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

            Fields\Text::make(__('Name'), 'name')
                ->nullable()
                ->showOnPreview(),

            Fields\Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->hideFromIndex(),

            Fields\Avatar::make(__('Image'), 'image')
                ->disk('public')
                ->showOnPreview(),

            Fields\Country::make(__('Country'), 'country_code')
                ->displayUsingLabels(),

            // Fields\Select::make(__('Gender'), 'gender')
            //     ->options([
            //         'Male' => 'Male',
            //         'Female' => 'Female',
            //         'Other' => 'Other'
            //     ]),

            Fields\KeyValue::make(__('Social links'), 'social_links')
                ->keyLabel('اسم الشبكة')
                ->valueLabel('الرابط')
                ->actionText('اضف')
                ->nullable(),

            Tiptap::make(__('Bio'), 'bio')
              ->buttons([
                    'heading','|', 'italic','bold','|','link','code','strike','underline','highlight','|','bulletList','orderedList','codeBlock','blockquote','|','horizontalRule','hardBreak','|','table','|','image','|','textAlign','|','rtl','|','history','|','editHtml', // 'br'
                ])
                ->defaultAlignment('right')
                ->headingLevels([2, 3, 4])
                ->alwaysShow(),

            // Fields\Boolean::make(__('Featured'), 'featured'),

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
