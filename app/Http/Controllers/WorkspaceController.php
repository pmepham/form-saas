<?php

namespace App\Http\Controllers;

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

    public function show(Tenant $workspace){
        $id = 'create_workspace_submit';
        $title = 'Create a Workspace';
        $url = 'test';
        Log::info($workspace);
        if(!empty($workspace->id)){
            $id = 'update_workspace_submit';
            $title = 'Edit a Workspace';
            $url = 'text-update';
        }

        //show the modal
        $modal = [
            'title' => $title,
            'body' => view('workspace.workspace-modal', ['workspace' => $workspace])->render(),
            'footer' => view('components.modal-footer', ['footer' => ['id' => $id, 'url' => $url]])->render(),
        ];

        return response()->json($modal);
    }

    public function store(){
        //create the new workspace for that user
    }

    public function update(){
        //update the exisiting workspace
    }

    public function destory() {
        //remove the tenant_user relationship if they dont own it

        //if they own it soft delete
    }

}

?>