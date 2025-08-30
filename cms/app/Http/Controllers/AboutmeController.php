<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutme;

class AboutmeController extends Controller
{
    public function index()
    {
        $aboutme = Aboutme::all();
        return view('pages.aboutme', ['aboutme' => $aboutme]);
    }

    //`domain`, `logo`, `name`, `title`, `description`, `about_me`, `photo`, `cover_img`, `icon`, `keywords`, `social_networks`, `skills`, `email`, `phones`, `location`, `resume`, `server`
    // Update the aboutme information
    public function update( $id, Request $request)
    {       

        $datos = array(
            'domain' => $request->input('domain'),
            'server' => $request->input('server'),
            'logo' => $request->input('logo'),
            'name' => $request->input('name'),
            'title' => $request->input('title'),   
            'email' => $request->input('email'),   
            'phones' => $request->input('phone'),   
            'description' => $request->input('description'),
            'about_me' => $request->input('aboutme'),
            'keywords' => $request->input('keywords'),
            'skills' => $request->input('skills'),  
            'networks' => $request->input('social_networks'),
            'location' => $request->input('location'),
            'actual_photo' => $request->input('actual_photo'),
            'actual_cover' => $request->input('actual_cover'),  
            'actual_icon' => $request->input('actual_icon'),
            'actual_resume' => $request->input('actual_resume'),
        );


        // Handle file uploads
        $photoIma = array('photo_temp' => $request->file('photo'));
        $coverIma = array('cover_temp' => $request->file('cover'));
        $iconIma = array('icon_temp' => $request->file('icon'));
        $resumeFile = array('resume_temp' => $request->file('resume'));

        
        // Validate the request data

       if (!empty($datos)) {
            $validated = \Validator::make($datos, [
                'domain'           => 'required|url|max:255',
                'server'           => 'required|url|max:255', 
                'logo'             => 'required|string|max:255',               
                'name'             => 'required|string|max:255',
                'title'            => 'required|string|max:255', 
                'email'            => 'required|email|max:255',   
                'phones'           => 'required|string|max:255',            
                'description'      => 'required|string',
                'about_me'         => 'required|string',
                'keywords'         => 'required|string|max:255',
                'skills'           => 'required|string|max:255',  
                'networks'         => 'required|json', 
                'location'         => 'required|json', 
                'actual_photo'     => 'required',
                'actual_cover'     => 'required',
                'actual_icon'      => 'required', 
                'actual_resume'    => 'required',         
            ]);

            // Validate the photo uploads
            if($photoIma['photo_temp'] != ""){
                $validatePhoto = \Validator::make($photoIma, [
                    'photo_temp' => 'image|mimes:jpeg,png,jpg,gif|max:2048000', // 2MB

                ]); 

                if ($validatePhoto->fails()) {
                    return redirect("/aboutme")->with("no-validated","Failed to validate photo.");
                }
            }


            if($coverIma['cover_temp'] != ""){
                $validateCover = \Validator::make($coverIma, [
                    'cover_temp' => 'image|mimes:jpeg,png,jpg,gif|max:2048000', // 2MB

                ]); 

                if ($validateCover->fails()) {
                    return redirect("/aboutme")->with("no-validated","Failed to validate cover image.");
                }
            }

            if($iconIma['icon_temp'] != ""){
                $validateIcon = \Validator::make($iconIma, [
                    'icon_temp' => 'image|mimes:jpeg,png,jpg,gif|max:2048000', // 2MB

                ]); 

                if ($validateIcon->fails()) {
                    return redirect("/aboutme")->with("no-validated","Failed to validate icon.");
                }
            }   

            if($resumeFile['resume_temp'] != ""){
                $validateResume = \Validator::make($resumeFile, [
                    'resume_temp' => 'mimes:pdf,doc,docx|max:2048000', // 2MB

                ]); 

                if ($validateResume->fails()) {
                    return redirect("/aboutme")->with("no-validated","Failed to validate resume.");
                }
            }

            // Check if validation fails
            // If validation fails, redirect back with errors

            if ($validated->fails()) {
                return redirect("/aboutme")->with("no-validated","Failed to validate data.");
            }else{

                if($photoIma['photo_temp'] != ""){
                    unlink(public_path($datos['actual_photo'])); // Delete the old photo
                    $randerFile = mt_rand(1000,9999);
                    $fileName = $randerFile . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
                    $request->file('photo')->move(public_path('img/aboutme'), $fileName);
                    $routePhoto = '/img/aboutme/'.$fileName; 

                }else{
                    $routePhoto = $datos['actual_photo'];
                }

                if($coverIma['cover_temp'] != ""){
                    $coverPath = public_path($datos['actual_cover']);
                    if (file_exists($coverPath)) {
                        unlink($coverPath); // Delete the old cover image  
                    }
                    $randerFile = mt_rand(1000,9999);
                    $fileName = $randerFile . '_' . time() . '.' . $request->file('cover')->getClientOriginalExtension();   
                    $request->file('cover')->move(public_path('img/aboutme'), $fileName);
                    $routeCover = '/img/aboutme/'.$fileName;

                   

                }else{
                    $routeCover = $datos['actual_cover'];
                }

                if($iconIma['icon_temp'] != ""){
                    unlink(public_path($datos['actual_icon'])); // Delete the old icon
                    $randerFile = mt_rand(1000,9999);
                    $fileName = $randerFile . '_' . time() . '.' . $request->file('icon')->getClientOriginalExtension();
                    $request->file('icon')->move(public_path('img/aboutme'), $fileName);
                    $routeIcon = '/img/aboutme/'.$fileName;
                    
                }else{
                    $routeIcon = $datos['actual_icon'];
                }

                if($resumeFile['resume_temp'] != ""){
                    unlink(public_path($datos['actual_resume'])); // Delete the old resume
                    $randerFile = mt_rand(1000,9999);
                    $fileName = $randerFile . '_' . time() . '.' . $request->file('resume')->getClientOriginalExtension();
                    $request->file('resume')->move(public_path('img/aboutme'), $fileName);
                    $routeResume = '/img/aboutme/'.$fileName;
                }else{
                    $routeResume = $datos['actual_resume'];
                }

                $updated = array(
                    'domain' => $datos['domain'],
                    'server' => $datos['server'],
                    'logo' => $datos['logo'],
                    'name' => $datos['name'],
                    'title' => $datos['title'],    
                    'email' => $datos['email'], 
                    'phones' => $datos['phones'],               
                    'description' => $datos['description'],
                    'about_me' => $datos['about_me'],
                    'keywords' => json_encode(array_map('trim', explode(",", $datos['keywords']))),
                    'skills' => json_encode(array_map('trim', explode(",", $datos['skills']))),
                    'social_networks' => $datos['networks'],
                    'location' => $datos['location'],
                    'photo' => $routePhoto,
                    'cover_img' => $routeCover,
                    'icon' => $routeIcon,
                    'resume' => $routeResume,
                    'updated_at' => now(),                    
                );

              //  echo "<pre>";
       // print_r($updated); 
       // print_r(json_encode(explode(",",$datos['keywords'])));      
       // echo "</pre>";

        //return;


                $aboutme = Aboutme::where("id",$id)->update($updated);

               // echo 'ok';
                // Check if the update was successful
                if ($aboutme) {
                    return redirect("/aboutme")->with('success', 'Data updated successfully.');
                } else {
                    return redirect("/aboutme")->with('error', 'Failed to update data.');
                }
            }

        } else {
            return redirect("/aboutme")->with('error', 'No data to update.');
        }


        
    }

   
}
