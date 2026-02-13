<x-layouts.auth title="Register">
    <x-slot name='css'></x-slot>
    <form class="form w-100" novalidate="novalidate" data-url="{{ route('register.store') }}" id="kt_sign_up_form">
        @csrf
        <div class="mb-10 text-center">
            <h1 class="text-gray-900 mb-3">Create an Account</h1>
            <div class="text-gray-500 fw-semibold fs-4">Already have an account? 
            <a href="{{ route('login.index') }}" class="link-primary fw-bold">Sign in here</a></div>
        </div>
        <div class="form-input mb-7">
            <label class="form-label fw-bold text-gray-900 fs-6">Full Name</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-input mb-7">
            <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-input mb-10" data-kt-password-meter="true">
            <div class="mb-1">
                <div class="d-flex align-items-end justify-content-between">
                    <label class="form-label fw-bold text-gray-900 fs-6">Password</label>
                    <span class="btn btn-sm btn-icon ml-auto" data-kt-password-meter-control="visibility">
                        <i class="ki-solid ki-eye-slash fs-2"></i>
                        <i class="ki-solid ki-eye fs-2 d-none"></i>
                    </span>
                </div>
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
            </div>
            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
        </div>
        <div class="form-input mb-5">
            <label class="form-label fw-bold text-gray-900 fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-input mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="tac" value="1" />
                <span class="form-check-label fw-semibold text-gray-700 fs-6">I Agree <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                <div class="invalid-feedback ms-0"></div>
            </label>
        </div>
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Register</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
    <x-slot name='javascript'>
        <script>
            $(document).ready(function () {
                $('#kt_sign_up_submit').on('click', function(e){
                    e.preventDefault();
                    var submit = $(this)
                    if (!submit.prop('disabled')) {
                        submit.prop('disabled', true);
                        submit.attr('data-kt-indicator', 'on');
                        var form = $('#kt_sign_up_form');
                        var formData = form.serializeArray();
                        $.ajax({
                            url: form.attr('data-url'),
                            type: 'POST',
                            data: formData,
                            success: function(response){
                                $('#error').hide();
                                form.find('.is-invalid').removeClass('is-invalid')
                                form.find('.form-control').addClass('is-valid')
                                KTUtil.loadSwal('Logging In', 'Please wait...', 'success');
                                setTimeout(function () {
                                    window.location.assign(response.redirect);
                                }, 1500);
                            },
                            error: function(response){
                                form.find('.is-invalid').removeClass('is-invalid');
                                submit.prop('disabled', false);
                                submit.attr('data-kt-indicator', '');
                                var errors = response.responseJSON.errors;
                                if (errors != undefined) {
                                    $('#error').hide();
                                    form.find('.is-invalid').removeClass('is-invalid');
                                    $.each(errors, function (key, value) {
                                        form.find('[name="' + key + '"]').addClass('is-invalid').closest('.form-input').find('.invalid-feedback').text(value[0]);
                                    });
                                }
                            }
                        });
                    }
                });
            })
        </script>
    </x-slot>
</x-layouts.auth>