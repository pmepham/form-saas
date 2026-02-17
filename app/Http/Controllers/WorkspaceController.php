<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkspaceRequest;
use App\Models\Tenant;
use App\Services\TenantManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
class WorkspaceController{

    public function index(){
        $currentWorkspace = app(TenantManager::class)->tenant();
        $workspaces = Auth::user()->tenants;

        return view('workspace.workspace', ['current_workspace' => $currentWorkspace, 'workspaces' => $workspaces]);
    }

    public function create(){
        $id = 'create_workspace_submit';
        $title = 'Create a Workspace';
        $url = route('workspace.store');

        $modal = [
            'title' => $title,
            'body' => view('workspace.workspace-modal', ['workspace' => null])->render(),
            'footer' => view('components.modal-footer', ['footer' => ['id' => $id, 'url' => $url]])->render(),
        ];

        return response()->json($modal);
    }

    public function show(Tenant $workspace){
        
        $id = 'update_workspace_submit';
        $title = 'Edit a Workspace';
        $url = route('workspace.update', $workspace);

        //show the modal
        $modal = [
            'title' => $title,
            'body' => view('workspace.workspace-modal', ['workspace' => $workspace])->render(),
            'footer' => view('components.modal-footer', ['footer' => ['id' => $id, 'url' => $url]])->render(),
        ];

        return response()->json($modal);
    }

    public function store(WorkspaceRequest $workspaceRequest){
        //create the new workspace for that user
        $validated = $workspaceRequest->validated();
        $tenant = Tenant::create($validated);
        $user = Auth::user();
        $user->tenants()->attach($tenant->id);
    }

    public function update(WorkspaceRequest $workspaceRequest, Tenant $workspace){
        //update the exisiting workspace
    }

    public function destory() {
        //remove the tenant_user relationship if they dont own it

        //if they own it soft delete
    }

}

?>