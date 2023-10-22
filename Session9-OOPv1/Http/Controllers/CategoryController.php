<?php

require_once base_path("Core/Category.php");

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        view('admin/categories/index', compact('categories'));
    }

    public function create()
    {
        view('admin/categories/create');
    }

    public function store()
    {
        $name = $_POST['name'];

        Category::create($name);

        redirect('/admin/categories');
    }

    public function show()
    {
        $id = $_GET['id'];

        $category = Category::find($id);

        view('admin/categories/show', compact('category'));
    }

    /**
     * Have Not Implmented Yet
     */
    public function edit()
    {
        $id = $_GET['id'];

        $category = Category::find($id);

        view('admin/categories/edit', compact('category'));
    }

    /**
     * Have Not Implmented Yet
     */
    public function update()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];

        Category::update($id, $name);

        redirect('/admin/categories');
    }

    /**
     * Have Not Implmented Yet
     */
    public function destroy()
    {
        $id = $_GET['id'];

        Category::delete($id);

        redirect('/admin/categories');
    }
}