@props(['key', 'workspace', 'current_workspace'])

<div id="workspace_{{ $key }}" class="col-md-4">
    <div class="card card-flush h-md-100">
        <div class="card-header align-items-center">
            <div class="card-title">
                <h2>{{ $workspace->name }}</h2>
            </div>
            @if($current_workspace == $workspace->id)
            <h2 class="ml-auto"><i class="ki-solid ki-archive-tick fs-2qx text-primary"></i></h2>
            @endif
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
            @if($current_workspace != $workspace->id)
            <button class="btn btn-light btn-active-primary my-1 me-2 view_workspace" data-url="{{ route('workspace.change', $workspace) }}" data-csrf="{{ csrf_token() }}">View Workspace</a>
            @endif
            <button type="button" class="btn btn-light btn-active-light-primary my-1 edit_workspace" data-url="{{ route('workspace.show', $workspace) }}">Edit Workspace</button>
        </div>
    </div>
</div>