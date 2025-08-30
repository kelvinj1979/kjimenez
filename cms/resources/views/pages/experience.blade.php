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
                <li class="breadcrumb-item active" aria-current="page">Experience</li>
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
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newEducation">Add Experience </button>                
                </div>

                <div class="card-body">
                    
                    <table id="myExperienceTable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Company</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experience as $exp)
                                <tr>
                                    <td>{{ $exp->experience_id }}</td>
                                    <td>{{ $exp->experience }}</td>
                                    <td>{{ $exp->company }}</td>
                                    <td>{{ $exp->start_date }}</td>
                                    <td>{{ $exp->end_date }}</td>
                                    <td>{{ $exp->exp_detail }}</td>
                                    <td style="width: 120px;">
                                        <a href="#" class="btn btn-primary btn-sm edit-experience-btn" data-id="{{ $exp->experience_id }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm delete-experience-btn" data-id="{{ $exp->experience_id }}">
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
    <div class="modal fade" id="newEducation" tabindex="-1" aria-labelledby="newEducationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEducationLabel">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="experienceForm" action="{{ route('experience.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" class="form-control" id="experience" name="experience" required>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" name="company" required>
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
                            <label for="exp_detail" class="form-label">Details</label>
                            <textarea class="form-control" id="exp_detail" name="exp_detail"></textarea>
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
    <!--end::Modal-->
     <!--begin::Edit Modal-->
    <div class="modal fade" id="editExperience" tabindex="-1" aria-labelledby="editExperienceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExperienceLabel">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editExperienceForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_experience_id" name="experience_id">
                        <div class="mb-3">
                            <label for="edit_experience" class="form-label">Experience</label>
                            <input type="text" class="form-control" id="edit_experience" name="experience" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="edit_company" name="company" required>
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
                            <label for="edit_exp_detail" class="form-label">Details</label>
                            <textarea class="form-control" id="edit_exp_detail" name="exp_detail"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Edit Modal-->

     <!-- Modal Eliminar Experience -->
    <div class="modal fade" id="deleteExperienceConfirmModal" tabindex="-1">
      <div class="modal-dialog">
        <form id="deleteExperienceForm" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirm Delete</h5>
            </div>
            <div class="modal-body">
              ¿Are you sure you want to delete this experience?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </form>
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