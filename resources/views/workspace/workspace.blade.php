<x-layouts.main title="Workspaces">
    <x-slot name='css'>
</x-slot>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        @foreach ($workspaces as $workspace)
        <div class="col-md-4">
            <div class="card card-flush h-md-100">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ $workspace->name }}</h2>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="fw-bold text-gray-600 mb-5">Total users with this role: 5</div>
                    <div class="d-flex flex-column text-gray-600">
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span>Form 1</div>
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span>Form 2</div>
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> <em>and 7 more...</em></div>
                    </div>
                </div>
                <div class="card-footer flex-wrap pt-0">
                    @if($current_workspace->id != $workspace->id)
                    <a href="/keen/demo1/?page=apps/user-management/roles/view" class="btn btn-light btn-active-primary my-1 me-2">View Workspace</a>
                    @endif
                    <button type="button" class="btn btn-light btn-active-light-primary my-1 edit_workspace" data-url="{{ route('workspace.show', $workspace) }}">Edit Workspace</button>
                </div>
            </div>
        </div>

        @endforeach
    
    
        <div class="ol-md-4">
            <div class="card h-md-100">
                <div class="card-body d-flex flex-center">
                    <button type="button" class="btn btn-clear d-flex flex-column flex-center add_workspace" data-url="{{ route('workspace.create') }}">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/4.png') }}" alt="" class="mw-100 mh-150px mb-7">                      
                        <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Create New Workspace</div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <x-slot name='javascript'>
        <script>
            $(document).ready(function(){
                $('.add_workspace, .edit_workspace').on('click', function () {
                    var modal = $('#modal_large');
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'GET',
                        success: function(response){
                            modal.find('.modal-title').text(response.title);
                            modal.find('#modal_large_form').html(response.body);
                            modal.find('.modal-footer').html(response.footer);
                            modal.modal('show');
                        }
                    });
                });

                $('body').on('click', '#create_workspace_submit', function(){
                    var modal = $('#modal_large');
                    var form = $('#modal_large_form');
                    var formData = form.serializeArray();
                    KTUtil.loadSwal('Creating a Workspace', 'Please wait...', 'success');
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'POST',
                        data: formData,
                        success: function(response){
                            modal.modal('hide');
                        },
                        error: function(response){
                            form.find('.is-invalid').removeClass('is-invalid');
                            var errors = response.responseJSON.errors;
                            if (errors != undefined) {
                                form.find('.is-invalid').removeClass('is-invalid');
                                $.each(errors, function (key, value) {
                                    form.find('[name="' + key + '"]').addClass('is-invalid').closest('.form-input').find('.invalid-feedback').text(value[0]);
                                });
                            }
                        }
                    })
                });
            });
        </script>
    </x-slot>
</x-layouts.main>