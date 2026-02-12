<x-layouts.auth title="Login">
    <x-slot name='css'></x-slot>
    <form class="form w-100" novalidate="novalidate" data-url="" id="kt_sign_up_form">
        <div class="mb-10 text-center">
            <h1 class="text-gray-900 mb-3">Create an Account</h1>
            <div class="text-gray-500 fw-semibold fs-4">Already have an account? 
            <a href="" class="link-primary fw-bold">Sign in here</a></div>
        </div>
        <div class="row mb-7">
            <div class="col-xl-6">
                <label class="form-label fw-bold text-gray-900 fs-6">First Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first_name" autocomplete="off" />
                <div class="invalid-feedback"></div>
            </div>
            <div class="col-xl-6">
                <label class="form-label fw-bold text-gray-900 fs-6">Last Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" autocomplete="off" />
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="mb-7">
            <label class="form-label fw-bold text-gray-900 fs-6">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="mb-10" data-kt-password-meter="true">
            <div class="mb-1">
                <label class="form-label fw-bold text-gray-900 fs-6">Password</label>
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                    <div class="invalid-feedback"></div>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="ki-solid ki-eye-slash fs-2"></i>
                        <i class="ki-solid ki-eye fs-2 d-none"></i>
                    </span>
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
        <div class="fv-row mb-5">
            <label class="form-label fw-bold text-gray-900 fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
        </div>
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="tac" value="1" />
                <span class="form-check-label fw-semibold text-gray-700 fs-6">I Agree 
                <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
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
    <x-slot name='javascript'></x-slot>
</x-layouts.auth>