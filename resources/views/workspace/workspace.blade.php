<x-layouts.main title="Workspaces">
    <x-slot name='css'>
    </x-slot>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        @foreach ($workspaces as $workspace)
            <x-workspace-card :key="$workspace->id" :workspace="$workspace"
                :current_workspace="$current_workspace"></x-workspace-card>

        @endforeach


        <div id="create_workspace" class="col-md-4">
            <div class="card h-md-100">
                <div class="card-body d-flex flex-center">
                    <button type="button" class="btn btn-clear d-flex flex-column flex-center add_workspace"
                        data-url="{{ route('workspace.create') }}">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/4.png') }}" alt=""
                            class="mw-100 mh-150px mb-7">
                        <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Create New Workspace</div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-modal id="workspace_lg_modal" url=""></x-modal>
    <x-slot name='javascript'>
        <script>
            $(document).ready(function () {
                $('body').on('click', '.add_workspace, .edit_workspace', function () {
                    var modal = $('#workspace_lg_modal');
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'GET',
                        success: function (response) {
                            modal.find('.modal-title').text(response.title);
                            modal.find('#workspace_lg_modal_form').html(response.body);
                            modal.find('.modal-footer').html(response.footer);
                            modal.modal('show');
                        }
                    });
                });

                $('body').on('click', '#create_workspace_submit', function () {
                    var modal = $('#workspace_lg_modal');
                    var form = $('#workspace_lg_modal_form');
                    var formData = form.serializeArray();
                    KTUtil.loadSwal('Creating a Workspace', 'Please wait...', 'success');
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            $('#create_workspace').before($(response.html));
                            modal.modal('hide');
                        },
                        error: function (response) {
                            form.find('.is-invalid').removeClass('is-invalid');
                            var errors = response.responseJSON.errors;
                            if (errors != undefined) {
                                form.find('.is-invalid').removeClass('is-invalid');
                                $.each(errors, function (key, value) {
                                    form.find('[name="' + key + '"]').addClass('is-invalid').closest('.form-input').find('.invalid-feedback').text(value[0]);
                                });
                            }
                        }
                    });
                });

                $('body').on('click', '#update_workspace_submit', function () {
                    var modal = $('#workspace_lg_modal');
                    var form = $('#workspace_lg_modal_form');
                    var formData = form.serializeArray();
                    KTUtil.loadSwal('Updating a Workspace', 'Please wait...', 'success');
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'PUT',
                        data: formData,
                        success: function (response) {
                            $('body #'+response.target).replaceWith($(response.html));
                            modal.modal('hide');
                        },
                        error: function (response) {
                            form.find('.is-invalid').removeClass('is-invalid');
                            var errors = response.responseJSON.errors;
                            if (errors != undefined) {
                                form.find('.is-invalid').removeClass('is-invalid');
                                $.each(errors, function (key, value) {
                                    form.find('[name="' + key + '"]').addClass('is-invalid').closest('.form-input').find('.invalid-feedback').text(value[0]);
                                });
                            }
                        }
                    });
                });

                $('body').on('click', '.view_workspace', function () {
                    formData = [{name: '_token', value: $(this).attr('data-csrf')}]
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'PATCH',
                        data: formData,
                        success: function (response) {
                            KTUtil.loadSwal('Changing Workspace', 'Please wait...', 'success');
                            setTimeout(function () {
                                window.location.assign(response.redirect);
                            }, 1500);
                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-layouts.main>