<?php

namespace App\Providers;
use App\Models\Specialization;
use App\Models\ComplainTypes;
use App\Models\Region;
use App\Models\Roles;
use App\Models\Category;
use App\Models\User;
use App\Models\Permissions;
use App\Models\Clinic;
use Illuminate\Support\ServiceProvider;
use View;
use DB;
use Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['offers.fields'], function ($view) {
            if(Auth::user()->role_id == 3){
                $specializationItems = Specialization::where('clinic_id', Auth::user()->clinic->id)->get()->filter(function ($specialization, $key){
                    if($specialization->hasOffer() && request()->route('offer') == $specialization->offer->id){
                        return $specialization->hasOffer();
                    }else{
                        return !$specialization->hasOffer();
                    }
                    
                })->pluck('name_en', 'id')->toArray();
            }else{
                $specializationItems = Specialization::get()->filter(function ($specialization, $key){
                    if($specialization->hasOffer() && request()->route('offer') == $specialization->offer->id){
                        return $specialization->hasOffer();
                    }else{
                        return !$specialization->hasOffer();
                    }
                })->pluck('name_en','id')->toArray();
            }
            $view->with('specializationItems', $specializationItems);
        });
        View::composer(['specializations.fields'], function ($view) {
            if(Auth::user()->role_id == 3){
                $clinicItems = Clinic::where('admin_id', Auth::id())->pluck('name_en', 'id')->toArray();
            }else{
                $clinicItems = Clinic::pluck('name_en','id')->toArray();
            }
            $view->with('clinicItems', $clinicItems);
        });
        View::composer(['clinics.fields'], function ($view) {
            $adminItems = User::select("*", DB::raw("CONCAT(users.name,' (',users.email, ')') as full"))->latest()->where('role_id', 3)->pluck('full', 'id')->toArray();
            $view->with('adminItems', $adminItems);
        });
        View::composer(['complains.fields'], function ($view) {
            $complain_typeItems = ComplainTypes::pluck('name_en','id')->toArray();
            $view->with('complain_typeItems', $complain_typeItems);
        });
        View::composer(['suburbs.fields', 'clinics.fields'], function ($view) {
            $regionItems = Region::pluck('name_en','id')->toArray();
            $view->with('regionItems', $regionItems);
        });
        View::composer(['categories.fields', 'specializations.fields'], function ($view) {
            $categoryItems = Category::where('parent_id', null)->pluck('name_en','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['roles.fields'], function ($view){
            $permissionItems = Permissions::pluck('name', 'id')->toArray();
            $view->with('permissionItems', $permissionItems);
        });
        View::composer(['admins.fields'], function ($view){
            $roleItems = Roles::pluck('name', 'id')->toArray();
            $view->with('roleItems', $roleItems);
        });
        //
    }
}