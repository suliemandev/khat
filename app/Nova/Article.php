<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Panel;

class Article extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Article>
     */
    public static $model = \App\Models\Article::class;

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
            Fields\ID::make()
                ->sortable(),

            // FlexibleField::make('Flexible')->fullWidth()->stacked(),

            Fields\Text::make(__('Title'), 'title')
                ->help('Article Title (H1)')
                ->nullable(),
                
            Fields\Slug::make(__('Slug'), 'slug')
                ->from('title')
                ->hideFromIndex(),   

            Fields\Image::make(__('Image'), 'image')
                ->disk('public'),

            Fields\Textarea::make(__('Summary'), 'summary')
                ->maxlength(200)
                ->alwaysShow()
                ->rows(2),

            new Panel(__('Publish'), [
                Fields\BelongsTo::make(__('Author'), 'author', Author::class)
                    ->showCreateRelationButton()
                    ->modalSize('6xl'),

                Fields\BelongsTo::make(__('Category'), 'category', Category::class)
                    ->showCreateRelationButton()
                    ->modalSize('6xl'),

                Fields\Tag::make(__('Tags'), 'tags', Tag::class)
                    ->showCreateRelationButton()
                    ->modalSize('6xl')
                    ->hideFromIndex(),

                Fields\DateTime::make(__('Publish date'), 'publish_date')
                    ->nullable(),

                Fields\Select::make(__('Status'), 'status')->options([
                        'drafts' => __('Drafts'),
                        'published' => __('Published'),
                    ])->displayUsingLabels(),

                Fields\Boolean::make(__('Featured'), 'featured'),
            ]),

            new Panel(__('Search Engine Optimization'), [
                Fields\Text::make(__('Meta Title'), 'meta_title')
                    ->maxlength(60)
                    ->hideFromIndex(),

                Fields\Textarea::make(__('Meta Description'), 'meta_description')
                    ->maxlength(160)
                    ->alwaysShow()
                    ->rows(2),
            ]),

            new Panel(__('Contents'), [
                Tiptap::make(__('Content'), 'content')
                  ->buttons([
                        'heading','|', 'italic','bold','|','link','code','strike','underline','highlight','|','bulletList','orderedList','codeBlock','blockquote','|','horizontalRule','hardBreak','|','table','|','image','|','textAlign','|','rtl','|','history','|','editHtml', // 'br'
                    ])
                    ->defaultAlignment('right')
                    ->headingLevels([2, 3, 4])
                    ->alwaysShow(),
                    // ->stacked(),

                // $this->flexible(),
            ]),
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
