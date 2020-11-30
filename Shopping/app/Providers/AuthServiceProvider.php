<?php

namespace App\Providers;

use App\ProductModel;
use App\Services\PermissionGateAndPolicyAccsess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();
        $permissionPolicy=new PermissionGateAndPolicyAccsess();
        $permissionPolicy->setPolicyGate();

        Gate::define('product-list',function ($user){
            return $user->checkPermissionAccess('product_list');
        });
        Gate::define('product-edit',function ($user,$id){
            $product=ProductModel::find($id);
            if ($user->checkPermissionAccess('product_edit')&& $user->id===$product->user_id){
                return true;
            }
            return false ;
        });

    }
}
