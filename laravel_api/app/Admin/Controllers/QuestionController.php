<?php

namespace App\Admin\Controllers;

use App\Models\Questions;
use App\Models\Events;
use Encore\Admin\Controllers\AdminController;
use App\Admin\Controllers\EventController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Questions());

        $grid->column('id', __('Id'));
        $grid->column('quiz_id', __('Quiz Id'));
        $grid->column('question', __('Question'));       
        $grid->column('option_1', __('Option 1'));
        $grid->column('option_2', __('Option 2'));
        $grid->column('option_3', __('Option 3'));
        $grid->column('option_4', __('Option 4'));
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
        $show = new Show(Questions::findOrFail($id));

        $show->column('id', __('Id'));
        $show->column('quiz_id', __('Quiz Id'));
        $show->column('question', __('Question'));       
        $show->column('option_1', __('Option 1'));
        $show->column('option_2', __('Option 2'));
        $show->column('option_3', __('Option 3'));
        $show->column('option_4', __('Option 4'));
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
        $form = new Form(new Questions());
      
        $form->text('question', __('Question'));
        $form->text('quiz_id', __('Quiz Id'));
        $form->text('option_1', __('Option 1'));
        $form->text('option_2', __('Option 2'));
        $form->text('option_3', __('Option 3'));
        $form->text('option_4', __('Option 4'));
        $form->text('answer', __('Answer'));
       

        return $form;
    }

   
}
