@extends('layout')
@section('content')

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Projects</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newProject">Add Project</button>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Technologies</th>
                                        <th>Tags</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->project_id }}</td>
                                            <td>{{ $project->project_name }}</td>
                                            <td>
                                                @if($project->project_img)
                                                    <img src="{{ asset($project->project_img) }}" class="img-fluid mx-auto d-block" alt="Project Photo" width="60" height="60">
                                                @endif
                                            </td>
                                            <td>
                                               @foreach (json_decode($project->technologies, true) ?? [] as $tech)
                                                    <span class="badge bg-info">{{ $tech }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach (json_decode($project->tags, true) ?? [] as $tag)
                                                    <span class="badge bg-info">{{ $tag }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm edit-project-btn" data-id="{{ $project->project_id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm delete-project-btn" data-id="{{ $project->project_id }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">Footer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->

    <!-- Modal Add Project -->
    
    <div class="modal fade" id="newProject" tabindex="-1" aria-labelledby="newProjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="newProjectLabel">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="project_img" class="form-label">Project Image</label>
                            <input type="file" class="form-control" id="project_img" name="project_img" accept="image/*">
                            <br>  
                            <div class="text-center">
                                <img id="project_img_preview" src="" alt="Preview" style="max-width:100px;">
                                <span id="no_photo_text" style="display:none;">No Image</span>
                                <p class="text-muted">Dimensions: 1000px * 667px | Weight Max. 2MB. | Format: JPEG, JPG or PNG</p>
                            </div>                         
                        </div>
                        <div class="mb-3">
                            <label for="view_code" class="form-label">Code URL</label>
                            <input type="url" class="form-control" id="view_code" name="view_code">
                        </div>
                        <div class="mb-3">
                            <label for="live_demo" class="form-label">Demo URL</label>
                            <input type="url" class="form-control" id="live_demo" name="live_demo">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="overview" class="form-label">Overview</label>
                            <textarea class="form-control" id="overview" name="overview"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="technologies" class="form-label">Technologies</label>
                            <input type="text" class="form-control tag-input" data-bs-toggle="tags" id="technologies" name="technologies" placeholder="e.g., HTML, CSS, JavaScript">
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" class="form-control tag-input" data-bs-toggle="tags" id="tags" name="tags" placeholder="e.g., Web Development, Frontend">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Information</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="completedDate" placeholder="Completed Date (e.g., January 2023)">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="teamSize" placeholder="Team Size (e.g., 3 developers)">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="status" placeholder="Status (e.g., Completed)">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="key_features" class="form-label">Key Features</label>
                            <input type="text" class="form-control tag-input" data-bs-toggle="tags" id="key_features" name="key_features"></input>    
                        </div>
                        <div class="mb-3">
                            <label for="challenges_solutions" class="form-label">Challenges & Solutions</label>
                            <textarea class="form-control" id="challenges_solutions" name="challenges_solutions"></textarea>    
                        </div>
                        

                        <!-- Agrega más campos según tu modelo -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Add Project -->
    <!-- Modal Edit Project -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editProjectLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editProjectForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_project_id" name="project_id">
                        <div class="mb-3">
                            <label for="edit_project_name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="edit_project_name" name="project_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_project_img" class="form-label">Project Image</label>
                            <input type="file" class="form-control" id="edit_project_img" name="project_img" accept="image/*">
                            <br>    
                            <div class="text-center">
                                <img id="edit_project_img_preview" src="" alt="Preview" style="max-width:100px;">
                                <span id="edit_no_photo_text" style="display:none;">No Image</span>
                                <p class="text-muted">Dimensions: 1000px * 667px | Weight Max. 2MB. | Format: JPEG, JPG or PNG</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_view_code" class="form-label">Code URL</label>
                            <input type="url" class="form-control" id="edit_view_code" name="view_code">    
                        </div>
                        <div class="mb-3">
                            <label for="edit_live_demo" class="form-label">Demo URL</label>
                            <input type="url" class="form-control" id="edit_live_demo" name="live_demo">    
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description"></textarea> 
                        </div>
                        <div class="mb-3">
                            <label for="edit_overview" class="form-label">Overview</label>
                            <textarea class="form-control" id="edit_overview" name="overview"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_technologies" class="form-label">Technologies</label>
                            <input type="text" class="form-control tag-input" data-bs-toggle="tags" id="edit_technologies" name="technologies" placeholder="e.g., HTML, CSS, JavaScript">   
                        </div>
                        <div class="mb-3">
                            <label for="edit_tags" class="form-label">Tags</label>
                            <input type="text" class="form-control tag-input" data-bs-toggle="tags" id="edit_tags" name="tags" placeholder="e.g., Web Development, Frontend">   
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Information</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="completedDate" placeholder="Completed Date (e.g., January 2023)">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="teamSize" placeholder="Team Size (e.g., 3 developers)">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="status" placeholder="Status (e.g., Completed)">
                                </div>
                            </div>
                        </div>      
                        <div class="mb-3">
                            <label for="edit_key_features" class="form-label">Key Features</label>
                            <input type="text" class="form-control tag-input" data-bs-toggle="tags" id="edit_key_features" name="key_features"></input>
                        </div>
                        <div class="mb-3">
                            <label for="edit_challenges_solutions" class="form-label">Challenges & Solutions</label>
                            <textarea class="form-control" id="edit_challenges_solutions" name="challenges_solutions"></textarea>
                        </div>
                        <!-- Agrega más campos según tu modelo -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- End Modal Edit Project -->

    <!-- Modal Delete Project -->
    <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteProjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteProjectLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this project? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteProjectForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete Project -->

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