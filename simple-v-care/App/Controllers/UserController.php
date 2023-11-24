<?php

require_once base_path("App/Models/User.php");

class UserController
{
    public function index()
    {
        $user = User::findByEmail(Session::get('user')['email'])[0];
        // dd($user);


        return view('pages/auth/profile', [
            'user' => $user,
        ]);
    }

    public function update()
    {
        $User = new User();
        $data = $_POST;
        unset($data['_method']);

        if (file_upload($_FILES['upload_file'])) {
            $data['image'] = $_FILES['upload_file']['name'];
        } else {
            $data['image'] = 'https://via.placeholder.com/150';
        }

        $user = Session::get('user');
        try {
            $User->id = Session::get('user')['id'] ?? throw new Exception("User not found");
            $User->update($data);

            foreach ($data as $key => $value) {
                $user[$key] = $value;
            }

            Session::put('user', $user);
            Session::flash('auth-msg', 'Profile updated successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        // dd("UPDATE PROFILE");
        redirect('/auth/profile');
    }
}

return new UserController();