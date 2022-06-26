<?php

namespace App\Admin\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\SubCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Products());

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            // Add a column filter
            $filter->like('title', 'title');
        });

        $grid->column('id', __('Id'));
        $grid->column('imagePath', __('ImagePath'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('price', __('Price'));
        $grid->column('old_price', __('Old price'));
        $grid->column('unit', __('Unit'));
        $grid->column('subcategories_id', __('Subcategories'))->display(function ($category) {
            $subCategory = SubCategory::find($category);
            $categoryParent = Categories::find($subCategory->categories_id);
            return $subCategory->name . "(" . $categoryParent->name . ")";
        });
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
        $show = new Show(Products::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('imagePath', __('ImagePath'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('quantity', __('Quantity'));
        $show->field('price', __('Price'));
        $show->field('old_price', __('Old price'));
        $show->field('unit', __('Unit'));
        $show->field('subcategories_id', __('Subcategories id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Products());

        $form->image('imagePath', __('ImagePath'));
        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->number('quantity', __('Quantity'));
        $form->decimal('price', __('Price'));
        $form->decimal('old_price', __('Old price'));
        $form->text('unit', __('Unit'));
        $form->select('subcategories_id', __('Select Brand '))->options(SubCategory::all()->pluck('name', 'id'));

        return $form;
    }
}
