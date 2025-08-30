@extends('layout')
@section('content')

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Fixed Layout</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Me</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">

                @foreach ($aboutme as $element)                                                   
                            
                @endforeach 

                <form action="{{url('/')}}/aboutme/{{ $element->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <button type="submit" class="btn btn-primary float-right">Save changes</button>
                        </div>
                        <div class="card-body">

                            

                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- Domain --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Domain</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Domain" name="domain" value="{{ $element->domain}}" required>
                                            </div>

                                            {{-- Server --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Server</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Server" name="server" value="{{ $element->server}}" required>
                                            </div>

                                            {{-- Logo --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Logo</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Logo" name="logo" value="{{ $element->logo}}" required>
                                            </div>

                                            {{-- Name --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Name</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $element->name}}" required>
                                            </div>

                                            {{-- Title --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Title</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $element->title}}" required>
                                            </div>

                                            {{-- Email --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Email</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $element->email}}" required>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Phone</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ $element->phones}}" required>

                                            </div>
                                            
                                            {{-- Description --}}
                                            <div class="input-group mb-3" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Description</span>
                                                </div>
                                                <textarea class="form-control mySummernote" rows="5" placeholder="Description" name="description" required>{{ $element->description}}</textarea>  
                                            </div>                                       
                                

                                            {{-- About Me --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">About me</span>
                                                </div>
                                                <textarea class="form-control mySummernote" rows="5" placeholder="About me" name="aboutme" required>{{ $element->about_me}}</textarea>  
                                        </div>

                                        {{-- Location --}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text">City</span>
                                            </div>
                                            @php

                                                echo "<input type='hidden' id='location' name='location' value='". $element->location . "'>";

                                                // Decode the JSON string into an associative array
                                                // Assuming $element->location contains the JSON string
                                                $locations = json_decode($element->location, true);
                                                $city = isset($locations[0]['city']) ? $locations[0]['city'] : '';
                                                $link = isset($locations[0]['link']) ? $locations[0]['link'] : '';
                                            @endphp
                                            <input type="text" class="form-control" placeholder="City, State" name="location_city" value="{{ $city }}" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Map Link</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Google Maps Link" name="location_link" value="{{ $link }}" required>
                                        </div>

                                        <hr class="pb-2">

                                        {{-- Keywords --}}
                                            <div class="form-group mb-3">
                                                <label>Keywords</label>

                                                @php
                                                    $tags = json_decode($element->keywords, true);

                                                    $keywords = '';
                                                    foreach($tags as $value){
                                                        $keywords .= $value . ', ';
                                                    }
                                                    
                                                    $keywords = rtrim($keywords, ', ');
                                                @endphp

                                                <input type="text" class="form-control tag-input" placeholder="Keywords" name="keywords" value="{{ $keywords}}" data-bs-toggle="tags" required>

                                            
                                            </div>   
                                            
                                            {{-- Skills --}}
                                            <div class="form-group mb-3">
                                                <label>Skills</label>

                                                @php
                                                    $skills = json_decode($element->skills, true);

                                                    $skill = '';
                                                    foreach($skills as $value){
                                                        $skill .= $value . ', ';
                                                    }
                                                    
                                                    $skill = rtrim($skill, ', ');
                                                @endphp

                                                <input type="text" class="form-control tag-input" placeholder="Skills" name="skills" value="{{ $skill}}" data-bs-toggle="tags" required>

                                            </div>       
                                            
                                            
                                            <hr class="pb-2">

                                        {{-- Social Networks --}}
                                            <div class="form-group mb-3">
                                                <label>Social Networks</label>                                        

                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Networks</span>
                                                            </div>
                                                            <select class="form-control" id="icon_network">  
                                                                <option value="bi bi-facebook">Facebook</option>
                                                                <option value="bi bi-twitter">Twitter</option>
                                                                <option value="bi bi-linkedin">LinkedIn</option>
                                                                <option value="bi bi-github">GitHub</option>
                                                                <option value="bi bi-instagram">Instagram</option>
                                                                <option value="bi bi-pinterest">Pinterest</option>
                                                                <option value="bi bi-youtube">YouTube</option>
                                                                <option value="bi bi-whatsapp">WhatsApp</option>
                                                            </select>
                                                        </div>                                                
                                                    </div>

                                                    <div class="col-5">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Link</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Link" name="link_network" id="link_network" value="{{ $element->link_network}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <button type="button" class="btn btn-primary w-100" id="add_network">Add</button>
                                                    </div>
                                                </div>

                                                <div class="row" id="networkList">
                                                    @php

                                                        echo "<input type='hidden' id='social_networks' name='social_networks' value='". $element->social_networks . "'>";

                                                        $networks = json_decode($element->social_networks, true);

                                                        foreach($networks as $network){
                                                            $icon = $network['icon'];
                                                            $link = $network['url'];
                                                            $name = $network['network'];

                                                            echo '<div class="col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="'.$icon.'"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="'.$name.'" value="'.$link.'" readonly>

                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text" style="cursor: pointer;">
                                                                                <span class="bg-danger px-2 rounded-circle deleteNet" red="'.$icon.'"  url="'.$link.'">&times;</span>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                        }
                                                    @endphp
                                                                                            
                                                </div>

                                            </div>  
                                            
                                        </div>
                                    </div>                               
                                </div>

                                <div class="col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    {{-- Change Picture --}}
                                                    <div class="form-group my-2 text-center">
                                                        <div class="btn btn-default btn-file mb-3 bg-light">
                                                            <i class="bi bi-paperclip"></i>Attach picture 
                                                            <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">
                                                            <input type="hidden" name="actual_photo" value="{{ $element->photo }}" required>
                                                
                                                        </div>
                                                        <br>
                                                        <img src="{{url('/')}}/{{$element->photo}}" alt="" class="img-fluid py-2 preview-img_photo">
                                                        <p class="help-block small mt-3">Dimentions : 1000px * 1500px | Size :  2MB | Format : JPEG or PNG</p>
                                                    </div>

                                                    <hr class="pb-2">

                                                    {{-- Change Cover --}}
                                                    <div class="form-group my-2 text-center">
                                                        <div class="btn btn-default btn-file mb-3">
                                                            <i class="bi bi-paperclip"></i>Attach cover 
                                                            <input type="file" name="cover" id="cover" accept="image/*" class="form-control-file">
                                                            <input type="hidden" name="actual_cover" value="{{ $element->cover_img }}" required>
                                                
                                                        </div>
                                                        <br>
                                                        <img src="{{url('/')}}/{{$element->cover_img}}" alt="" class="img-fluid py-2 preview-img_cover">
                                                        <p class="help-block small mt-3">Dimentions : 1000px * 670px | Size :  2MB | Format : JPEG or PNG</p>
                                                    </div>

                                                    <hr class="pb-2">

                                                    {{-- Change Icon --}}
                                                    <div class="form-group my-2 text-center">
                                                        <div class="btn btn-default btn-file mb-3">
                                                            <i class="bi bi-paperclip"></i>Attach Icon 
                                                            <input type="file" name="icon" id="icon" accept="image/*" class="form-control-file">
                                                            <input type="hidden" name="actual_icon" value="{{ $element->icon }}" required>
                                                
                                                        </div>
                                                        <br>
                                                        <img src="{{url('/')}}/{{$element->icon}}" alt="" class="img-fluid py-2 preview-img_icon rounded-circle">
                                                        <p class="help-block small mt-3">Dimentions : 150px * 150px | Size :  2MB | Format : JPEG or PNG</p>
                                                    </div>

                                                    <hr class="pb-2">

                                                    {{-- Attach Resume --}}
                                                    <div class="form-group my-2 text-center">
                                                        <div class="btn btn-default btn-file mb-3">
                                                            <i class="bi bi-paperclip"></i> Attach Resume 
                                                            <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="form-control-file">
                                                            <input type="hidden" name="actual_resume" value="{{ $element->resume }}" required>
                                                        </div>

                                                        @if (!empty($element->resume))
                                                            <a href="{{url('/')}}{{$element->resume}}" target="_blank" class="d-block mt-2">
                                                                📄 View Current Resume
                                                            </a>
                                                        @endif

                                                        <p class="help-block small mt-3">
                                                            Allowed formats: PDF, DOC, DOCX | Max size: 2MB
                                                        </p>
                                                    </div>

                                                </div>
                                            
                                            

                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save changes</button>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>

@if (Session::has('no-validated'))
    <script>
        notie.alert({
            type: 2,
            text: '{{ session('no-validated') }}',
            time: 6
        });
    </script>
    
@endif

@if (Session::has('error'))
    <script>
        notie.alert({
            type: 3,
            text: '{{ session('error') }}',
            time: 6
        });
    </script>
    
@endif

@if (Session::has('success'))
    <script>
        notie.alert({
            type: 1,
            text: '{{ session('success') }}',
            time: 6
        });
    </script>

@endif


@endsection