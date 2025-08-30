@extends('layout')
@section('content')

    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">User Administrator Layout</h3></div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Users</li>
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
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newUser">Add User </button>                
                    </div>

                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="50px">Photo</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $element)                      

                                    <tr>
                                        <td>{{ $element->id }}</td>
                                        <td>{{ $element->name }}</td>
                                        <td>{{ $element->email }}</td>
                                        <td>
                                            @if ($element->photo)
                                                <img src="{{ url($element->photo) }}" class="img-fluid rounded-circle mx-auto d-block" alt="User Photo" width="50">
                                            @else
                                                No Photo
                                            @endif
                                        </td>
                                        <td>
                                            @if ($element->role == 'admin')
                                                <span class="badge bg-primary">Admin</span>
                                            @elseif ($element->role == 'editor')
                                                <span class="badge bg-warning">Editor</span>
                                            @else
                                                <span class="badge bg-secondary">User</span>
                                            @endif  

                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm edit-user-btn" data-id="{{ $element->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm delete-user-btn" data-id="{{ $element->id }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>                   

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">Footer</div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->

        <!--begin::Modal-->
        <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="newUserLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" 
                                       placeholder="Enter Name" autocomplete="off" autofocus id="name" name="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                       <strong> {{ $message }} </strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" 
                                       placeholder="Enter Email" autocomplete="off" id="email" name="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong> {{ $message }} </strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="Enter Password min 8 characters" autocomplete="new-password" id="password" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       <strong> {{ $message }} </strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" autocomplete="new-password" placeholder="Confirm password" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Modal-->

        <!--begin::Edit Modal-->
        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/' . $element->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $element->name }}" 
                                       placeholder="Enter Name" autocomplete="off" id="name" name="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                       <strong> {{ $message }} </strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $element->email }}" 
                                       placeholder="Enter Email" autocomplete="off" id="email" name="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong> {{ $message }} </strong>
                                    </span>
                                @enderror

                            </div>
                             <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="Enter Password min 8 characters" autocomplete="off" id="password" name="password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       <strong> {{ $message }} </strong>
                                    </span>
                                @enderror

                            </div>
                            <input type="hidden" name="actual_password" id="actual_password" value="{{ $element->password }}">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm password" id="password_confirmation" name="password_confirmation" >
                            </div>
                            {{-- Add other fields as necessary --}}     
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="mb-3 text-center">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo"> 
                                <br>                           
                                <img id="edit_photo_preview" src="" alt="Preview" style="max-width:100px;">
                                <span id="no_photo_text" style="display:none;">No Photo</span>
                                <p class="text-muted">Dimensions: 200px * 200px | Weight Max. 2MB. | Format: JPEG, JPG or PNG</p>
                            </div>
                            <input type="hidden" name="actual_photo" id="actual_photo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Edit Modal-->

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteConfirmLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteUserForm" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Delete Confirmation Modal-->


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