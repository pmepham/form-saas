<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Services\TenantManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
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
        if(!empty($workspace->id)){
            $id = 'update_workspace_submit';
            $title = 'Edit a Workspace';
            $url = 'text-update';
        }
        $footer = ['id' => $id, 'url' => $url];
        Log::info($footer);
        //show the modal
        $modal = [
            'title' => $title,
            'body' => Blade::render('workspace.workspace-modal', ['workspace' => $workspace], true),
            'footer' => Blade::render('components.modal-footer', $footer, true)
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