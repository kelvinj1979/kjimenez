// This is a JavaScript file that handles the addition and deletion of social network links
// and initializes Summernote and Bootstrap dropdowns when the document is ready.
// This function is triggered when the delete button for a social network link is clicked.
$(document).on("click", ".deleteNet", function() {

    var networkList = JSON.parse($("#social_networks").val());

    var icon = $(this).attr("red");
    var url = $(this).attr("url");
    for (var i = 0; i < networkList.length; i++) {
        if (networkList[i].icon == icon && networkList[i].url == url) {
            networkList.splice(i, 1);
            $(this).parent().parent().parent().parent().remove();
            $("#social_networks").val(JSON.stringify(networkList));
            
        }

        
    }
});

// Update the hidden input field with the new JSON string
$(document).on("click", "#add_network", function() {
    var url = $("#link_network").val();    
    var icon = $("#icon_network").val();  
    var name = $("#icon_network option:selected").text();
  

    $("#networkList").append(
        `<div class="col-lg-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="`+icon+`"></i>
                    </div>
                </div>
                <input type="text" class="form-control" name="`+name+`" value="`+url+`" readonly>
                <div class="input-group-append">
                    <div class="input-group-text" style="cursor: pointer;">
                        <span class="bg-danger px-2 rounded-circle deleteNet" red="`+icon+`" url="`+url+`">&times;</span>
                    </div>
                </div>
            </div>
        </div>`
    );

    var networkList = JSON.parse($("#social_networks").val());
    //console.log(networkList);
    networkList.push({
        "network": name,
        "url": url,
        "icon": icon
    });
    $("#social_networks").val(JSON.stringify(networkList));
   
});

// It removes the link from the list and updates the hidden input field with the new JSON string.
$(document).on('input', 'input[name="location_city"], input[name="location_link"]', function() {
    var city = $('input[name="location_city"]').val();
    var link = $('input[name="location_link"]').val();
    var locationArr = [{
        city: city,
        link: link
    }];
    $('#location').val(JSON.stringify(locationArr));
});


$("input[type='file']").on("change", function() {

    var file = this.files[0];
    var name = $(this).attr("name");

    // Solo validar si el input es de imagen
    if (name === "photo" || name === "cover" || name === "icon") {

        if (!file.type.match(/^image\/(jpeg|png|jpg)$/)) {
            $(this).val("");

            notie.alert({
                type: 'error',
                text: 'Please select a valid image file (jpeg, jpg, png).',
                time: 6
            });

        } else if (file.size > 2000000) {
            $(this).val("");

            notie.alert({
                type: 'error',
                text: 'Please select an image file smaller than 2MB.',
                time: 6
            });

        } else {
            var reader = new FileReader();
            reader.readAsDataURL(file);

            $(reader).on("load", function(event) {
                var filePath = event.target.result;
                $(".preview-img_" + name).attr("src", filePath);
            });
        }

    }
});

// This function is triggered when the edit button for a user is clicked.
$(document).on('click', '.edit-user-btn', function(e) {
    e.preventDefault();
    var userId = $(this).data('id');
    $.get(window.baseUrl + '/admin/' + userId + '/json', function(data) {
        // Fill in the fields of the modal with the data received
        $('#editUser input[name="name"]').val(data.name);
        $('#editUser input[name="email"]').val(data.email);
        $('#editUser select[name="role"]').val(data.role);
        //$('#editUser input[name="edit_photo"]').val(data.photo);
        if (data.photo) {
            $('#edit_photo_preview').attr('src', window.baseUrl + data.photo).show();
            $('#no_photo_text').hide();
            // Asigna el valor al input hidden
            $('#editUser input[name="actual_photo"]').val(window.baseUrl + data.photo);
        } else {
            $('#edit_photo_preview').hide();
            $('#no_photo_text').show();
            $('#editUser input[name="actual_photo"]').val('');
        }
        $('#editUser select[name="_role"]').val(data.role);      

        // Show edit modal
        // Cambia el action del form dinámicamente
        $('#editUser form').attr('action', window.baseUrl + '/admin/' + data.id);

        // Abre el modal con Bootstrap 5
        var modal = new bootstrap.Modal(document.getElementById('editUser'));
        modal.show();
    });
});

// This function is triggered when the form in the edit modal is submitted.
// It checks if the password and confirmation password match.
function validatePasswords(form) {
    var pass = form.find('#password').val();
    var confirm = form.find('#password_confirmation').val();
    if (pass !== confirm) {
        alert('Passwords do not match');
        return false;
    }
    return true;
}

$('#editUser form, #newUser form').on('submit', function(e) {
    if (!validatePasswords($(this))) {
        e.preventDefault();
    }
});

// This is a JavaScript file that initializes Summernote and Bootstrap dropdowns
// when the document is ready.
$(document).ready(function() {
        $(".mySummernote").summernote();
        $('.dropdown-toggle').dropdown();
        // Inicializa DataTable
        $('#myTable').DataTable({
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            }
        });
    });

// Mostrar preview de imagen seleccionada en el modal de editar usuario
$(document).on('change', '#editUser input[type="file"][name="photo"]', function() {
    var file = this.files[0];
    if (file && file.type.match(/^image\/(jpeg|png|jpg)$/)) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#edit_photo_preview').attr('src', e.target.result).show();
            $('#no_photo_text').hide();
        };
        reader.readAsDataURL(file);
    } else {
        $('#edit_photo_preview').hide();
        $('#no_photo_text').show();
    }
});

let selectedUserId = null;

$(document).on('click', '.delete-user-btn', function(e) {
    e.preventDefault();
    selectedUserId = $(this).data('id');

    // Actualiza el action del formulario de eliminación
    const deleteForm = $('#deleteUserForm');
    deleteForm.attr('action', window.baseUrl + '/admin/' + selectedUserId);

    // Actualiza el token CSRF en el formulario
    deleteForm.find('input[name="_token"]').val(
        $('meta[name="csrf-token"]').attr('content')
    );

    // Muestra el modal de confirmación
    const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
    modal.show();
});

$(document).on('click', '.edit-education-btn', function(e) {
    e.preventDefault(); // Esto es importante
    var id = $(this).data('id');
    $.get(window.baseUrl + '/education/' + id + '/edit', function(data) {
        // Rellena los campos del modal
        $('#editEducationForm input[name="education"]').val(data.education);
        $('#editEducationForm input[name="institution"]').val(data.institution);
        $('#editEducationForm input[name="start_date"]').val(data.start_date);
        $('#editEducationForm input[name="end_date"]').val(data.end_date);
        $('#editEducationForm textarea[name="edu_detail"]').val(data.edu_detail);

        // Actualiza el action del form
        $('#editEducationForm').attr('action', window.baseUrl + '/education/' + id);

        // Abre el modal
        var modal = new bootstrap.Modal(document.getElementById('editEducation'));
        modal.show();
    });
});

$(document).on('click', '.delete-education-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    // Actualiza el action del formulario de eliminación
    const deleteForm = $('#deleteUserForm');
    deleteForm.attr('action', window.baseUrl + '/education/' + id);

    // Actualiza el token CSRF en el formulario (opcional si ya está)
    deleteForm.find('input[name="_token"]').val(
        $('meta[name="csrf-token"]').attr('content')
    );

    // Muestra el modal de confirmación
    const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
    modal.show();
});

// Editar experiencia
$(document).on('click', '.edit-experience-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.get(window.baseUrl + '/experience/' + id + '/edit', function(data) {
        $('#editExperienceForm').attr('action', window.baseUrl + '/experience/' + id);
        $('#editExperienceForm input[name="experience"]').val(data.experience);
        $('#editExperienceForm input[name="company"]').val(data.company);
        $('#editExperienceForm input[name="start_date"]').val(data.start_date);
        $('#editExperienceForm input[name="end_date"]').val(data.end_date);
        $('#editExperienceForm textarea[name="exp_detail"]').val(data.exp_detail);
        var modal = new bootstrap.Modal(document.getElementById('editExperience'));
        modal.show();
    });
});

// Eliminar experiencia
$(document).on('click', '.delete-experience-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    const deleteForm = $('#deleteExperienceForm');
    deleteForm.attr('action', window.baseUrl + '/experience/' + id);
    deleteForm.find('input[name="_token"]').val(
        $('meta[name="csrf-token"]').attr('content')
    );
    const modal = new bootstrap.Modal(document.getElementById('deleteExperienceConfirmModal'));
    modal.show();
});

// Previsualización de imagen para el input de proyectos
$(document).on('change', '#project_img', function(event) {
    const input = event.target;
    const preview = document.getElementById('project_img_preview');
    const noPhoto = document.getElementById('no_photo_text');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            noPhoto.style.display = 'none';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        preview.style.display = 'none';
        noPhoto.style.display = 'inline';
    }
});

$(document).on('click', '.delete-project-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    // Cambia la ruta según tu configuración de rutas
    $('#deleteProjectForm').attr('action', window.baseUrl + '/projects/' + id);
    var modal = new bootstrap.Modal(document.getElementById('deleteProjectModal'));
    modal.show();
});

$(document).on('click', '.edit-project-btn', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.get(window.baseUrl + '/projects/' + id + '/edit', function(data) {
        $('#edit_project_id').val(data.project_id);
        $('#edit_project_name').val(data.project_name);
        $('#edit_view_code').val(data.view_code);
        $('#edit_live_demo').val(data.live_demo);
        $('#edit_description').val(data.description);
        $('#edit_overview').val(data.overview);

        // Technologies
        let techArr = [];
        try { techArr = JSON.parse(data.technologies || '[]'); } catch(e) { techArr = []; }

        // Tags
        let tagArr = [];
        try { tagArr = JSON.parse(data.tags || '[]'); } catch(e) { tagArr = []; }

        // Key Features
        let featArr = [];
        try { featArr = JSON.parse(data.key_features || '[]'); } catch(e) { featArr = []; }

        $('#edit_technologies').val(Array.isArray(techArr) ? techArr.join(', ') : '').trigger('change');
        UseBootstrapTag(document.getElementById('edit_technologies'));

        $('#edit_tags').val(Array.isArray(tagArr) ? tagArr.join(', ') : '').trigger('change');
        UseBootstrapTag(document.getElementById('edit_tags'));

        $('#edit_key_features').val(Array.isArray(featArr) ? featArr.join(', ') : '').trigger('change');
        UseBootstrapTag(document.getElementById('edit_key_features'));

        $('#edit_challenges_solutions').val(data.challenges_solutions);

        // Project Info
        if (data.project_info) {
            var info = JSON.parse(data.project_info)[0] || {};
            $('[name="completedDate"]').val(info.completedDate || '');
            $('[name="teamSize"]').val(info.teamSize || '');
            $('[name="status"]').val(info.status || '');
        }

        // Imagen actual
        if (data.project_img) {
            $('#edit_project_img_preview').attr('src', data.project_img).show();
            $('#edit_no_photo_text').hide();
        } else {
            $('#edit_project_img_preview').hide();
            $('#edit_no_photo_text').show();
        }

        console.log('techArr:', techArr);
        console.log('tagArr:', tagArr);
        console.log('featArr:', featArr);
        console.log('Input exists:', $('#edit_technologies').length);

        // Actualiza el action del formulario
        $('#editProjectForm').attr('action', window.baseUrl + '/projects/' + id);

        // Muestra el modal
        var modal = new bootstrap.Modal(document.getElementById('editProjectModal'));
        modal.show();
    });
});





