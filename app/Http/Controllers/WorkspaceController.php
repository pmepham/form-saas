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

        return view('workspace.workspace', ['current_workspace' => $currentWorkspace->id, 'workspaces' => $workspaces]);
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
        $workspace = Tenant::create($validated);
        $user = Auth::user();
        $currentWorkspace = app(TenantManager::class)->tenant()->id;
        $user->tenants()->attach($workspace->id);

        $html = view('components.workspace-card', [
            'key' => $workspace->id,
            'current_workspace' => $currentWorkspace,
            'workspace' => $workspace,
        ])->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function update(WorkspaceRequest $workspaceRequest, Tenant $workspace){
        // Update the existing workspace
        $validated = $workspaceRequest->validated();
        $workspace->update($validated);

        $currentWorkspace = app(TenantManager::class)->tenant()->id;

        $html = view('components.workspace-card', [
            'key' => $workspace->id,
            'current_workspace' => $currentWorkspace,
            'workspace' => $workspace->fresh(),
        ])->render();

        return response()->json([
            'target' => 'workspace_'.$workspace->id,
            'html' => $html
        ]);
    }

    public function destory() {
        //remove the tenant_user relationship if they dont own it

        //if they own it soft delete
    }

    //change the users tenant
    public function change($workspace){
        $user = Auth::user();
        $user->tenant_id = $workspace;
        $user->save();
        return response()->json(['redirect' => route('dashboard')]);
    }

}

?>