<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$prefixBackend = config('myconf.url.prefix_backend');
Route::group(['prefix' => $prefixBackend, 'namespace' => 'Admin'], function () {
    // ======================================= LOGIN =======================================
    $prefix = '';
    $controllerName = 'auth';
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('', [
            'as'    =>  $controllerName. '/login',
            'uses'  =>  $controller . 'login'
        ])->middleware('check.login');
        Route::post('post-login', [
            'as'    =>  $controllerName. '/post-login',
            'uses'  =>  $controller . 'postLogin'
        ]);
        Route::get('/logout', [
            'as'    =>  $controllerName. '/logout',
            'uses'  =>  $controller . 'logout'
        ]);
    });

    //====================== DASHBOARD ======================
    $prefix = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' => $prefix, 'middleware' => ['permission.area']], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('', [
            'as'        => $controllerName. '/manager',
            'uses'      => $controller . 'index'
        ]);
    });

    // ======================================= USER =======================================
    $prefix         = 'user';
    $controllerName = 'user';
    Route::group(['prefix' => $prefix, 'middleware' => ['permission.area']], function () use ($controllerName) {

        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', [
            'as'    =>  $controllerName . '/manager',
            'uses'  =>  $controller . 'index'
        ]);

        Route::get('form/{id?}', [
            'as'    =>  $controllerName . '/form',
            'uses'  =>  $controller . 'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as'    =>  $controllerName . '/save',
            'uses'  =>  $controller . 'save'
        ]);

        Route::post('change-password', [
            'as'    =>  $controllerName . '/change-password',
            'uses'  =>  $controller . 'changePassword'
        ]);

        Route::post('change-role-post', [
            'as'    =>  $controllerName . '/change-role-post',
            'uses'  =>  $controller . 'changeRolePost'
        ]);

        Route::get('delete/{id}', [
            'as'    =>  $controllerName . '/delete',
            'uses'  =>  $controller . 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as'    =>  $controllerName . '/change-status-backend',
            'uses'  =>  $controller . 'changeStatus'
        ])->where('id', '[0-9]+');
        
        Route::get('change-role-{role}/{id}', [
            'as'    =>  $controllerName . '/change-role',
            'uses'  =>  $controller . 'changeRole'
        ])->where('level', '[A-Za-z]+')->where('id', '[0-9]+');
    });


    //====================== RECRUIT ======================
    $prefix = 'recruit';
    $controllerName = 'recruit';
    Route::group(['prefix' => $prefix, 'middleware' => ['permission.area']], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('', [
            'as'        => $controllerName . '/manager',
            'uses'      => $controller . 'index'
        ]);

        Route::get('form/{id?}', [
            'as'    =>  $controllerName . '/form',
            'uses'  =>  $controller . 'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as'    =>  $controllerName . '/save-recruit-backend',
            'uses'  =>  $controller . 'save'
        ]);

        Route::post('change-password', [
            'as'    =>  $controllerName . '/change-password',
            'uses'  =>  $controller . 'changePassword'
        ])->where('id', '[0-9]+');

        Route::get('delete/{id}', [
            'as'    =>  $controllerName . '/delete',
            'uses'  =>  $controller . 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as'    =>  $controllerName . '/change-status-backend',
            'uses'  =>  $controller . 'changeStatus'
        ])->where('id', '[0-9]+');
       
    });

    //====================== JOB ======================
    $prefix = 'job';
    $controllerName = 'job';
    Route::group(['prefix' => $prefix, 'middleware' => ['permission.area']], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('', [
            'as'        => $controllerName . '/manager',
            'uses'      => $controller . 'index'
        ]);

        Route::get('form/{id?}', [
            'as'    =>  $controllerName . '/form',
            'uses'  =>  $controller . 'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as'    =>  $controllerName . '/save',
            'uses'  =>  $controller . 'save'
        ]);

        Route::post('change-password', [
            'as'    =>  $controllerName . '/change-password',
            'uses'  =>  $controller . 'changePassword'
        ])->where('id', '[0-9]+');

        Route::get('delete/{id}', [
            'as'    =>  $controllerName . '/delete',
            'uses'  =>  $controller . 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as'    =>  $controllerName . '/change-status-backend',
            'uses'  =>  $controller . 'changeStatus'
        ])->where('id', '[0-9]+');

        Route::get('change-type-{type}/{id}', [
            'as'    =>  $controllerName . '/type',
            'uses'  =>  $controller . 'changeType'
        ])->where('id', '[0-9]+');
    });

    //====================== CANDIDATE ======================
    $prefix = 'candidate';
    $controllerName = 'candidate';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('', [
            'as'        => $controllerName . '/manager',
            'uses'      => $controller . 'index'
        ]);

        Route::get('form/{id?}', [
            'as'    =>  $controllerName . '/form',
            'uses'  =>  $controller . 'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as'    =>  $controllerName . '/save-candidate-backend',
            'uses'  =>  $controller . 'save'
        ]);

        Route::post('change-password', [
            'as'    =>  $controllerName . '/change-password',
            'uses'  =>  $controller . 'changePassword'
        ])->where('id', '[0-9]+');

        Route::get('delete/{id}', [
            'as'    =>  $controllerName . '/delete',
            'uses'  =>  $controller . 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as'    =>  $controllerName . '/change-status-backend',
            'uses'  =>  $controller . 'changeStatus'
        ])->where('id', '[0-9]+');
    });

});

$prefixFrontend = config('myconf.url.prefix_frontend');
Route::group(['prefix' => $prefixFrontend, 'namespace' => 'Jobhunt'], function () {
    //====================== HOME ======================
    $prefix = '';
    $controllerName = 'home';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('', [
            'as'        => $controllerName,
            'uses'      => $controller . 'index'
        ]);

        Route::get('login', [
            'as'        => $controllerName . '/login',
            'uses'      => $controller . 'login'
        ]);

        Route::post('login-recruit', [
            'as'        => $controllerName . '/login-recruit',
            'uses'      => $controller . 'loginRecruit'
        ]);

        Route::post('login-candidate', [
            'as'        => $controllerName . '/login-candidate',
            'uses'      => $controller . 'loginCandidate'
        ]);

        Route::get('register', [
            'as'        => $controllerName . '/register',
            'uses'      => $controller . 'register'
        ]);

        Route::post('register-recruit', [
            'as'        => $controllerName . '/register-recruit',
            'uses'      => $controller . 'registerRecruit'
        ]);

        Route::post('register-candidate', [
            'as'        => $controllerName . '/register-candidate',
            'uses'      => $controller . 'registerCandidate'
        ]);

        Route::get('lgout', [
            'as'        => $controllerName . '/logout',
            'uses'      => $controller . 'logout'
        ]);

        Route::get('list-job', [
            'as'        => $controllerName . '/list-job',
            'uses'      => $controller . 'listJob'
        ]);

        Route::get('list-job/{career_name}/{career_id}', [
            'as'        => $controllerName . '/list-job-in-career',
            'uses'      => $controller . 'listJobInCareer'
        ]);
    });

    //====================== RECRUIT ======================
    $prefix = '';
    $controllerName = 'recruit';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('recruit-profile', [
            'as'        => $controllerName . '/profile',
            'uses'      => $controller . 'index'
        ]);

        Route::post('save', [
            'as'    =>  $controllerName . '/save',
            'uses'  =>  $controller . 'save'
        ]);

        Route::get('list-candidate', [
            'as'    =>  $controllerName . '/list-candidate',
            'uses'  =>  $controller . 'listCandidate'
        ]);

        Route::get('change-status-{status}/{id}', [
            'as'    =>  $controllerName . '/change-status',
            'uses'  =>  $controller . 'changeStatus'
        ])->where('id', '[0-9]+');

        Route::get('form-send-email', [
            'as' => $controllerName .'/form-send-email', 
            'uses' => $controller . 'formSendEmail'
        ]);

        Route::post('send-email', [
            'as' => $controllerName .'/send-email', 
            'uses' => $controller . 'sendEmail'
        ]);

        Route::get('delete-candidate/{id}', [
            'as'    =>  $controllerName . '/delete-candidate',
            'uses'  =>  $controller . 'deleteCandidate'
        ])->where('id', '[0-9]+');

        Route::get('change-password-recruit', [
            'as'    =>  $controllerName . '/change-password-recruit',
            'uses'  =>  $controller . 'changePasswordRecruit'
        ])->where('id', '[0-9]+');
        Route::post('change-password-recruit', [
            'as'    =>  $controllerName . '/change-password-recruit-post',
            'uses'  =>  $controller . 'changePasswordRecruitPost'
        ])->where('id', '[0-9]+');
    });

    //====================== JOB ======================
    $prefix = '';
    $controllerName = 'job';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('manager-job', [
            'as'        => $controllerName . '/manager-job-frontend',
            'uses'      => $controller . 'index'
        ]);
        
        Route::get('form/{id?}', [
            'as'    =>  $controllerName . '/form-add-job',
            'uses'  =>  $controller . 'form'
        ])->where('id', '[0-9]+');

        Route::post('save-job-frontend', [
            'as'    =>  $controllerName . '/save-job-frontend',
            'uses'  =>  $controller . 'saveJobFrontend'
        ]);

        Route::get('single-job/{id}', [
            'as'    =>  $controllerName . '/single-job',
            'uses'  =>  $controller . 'singleJob'
        ]); 
        Route::get('delete/{id}', [
            'as'    =>  $controllerName . '/delete-job',
            'uses'  =>  $controller . 'deleteJob'
        ])->where('id', '[0-9]+');
    });

    //====================== CANDIDATE ======================
    $prefix = '';
    $controllerName = 'candidate';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('candidate-profile', [
            'as'        => $controllerName . '/profile',
            'uses'      => $controller . 'index'
        ]);

        Route::post('save-candidate-frontend', [
            'as'    =>  $controllerName . '/save',
            'uses'  =>  $controller . 'save'
        ]);

        Route::get('applied-job/{id}', [
            'as'    =>  $controllerName . '/applied-job',
            'uses'  =>  $controller . 'appliedJob'
        ]);

        Route::get('candidate-single/{id}', [
            'as'    =>  $controllerName . '/candidate-single',
            'uses'  =>  $controller . 'candidateSingle'
        ]);
        
        Route::get('manager-job-applied', [
            'as'    =>  $controllerName . '/manager-job-applied',
            'uses'  =>  $controller . 'showAppliedJob'
        ]);
        Route::get('change-password-candidate', [
            'as'    =>  $controllerName . '/change-password-candidate',
            'uses'  =>  $controller . 'changePasswordCandidate'
        ])->where('id', '[0-9]+');
        Route::post('change-password-candidate', [
            'as'    =>  $controllerName . '/change-password-candidate-post',
            'uses'  =>  $controller . 'changePasswordCandidatePost'
        ])->where('id', '[0-9]+');
    });
});