<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

class  PermissionGateAndPolicyAccsess{
    public function setPolicyGate(){
      $this->GateDefineCategory();
    }
    public  function GateDefineCategory(){
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-update','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }
}
