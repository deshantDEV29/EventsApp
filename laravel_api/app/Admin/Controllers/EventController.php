<?php

namespace App\Admin\Controllers;

use App\Models\Events;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Events';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Events());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('event_schedule', __('Event Schedule'));
        $grid->column('venue', __('Venue'));
        $grid->column('theme', __('Theme'));
        $grid->column('speaker', __('Speaker'));
        $grid->column('event_description', __('Event Description'));
        $grid->column('created_at', __('Created At'));
        $grid->column('updated_at', __('Updated At'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Events::findOrFail($id));

        $show->column('id', __('Id'));
        $show->column('title', __('Title'));
        $show->column('event_schedule', __('Event Schedule'));
        $show->column('venue', __('Venue'));
        $show->column('theme', __('Theme'));
        $show->column('speaker', __('Speaker'));
        $show->column('event_description', __('Event Description'));
        $show->column('created_at', __('Created At'));
        $show->column('updated_at', __('Updated At'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Events());

        $form->text('title', __('Title'));
        $form->text('event_schedule', __('Event Schedule'));
        $form->text('venue', __('Venue'));
        $form->text('theme', __('Theme'));
        $form->text('speaker', __('Speaker'));
        $form->text('event_description', __('Event Description'));


        return $form;
    }

    public function events(Request $request)
{
    $q = $request->get('q');

    return Events::where('title', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
}
}
