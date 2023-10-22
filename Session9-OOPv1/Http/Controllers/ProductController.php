<?php

require_once base_path("Models/Product.php");
require_once base_path("Core/Session.php");

class ProductController
{
    public function index()
    {
        $products = Product::all();
        view("pages/products", [
            'name' => "Products ALL",
            'products' => $products,
        ]);
    }

    public function AdminIndex()
    {
        $products = Product::all();
        view("admin/products/index", [
            'products' => $products,
        ]);
    }

    public function create()
    {
        view("admin/products/create");
    }

    public function store()
    {
        $data = $_POST;

        $data['price'] = (float) $data['price'];
        $data['user_id'] = (int) $data['user_id'];
        $data['category_id'] = (int) $data['category_id'];

        unset($data['_method']);

        // Upload File
        $target_dir = base_path("public/uploads/");
        $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $data['image'] = $target_file;

        $check = getimagesize($_FILES["file_upload"]["tmp_name"]);

        if ($check !== false) {
            move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file);
        } else {
            return false;
        }

        try {
            $bool = Product::create($data);
            if (!$bool) {
                throw new Exception(implode(', ', Product::$errors), 1);
            }

            redirect("/admin/products/index");
        } catch (Exception $e) {

            Session::flash('errors', ['auth-msg' => $e->getMessage()]);
            redirect("/admin/products/create");
        }

    }

    public function show()
    {
        $product = Product::find($_GET['id']);
        view("admin/products/show", [
            'product' => $product,
        ]);
    }

    public function edit()
    {
        $product = Product::find($_GET['id']);
        view("admin/products/edit", [
            'product' => $product,
        ]);
    }

    public function update()
    {
        // TODO: Update Product
        // $product = Product::find($_GET['id']);
        // $product->name = $_POST['name'];
        // $product->price = $_POST['price'];
        // $product->description = $_POST['description'];
        // $product->save();

        redirect("admin/products/index");
    }

    public function destroy()
    {
        // TODO: Delete Product
        // $product = Product::find($_GET['id']);
        // $product->delete();

        redirect("admin/products/index");
    }
}


return new ProductController;