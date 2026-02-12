<x-layouts.auth title="Login">
    <x-slot name='css'></x-slot>

    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-url="" action="#">
        <div class="text-center mb-10">
            <h1 class="text-gray-900 mb-3">Sign In to Saul HTML Pro</h1>
            <div class="text-gray-500 fw-semibold fs-4">New Here? 
            <a href="" class="link-primary fw-bold">Create an Account</a></div>
        </div>
        <div class="mb-10">
            <label class="form-label fs-6 fw-bold text-gray-900">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bold text-gray-900 fs-6 mb-0">Password</label>
                <a href="" class="link-primary fs-6 fw-bold">Forgot Password ?</a>
            </div>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="text-center">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Login</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>

    <x-slot name='javascript'></x-slot>
</x-layouts.auth>