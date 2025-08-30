@extends('layout')
@section('content')

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Education</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Education</li>
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
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newEducation">Add Education</button>
                </div>
                <div class="card-body">
                    
                    <table id="myEducationTable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Institution</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Details</th>
                                <th style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($education as $edu)
                                <tr>
                                    <td>{{ $edu->education_id }}</td>
                                    <td>{{ $edu->education }}</td>
                                    <td>{{ $edu->institution }}</td>
                                    <td>{{ $edu->start_date }}</td>
                                    <td>{{ $edu->end_date }}</td>
                                    <td>{{ $edu->edu_detail }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm edit-education-btn" data-id="{{ $edu->education_id }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm delete-education-btn" data-id="{{ $edu->education_id }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        </div>
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

     <!--begin::Modal Add-->
    <div class="modal fade" id="newEducation" tabindex="-1" role="dialog" aria-labelledby="newEducationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="newEducationLabel">Add Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="education" class="form-label">Education</label>
                            <input type="text" class="form-control @error('education') is-invalid @enderror" value="{{ old('education') }}" 
                              placeholder="Enter Education or Title" autocomplete="off" id="education" name="education" required>
                        
                            @error('education')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        
                        </div>
                        <div class="mb-3">
                            <label for="institution" class="form-label">Institution</label>
                            <input type="text" class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution') }}"
                             placeholder="Enter Institution" autocomplete="off" id="institution" name="institution" required>
                            
                            @error('institution')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <div class="mb-3">
                            <label for="edu_detail" class="form-label">Details</label>
                            <textarea class="form-control" id="edu_detail" name="edu_detail"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal Add-->
    <!--begin::Edit Modal-->
    <div class="modal fade" id="editEducation" tabindex="-1" role="dialog" aria-labelledby="editEducationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="editEducationLabel">Edit Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editEducationForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <input type="hidden" id="edit_education_id" name="education_id">
                        <div class="mb-3">
                            <label for="edit_education" class="form-label">Education</label>
                            <input type="text" class="form-control" id="edit_education" name="education" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_institution" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="edit_institution" name="institution" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="edit_end_date" name="end_date">
                        </div>
                        <div class="mb-3">
                            <label for="edit_edu_detail" class="form-label">Details</label>
                            <textarea class="form-control" id="edit_edu_detail" name="edu_detail"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                    Are you sure you want to delete this register? This action cannot be undone.
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