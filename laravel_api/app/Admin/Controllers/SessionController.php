<?php

namespace App\Admin\Controllers;

use App\Models\Session;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SessionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Session';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Session());

        $grid->column('id', __('Id'));
        $grid->column('event_id', __('Event Id'));
        $grid->column('date', __('Date'));
        $grid->column('time', __('Time'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Session::findOrFail($id));
        
        $show->column('id', __('Id'));
        $show->column('event_id', __('Event Id'));
        $show->column('date', __('Date'));
        $show->column('time', __('Time'));
        $show->column('created_at', __('Created at'));
        $show->column('updated_at', __('Updated at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Session());

        $form->text('event_id', __('Event Id'));
        $form->text('date', __('Date'));
        $form->text('time', __('Time'));

        return $form;
    }
}
