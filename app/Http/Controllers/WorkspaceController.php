<?php

namespace App\Http\Controllers;

use App\Services\TenantManager;
use Illuminate\Support\Facades\Auth;
class WorkspaceController{

    public function index(){
        $currentWorkspace = app(TenantManager::class)->tenant();
        $workspaces = Auth::user()->tenants;

        return view('workspace.workspace', ['current_workspace' => $currentWorkspace, 'workspaces' => $workspaces]);
    }

    public function show(){
        //show the modal
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