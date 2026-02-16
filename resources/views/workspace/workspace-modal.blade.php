@csrf
<input type="hidden" name="workspace_id" value="{{ $workspace->id ?? 0 }}">
<div class="form-input mb-10">
    <label class="form-label fs-6 fw-bold text-gray-900">Name</label>
    <input class="form-control form-control-lg form-control-solid" type="text" name="name" autocomplete="off" value="{{ $workspace->name ?? '' }}"/>
    <div class="invalid-feedback"></div>
</div>