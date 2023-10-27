<?php

require_once base_path("Models/Category.php");

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        view('admin/category/index', compact('categories'));
    }

    public function create()
    {
        view('admin/category/create');
    }

    public function store()
    {
        $data = [
            "name" => $_POST['name'],
            'slug' => slugify($_POST['name'])
        ];

        Category::create($data);

        redirect('/admin/categories');
    }

    public function show()
    {
        $id = $_GET['id'];

        // InConsistency
        $category = Category::find($id)[0];
        view('admin/category/show', compact('category'));
    }

    /**
     * Have Not Implmented Yet
     */
    public function edit()
    {
        $id = $_GET['id'];

        $category = Category::find($id)[0];

        view('admin/category/edit', compact('category'));
    }

    /**
     * Have Not Implmented Yet
     */
    public function update()
    {
        $id = $_GET['id'];
        $data = [
            "name" => $_POST['name'],
            'slug' => slugify($_POST['name']),
        ];

        Category::update($data, $id);
        // TODO something wrong here will need some fix (slug)

        redirect('/admin/categories');
    }

    /**
     * Have Not Implmented Yet
     */
    public function destroy()
    {
        $id = (int) $_POST['id'];

        Category::delete($id);

        redirect('/admin/categories');
    }
}


return new CategoryController;