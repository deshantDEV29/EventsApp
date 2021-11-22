<?php

namespace App\Admin\Controllers;

use App\Models\FAQ;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FAQController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'FAQ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FAQ());

        $grid->column('id', __('Id'));
        $grid->column('question', __('Question'));
        $grid->column('answer', __('Answer'));
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
        $show = new Show(FAQ::findOrFail($id));
        
        $show->column('id', __('Id'));
        $show->column('question', __('Question'));
        $show->column('answer', __('Answer'));
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
        $form = new Form(new FAQ());

        $form->text('id', __('Id'));
        $form->text('question', __('Question'));
        $form->text('answer', __('Answer'));
        $form->text('created_at', __('Created At'));
        $form->text('updated_at', __('Updated At'));

        return $form;
    }
}
