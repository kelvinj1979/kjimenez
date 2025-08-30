<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    // Show the admin page
    public function index()
    {
        $admin = Admin::all();
        return view('pages.admin', ['admin' => $admin]);
    }

    //show one admin
    public function show($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admin.index')->with('error', 'Admin not found');
        }else {
            return view('pages.admin', ['admin' => $admin]);
        }
    }

    // get admin data as JSON
    // This method is used to return admin data in JSON format, typically for API responses

    public function getAdminJson($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }
        return response()->json($admin);
    }

    // Update the admin information
    public function update($id, Request $request)
    {

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'actual_password' => $request->input('actual_password'),  
            'role' => $request->input('role'),
            'actual_photo' => $request->input('actual_photo')
        );

        $password = array("password"=>$request->input('password'));
        if ($password) {
            $data['password'] = bcrypt($password['password']);
        }
        $photo = array("photo" => $request->file('photo'));

        if ($photo['photo']) {
            $validatedPhoto = \Validator::make($photo, [
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            
            if ($validatedPhoto->fails()) {
                return redirect()->route('admin.index')->with("no-validated","Failed to validate photo.");   
            }
        }

          /*  echo "<pre>";
        print_r($data); 
        echo "</pre>";
        return; 
 */
        // Validate the request data
        // This method is used to update the admin information in the database
        if(!empty($data)){
            $validated = \Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',                
                'role' => 'required|string|max:50', 
            ]);            
        

            if($password['password'] != null) {
                $validatedPassword = \Validator::make(
                    [
                        'password' => $request->input('password'),
                        'password_confirmation' => $request->input('password_confirmation')
                    ],
                    [
                        'password' => 'required|string|min:8|confirmed',
                    ]
                );

                if($validatedPassword->fails()) {
                    return redirect("/admin")->with("no-validated","Failed to validate password.");
                } else {
                    $newPassword = Hash::make($password['password']);
                }

            }else {
                $newPassword = $data['actual_password'];
            }

            $validatedPhoto = null;
            if($photo['photo'] != null) {
                $validatedPhoto = \Validator::make($photo, [
                    'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);
                if($validatedPhoto->fails()) {
                    return redirect("/admin")->with("no-validated","Failed to validate photo.");   
                }
            }

            if ($validated->fails()) {
                return redirect("/admin")->with("no-validated","Failed to validate data."); 
            }else {

                if($photo['photo'] != null) {
                    if ($data['actual_photo']) {
                        @unlink(public_path($data['actual_photo']));
                    }
                    $randerFile = mt_rand(1000, 9999);
                    $fileName = $randerFile . '_' . time() . '.' . $photo["photo"]->guessExtension();                
                    $routePhoto = '/img/admin/'.$fileName; 
                    $photo["photo"]->move(public_path('/img/admin/'), $fileName);
                } else {
                    $routePhoto = $data['actual_photo'];
                }

                $data = array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $newPassword,
                    'role' => $data['role'],
                    'photo' => $routePhoto
                );

                $admin = Admin::where("id",$id)->update($data);
                
                if (!$admin) {
                    return redirect()->route('admin.index')->with('error', 'User not found');
                }                
            }
            return redirect()->route('admin.index')->with('success', 'User updated successfully');
        } else {
                return redirect()->route('admin.index')->with('error', 'No data provided');
        }

    }

    // Delete the admin (user) from the database
    // This method is used to delete the admin from the database
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admin.index')->with('error', 'User not found');
        }
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully');
    }
}
