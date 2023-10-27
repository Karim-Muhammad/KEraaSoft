<?php

require_once base_path("Models/Product.php");
require_once base_path("Core/Session.php");

class ProductController
{
    public function index()
    {
        $products = Product::allJoin();
        view("pages/products/index", [
            'name' => "Products ALL",
            'products' => $products,
        ]);
    }

    public function show()
    {
        $product = Product::find($_GET['id']);
        view("pages/products/show", [
            'product' => $product,
        ]);
    }

    public function AdminIndex()
    {
        $products = Product::all();
        view("admin/products/index", [
            'products' => $products,
        ]);
    }

    public function AdminCreate()
    {
        view("admin/products/create");
    }

    public function AdminStore()
    {
        $data = $_POST;

        $data['price'] = (float) $data['price'];
        $data['user_id'] = (int) $data['user_id'];
        $data['category_id'] = (int) $data['category_id'];

        unset($data['_method']);

        // dd($_FILES);

        // Upload File
        $target_dir = base_path("public/uploads/");
        $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $data['image'] = $_FILES["file_upload"]["name"];

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

            redirect("/admin/products");
        } catch (Exception $e) {

            Session::flash('errors', ['auth-msg' => $e->getMessage()]);
            // dd($data);
            redirect("/admin/products/create");
        }

    }

    public function AdminShow()
    {
        $product = Product::find($_GET['id']);
        view("admin/products/show", [
            'product' => $product,
        ]);
    }

    public function AdminEdit()
    {
        $product = Product::find($_GET['id']);

        view("admin/products/edit", [
            'product' => $product,
        ]);
    }

    public function AdminUpdate()
    {
        // TODO: Update Product
        $data = $_POST;

        // unlink
        $target_dir = base_path('/public/uploads/');
        $target_file = $target_dir . basename($_FILES['file_upload']['name']);

        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $data['image'] = $_FILES['file_upload']['name'];
        move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file);


        unset($data['_method']);
        unset($data['id']);

        $data['price'] = (float) $data['price'];
        $data['user_id'] = (int) $data['user_id'];
        $data['category_id'] = (int) $data['category_id'];

        // Upload File TODO
        // dd($data);

        // Update
        Product::update($data, $_POST['id']);

        redirect("/admin/products");
    }

    public function AdminDestroy()
    {
        // TODO: Delete Product
        // dd($_POST['id']);

        $id = (int) $_POST['id'];


        Product::delete($id);


        redirect("/admin/products");
    }
}


return new ProductController;