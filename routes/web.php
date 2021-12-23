<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//Auth::routes(['register' => false]);
Auth::routes([

    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...

]);


//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

Route::get('programs/am', 'ProgramController@am');
Route::group(['middleware' => 'prevent-back-history'], function () {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('tabledit', 'TableditController@index');

//    Route::post('tabledit/action', 'TableditController@action')->name('tabledit.action');
    Route::get('/Auth/register-user', 'UserRegisterController@registerUserForm')->name('register-user')->middleware(['auth', 'isAdmin']);
    Route::post('/Auth/register-create', 'UserRegisterController@registerCreate')->name('register-create')->middleware(['auth', 'isAdmin']);
    Route::get('/Auth/{id}/user-edit', 'UserRegisterController@userEdit')->name('user-edit')->middleware(['auth', 'isAdmin']);
    Route::put('/Auth/{id}/user-update', 'UserRegisterController@userUpdate')->name('user-update')->middleware(['auth', 'isAdmin']);
    Route::get('/Auth/{id}/user-delete', 'UserRegisterController@userDelete')->name('user-delete')->middleware(['auth', 'isAdmin']);

    Route::get('/Auth/change-password', 'UserRegisterController@changePassword')->name('change-password')->middleware(['auth']);
    Route::post('/Auth/{id}/change-password-update', 'UserRegisterController@changePasswordUpdate')->name('change-password-update')->middleware(['auth']);


    Route::get('/programs/program-create', 'ProgramController@programCreate')->name('program-create')->middleware(['auth', 'isAdmin']);
    Route::post('/programs/program-save', 'ProgramController@programSave')->name('program-save')->middleware(['auth', 'isAdmin']);
    Route::get('/programs/program-list', 'ProgramController@programList')->name('program-list')->middleware(['auth']);

    Route::get('/programs/program-mereja-music-create', 'ProgramController@programMerejaMusicCreate')->name('program-mereja-music-create')->middleware(['auth', 'isAdmin']);
    Route::post('/programs/program-mereja-music-save', 'ProgramController@programMerejaMusicSave')->name('program-mereja-music-save')->middleware(['auth', 'isAdmin']);
    Route::get('/programs/{id}/program-mereja-music-edit', 'ProgramController@programMerejaMusicEdit')->name('program-mereja-music-edit')->middleware(['auth', 'isAdmin']);
    Route::post('/programs/{id}/program-mereja-music-update', 'ProgramController@programMerejaMusicUpdate')->name('program-mereja-music-update')->middleware([ 'isAdmin']);
    Route::get('/programs/{id}/program-mereja-music-delete', 'ProgramController@programMerejaMusicDelete')->name('program-mereja-music-delete')->middleware([ 'isAdmin']);


//,'isTechnician','isUser'
    Route::get('/programs/{id}/program-list-by-date', 'AllController@programListByDate')->name('program-list-by-date')->middleware(['auth']);

    Route::get('/programs/{id}/program-list-by-date-tewat', 'AllController@programListByDateTewat')->name('program-list-by-date-tewat')->middleware(['auth']);
    Route::get('/programs/{id}/program-list-by-date-ken', 'AllController@programListByDateKen')->name('program-list-by-date-ken')->middleware(['auth']);
    Route::get('/programs/{id}/program-list-by-date-mata', 'AllController@programListByDateMata')->name('program-list-by-date-mata')->middleware(['auth']);
    Route::get('/programs/{id}/program-list-by-date-lelit', 'AllController@programListByDateLelit')->name('program-list-by-date-lelit')->middleware(['auth']);

    Route::post('/programs/{id}/program-list-by-date-tewat','AllController@updatePosition')->middleware(['auth']);
    Route::post('/programs/{id}/program-list-by-date-ken','AllController@updatePosition')->middleware(['auth']);
    Route::post('/programs/{id}/program-list-by-date-mata','AllController@updatePosition')->middleware(['auth']);
    Route::post('/programs/{id}/program-list-by-date-lelit','AllController@updatePosition')->middleware(['auth']);


    Route::get('/programs/{id}/program-list-by-date-tewat-print', 'AllController@programListByDateTewatPrint')->name('program-list-by-date-tewat-print')->middleware(['auth']);
    Route::get('/programs/{id}/program-list-by-date-ken-print', 'AllController@programListByDateKenPrint')->name('program-list-by-date-ken-print')->middleware(['auth']);
    Route::get('/programs/{id}/program-list-by-date-mata-print', 'AllController@programListByDateMataPrint')->name('program-list-by-date-mata-print')->middleware(['auth']);
    Route::get('/programs/{id}/program-list-by-date-lelit-print', 'AllController@programListByDateLelitPrint')->name('program-list-by-date-lelit-print')->middleware(['auth']);


    Route::get('/programs/{id}/program-list-by-date-edit', 'ProgramController@programListByDateEdit')->name('program-list-by-date-edit')->middleware(['auth', 'isAdmin']);
    Route::post('/programs/{id}/program-list-by-date-update', 'ProgramController@programListByDateUpdate')->name('program-list-by-date-update')->middleware([ 'auth','isAdmin']);
    Route::get('/programs/{id}/program-list-by-date-delete', 'ProgramController@programListByDateDelete')->name('program-list-by-date-delete')->middleware([ 'auth','isAdmin']);


    Route::get('/programs/program-ayidi-create', 'ProgramController@programAyidiCreate')->name('program-ayidi-create')->middleware(['auth','isAdmin']);
    Route::post('/programs/program-ayidi-save', 'ProgramController@programAyidiSave')->name('program-ayidi-save')->middleware(['auth','isAdmin']);

    Route::get('/programs/{id}/program-ayidi-edit', 'ProgramController@programAyidiEdit')->name('program-ayidi-edit')->middleware(['auth','isAdmin']);

    Route::PUT('/programs/{id}/program-ayidi-update', 'ProgramController@programAyidiUpdate')->name('program-ayidi-update')->middleware(['auth','isAdmin']);
    Route::get('/programs/{id}/program-ayidi-delete', 'ProgramController@programAyidiDelete')->name('program-ayidi-delete')->middleware(['auth','isAdmin']);


    Route::get('/programs/{id}/program-ayidi-expire-end', 'ProgramController@programAyidiEnd')->name('program-ayidi-expire-end')->middleware(['auth','isAdmin']);
    Route::get('/programs/{id}/program-ayidi-expire-start', 'ProgramController@programAyidiStart')->name('program-ayidi-expire-start')->middleware(['auth','isAdmin']);


    Route::post('/programs/{id}/program-approve-all', 'ProgramController@programApproveAll')->name('program-approve-all')->middleware(['auth','isAdmin']);
    Route::post('/programs/{id}/program-approve-tech', 'ProgramController@programApproveTech')->name('program-approve-tech')->middleware(['auth','isTechnician']);

    Route::post('/programs/{id}/mereja-approve-tech', 'ProgramController@merejaApproveTech')->name('mereja-approve-tech')->middleware(['auth','isTechnician']);
    Route::post('/programs/{id}/mereja-approve-artayi', 'ProgramController@merejaApproveArtayi')->name('mereja-approve-artayi')->middleware(['auth','isAdmin']);

    Route::get('/programs/mereja-music-list', 'ProgramController@merejaMusicList')->name('mereja-music-list');


    Route::get('/programs/merehagibr-create', 'ProgramController@merehagibrCreate')->name('merehagibr-create')->middleware(['isAdmin']);
    Route::post('/programs/merehagibr-save', 'ProgramController@merehagibrSave')->name('merehagibr-save')->middleware(['isAdmin']);
    Route::get('/programs/{id}/merehagibr-edit', 'ProgramController@merehagibrEdit')->name('merehagibr-edit')->middleware(['isAdmin']);
    Route::PUT('/programs/{id}/merehagibr-update', 'ProgramController@merehagibrUpdate')->name('merehagibr-update')->middleware(['isAdmin']);


//Fm


    Route::get('fm/programs/{id}/program-list-by-date-fm', 'Fm\AllcontrollerFM@programListByDateFm')->name('program-list-by-date-fm')->middleware(['auth']);


    Route::get('fm/programs/program-ayidi-create-fm', 'Fm\ProgramControllerFM@programAyidiCreateFm')->name('program-ayidi-create-fm')->middleware(['isFm']);
    Route::post('fm/programs/program-ayidi-save-fm', 'Fm\ProgramControllerFM@programAyidiSaveFm')->name('program-ayidi-save-fm')->middleware(['isFm']);

    Route::get('fm/programs/{id}/program-ayidi-edit-fm', 'Fm\ProgramControllerFM@programAyidiEditFm')->name('program-ayidi-edit-fm')->middleware(['isFm']);

    Route::PUT('fm/programs/{id}/program-ayidi-update-fm', 'Fm\ProgramControllerFM@programAyidiUpdateFm')->name('program-ayidi-update-fm')->middleware(['isFm']);
    Route::get('fm/programs/{id}/program-ayidi-delete-fm', 'Fm\ProgramControllerFM@programAyidiDeleteFm')->name('program-ayidi-delete-fm')->middleware(['isFm']);

    Route::get('fm/programs/{id}/program-ayidi-expire-end-fm', 'Fm\ProgramControllerFM@programAyidiEndFm')->name('program-ayidi-expire-end-fm')->middleware(['isFm']);
    Route::get('fm/programs/{id}/program-ayidi-expire-start-fm', 'Fm\ProgramControllerFM@programAyidiStartFm')->name('program-ayidi-expire-start-fm')->middleware(['isFm']);

    Route::get('fm/Auth/register-user-fm', 'Fm\UserRegisterControllerFM@registerUserFormFm')->name('register-user-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/Auth/register-create-fm', 'Fm\UserRegisterControllerFM@registerCreateFm')->name('register-create-fm')->middleware(['auth', 'isFm']);
    Route::get('fm/Auth/{id}/user-edit-fm', 'Fm\UserRegisterControllerFM@userEditFm')->name('user-edit-fm')->middleware(['auth', 'isFm']);
    Route::put('fm/Auth/{id}/user-update-fm', 'Fm\UserRegisterControllerFM@userUpdateFm')->name('user-update-fm')->middleware(['auth', 'isFm']);
    Route::get('fm/Auth/{id}/user-delete-fm', 'Fm\UserRegisterControllerFM@userDeleteFm')->name('user-delete-fm')->middleware(['auth', 'isFm']);

    Route::get('fm/programs/program-create-fm', 'Fm\ProgramControllerFM@programCreateFm')->name('program-create-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/programs/program-save-fm', 'Fm\ProgramControllerFM@programSaveFm')->name('program-save-fm')->middleware(['auth', 'isFm']);

    Route::get('fm/programs/program-list', 'Fm\ProgramControllerFM@programListFm')->name('program-list-fm')->middleware(['auth']);

    Route::get('fm/programs/{id}/program-list-by-date-edit-fm', 'Fm\ProgramControllerFM@programListByDateEditFm')->name('program-list-by-date-edit-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/programs/{id}/program-list-by-date-update-fm', 'Fm\ProgramControllerFM@programListByDateUpdateFm')->name('program-list-by-date-update-fm')->middleware(['auth', 'isFm']);
    Route::get('fm/programs/{id}/program-list-by-date-delete-fm', 'Fm\ProgramControllerFM@programListByDateDeleteFm')->name('program-list-by-date-delete-fm')->middleware(['auth', 'isFm']);


    Route::post('fm/programs/{id}/program-approve-all-fm', 'Fm\ProgramControllerFM@programApproveAllFm')->name('program-approve-all-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/programs/{id}/program-approve-tech-fm', 'Fm\ProgramControllerFM@programApproveTechFm')->name('program-approve-tech-fm')->middleware(['isTechnician']);


    Route::get('fm/merejaMusic/program-mereja-music-create-fm', 'Fm\MerejamusicControllerFM@programMerejaMusicCreateFm')->name('program-mereja-music-create-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/merejaMusic/program-mereja-music-save-fm', 'Fm\MerejamusicControllerFM@programMerejaMusicSaveFm')->name('program-mereja-music-save-fm')->middleware(['auth', 'isFm']);
    Route::get('fm/merejaMusic/{id}/program-mereja-music-edit-fm', 'Fm\MerejamusicControllerFM@programMerejaMusicEditFm')->name('program-mereja-music-edit-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/merejaMusic/{id}/program-mereja-music-update-fm', 'Fm\MerejamusicControllerFM@programMerejaMusicUpdateFm')->name('program-mereja-music-update-fm')->middleware(['auth', 'isFm']);
    Route::get('fm/programs/merejaMusic/{id}/program-mereja-music-delete-fm', 'Fm\MerejamusicControllerFM@programMerejaMusicDeleteFm')->name('program-mereja-music-delete-fm')->middleware(['auth', 'isFm']);

    Route::post('fm/merejaMusic/{id}/mereja-approve-tech-fm', 'Fm\MerejamusicControllerFM@merejaApproveTechFm')->name('mereja-approve-tech-fm')->middleware(['isTechnician']);
    Route::post('fm/merejaMusic/{id}/mereja-approve-artayi-fm', 'Fm\MerejamusicControllerFM@merejaApproveArtayiFm')->name('mereja-approve-artayi-fm')->middleware(['auth', 'isFm']);


    Route::get('fm/merejaMusic/programs/mereja-music-list-fm', 'Fm\MerejamusicControllerFM@merejaMusicListFm')->name('mereja-music-list-fm')->middleware(['auth']);


//promotion
    Route::get('pro/Auth/register-user-pro', 'Pro\UserRegisterControllerPro@registerUserFormPro')->name('register-user-pro')->middleware(['auth', 'isPromotion']);
    Route::post('pro/Auth/register-create-pro', 'Pro\UserRegisterControllerPro@registerCreatePro')->name('register-create-pro')->middleware(['auth', 'isPromotion']);
    Route::get('pro/Auth/{id}/user-edit-pro', 'Pro\UserRegisterControllerPro@userEditPro')->name('user-edit-pro')->middleware(['auth', 'isPromotion']);
    Route::put('pro/Auth/{id}/user-update-pro', 'Pro\UserRegisterControllerPro@userUpdatePro')->name('user-update-pro')->middleware(['auth', 'isPromotion']);
    Route::get('pro/Auth/{id}/user-delete-pro', 'Pro\UserRegisterControllerPro@userDeletePro')->name('user-delete-pro')->middleware(['auth', 'isPromotion']);


    Route::get('/mastawokia/mastawokia-create', 'MastawokiaController@mastawokiaCreate')->name('mastawokia-create')->middleware(['auth', 'isPromotion']);
    Route::post('/mastawokia/mastawokia-save', 'MastawokiaController@mastawokiaSave')->name('mastawokia-save')->middleware(['auth', 'isPromotion']);
    Route::get('/mastawokia/{id}/mastawokia-edit', 'MastawokiaController@mastawokiaEdit')->name('mastawokia-edit')->middleware(['auth', 'isPromotion']);
    Route::post('/mastawokia/{id}/mastawokia-update', 'MastawokiaController@mastawokiaUpdate')->name('mastawokia-update')->middleware(['auth', 'isPromotion']);
    Route::get('programs/mastawokia/{id}/mastawokia-delete', 'MastawokiaController@mastawokiaDelete')->name('mastawokia-delete')->middleware(['auth', 'isPromotion']);


    Route::post('/mastawokia/{id}/mastawokia-approve-tech', 'MastawokiaController@mastawokiaApproveTech')->name('mastawokia-approve-tech')->middleware(['isTechnician']);
    Route::post('/mastawokia/{id}/mastawokia-approve-tech-not', 'MastawokiaController@mastawokiaApproveTechNot')->name('mastawokia-approve-tech-not')->middleware(['isTechnician']);
    Route::post('/mastawokia/{id}/mastawokia-approve-artayi', 'MastawokiaController@mastawokiaApproveArtayi')->name('mastawokia-approve-artayi')->middleware(['isPromotion']);


    Route::get('/mastawokia/mastawokia-list', 'MastawokiaController@mastawokiaList')->name('mastawokia-list')->middleware(['auth']);
    Route::get('/mastawokia/mastawokia-list-yaltelalefu', 'MastawokiaController@mastawokiaListYaltelalefu')->name('mastawokia-list-yaltelalefu')->middleware(['auth','isPromotion']);


//    Route::get('/programs/{id}/program-list-by-date-tewat-print', 'AllController@programListByDateTewatPrint')->name('program-list-by-date-tewat-print')->middleware(['auth']);

//fm

    Route::get('fm/mastawokia/mastawokia-create-fm', 'Pro\MastawokiaControllerFM@mastawokiaCreateFm')->name('mastawokia-create-fm')->middleware(['auth', 'isPromotion']);
    Route::post('fm/mastawokia/mastawokia-save-fm', 'Pro\MastawokiaControllerFM@mastawokiaSaveFm')->name('mastawokia-save-fm')->middleware(['auth', 'isPromotion']);
    Route::get('fm/mastawokia/{id}/mastawokia-edit-fm', 'Pro\MastawokiaControllerFM@mastawokiaEditFm')->name('mastawokia-edit-fm')->middleware(['auth', 'isPromotion']);
    Route::post('fm/mastawokia/{id}/mastawokia-update-fm', 'Pro\MastawokiaControllerFM@mastawokiaUpdateFm')->name('mastawokia-update-fm')->middleware(['auth', 'isPromotion']);
    Route::get('fm/programs/mastawokia/{id}/mastawokia-delete-fm', 'Pro\MastawokiaControllerFM@mastawokiaDeleteFm')->name('mastawokia-delete-fm')->middleware(['auth', 'isPromotion']);

    Route::get('fm/mastawokia/mastawokia-list-fm', 'Pro\MastawokiaControllerFM@mastawokiaListFm')->name('mastawokia-list-fm')->middleware(['auth']);
    Route::get('fm/mastawokia/mastawokia-list-fm-yaltelalefu', 'Pro\MastawokiaControllerFM@mastawokiaListFmYaltelalefu')->name('mastawokia-list-fm-yaltelalefu')->middleware(['isPromotion']);


    Route::post('fm/mastawokia/{id}/mastawokia-approve-artayi-fm', 'Pro\MastawokiaControllerFM@mastawokiaApproveArtayiFm')->name('mastawokia-approve-artayi-fm')->middleware(['isPromotion']);
    Route::post('fm/mastawokia/{id}/mastawokia-approve-tech-fm', 'Pro\MastawokiaControllerFM@mastawokiaApproveTechFm')->name('mastawokia-approve-tech-fm')->middleware(['isTechnician']);
    Route::post('fm/mastawokia/{id}/mastawokia-approve-tech-not-fm', 'Pro\MastawokiaControllerFM@mastawokiaApproveTechNotFm')->name('mastawokia-approve-tech-not-fm')->middleware(['isTechnician']);

    Route::get('fm/programs/{id}/program-list-by-date-tewat-fm', 'Fm\AllcontrollerFM@programListByDateTewatFm')->name('program-list-by-date-tewat-fm')->middleware(['auth']);
    Route::get('fm/programs/{id}/program-list-by-date-ken-fm', 'Fm\AllcontrollerFM@programListByDateKenFm')->name('program-list-by-date-ken-fm')->middleware(['auth']);
    Route::get('fm/programs/{id}/program-list-by-date-mata-fm', 'Fm\AllcontrollerFM@programListByDateMataFm')->name('program-list-by-date-mata-fm')->middleware(['auth', ]);
    Route::get('fm/programs/{id}/program-list-by-date-lelit-fm', 'Fm\AllcontrollerFM@programListByDateLelitFm')->name('program-list-by-date-lelit-fm')->middleware(['auth']);



    Route::post('fm/programs/{id}/program-list-by-date-ken-fm','Fm\AllcontrollerFM@updatePositionFm')->middleware(['auth']);
    Route::post('fm/programs/{id}/program-list-by-date-tewat-fm', 'Fm\AllcontrollerFM@updatePositionFm')->middleware(['auth']);
    Route::post('fm/programs/{id}/program-list-by-date-mata-fm', 'Fm\AllcontrollerFM@updatePositionFm')->middleware(['auth', ]);
    Route::post('fm/programs/{id}/program-list-by-date-lelit-fm', 'Fm\AllcontrollerFM@updatePositionFm')->middleware(['auth']);





    Route::get('fm/programs/{id}/program-list-by-date-tewat-print', 'Fm\AllcontrollerFM@programListByDateTewatPrintFm')->name('program-list-by-date-tewat-print-fm')->middleware(['auth']);
    Route::get('fm/programs/{id}/program-list-by-date-ken-print', 'Fm\AllcontrollerFM@programListByDateKenPrintFm')->name('program-list-by-date-ken-print-fm')->middleware(['auth']);
    Route::get('fm/programs/{id}/program-list-by-date-mata-print', 'Fm\AllcontrollerFM@programListByDateMataPrintFm')->name('program-list-by-date-mata-print-fm')->middleware(['auth']);
    Route::get('fm/programs/{id}/program-list-by-date-lelit-print', 'Fm\AllcontrollerFM@programListByDateLelitPrintFm')->name('program-list-by-date-lelit-print-fm')->middleware(['auth']);


    Route::get('fm/programs/program-template-create-fm', 'Fm\ProgramControllerFM@programTemplateCreateFm')->name('program-template-create-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/programs/program-template-save-fm', 'Fm\ProgramControllerFM@programTemplateSaveFm')->name('program-template-save-fm')->middleware(['auth', 'isFm']);
    Route::get('fm/programs/{id}/program-template-edit-fm', 'Fm\ProgramControllerFM@programTemplateEditFm')->name('program-template-edit-fm')->middleware(['auth', 'isFm']);
    Route::post('fm/programs/{id}/program-template-update-fm', 'Fm\ProgramControllerFM@programTemplateUpdateFm')->name('program-template-update-fm')->middleware(['auth', 'isFm']);


//    tv
    Route::get('tv/programs/program-create-tv', 'Tv\ProgramControllerTv@programCreateTv')->name('program-create-tv')->middleware(['auth', 'isTv']);

//    Route::get('/findProductName','TestController@findProductName');


    Route::get('tv/programs/program-create-tv-find', 'Tv\ProgramControllerTv@findProductName')->name('program-create-tv-find')->middleware(['auth', 'isTv']);
    Route::get('tv/programs/program-create-tv-find-pcontent', 'Tv\ProgramControllerTv@findProductNameContent')->name('program-create-tv-find-pcontent')->middleware(['auth', 'isTv']);
    Route::post('tv/programs/program-save-tv', 'Tv\ProgramControllerTv@programSaveTv')->name('program-save-tv')->middleware(['auth', 'isTv']);





    Route::get('Tv/Auth/register-user-tv', 'TV\UserRegisterControllerTv@registerUserFormTv')->name('register-user-tv')->middleware(['auth', 'isTv']);
    Route::post('Tv/Auth/register-create-tv', 'TV\UserRegisterControllerTv@registerCreateTv')->name('register-create-tv')->middleware(['auth', 'isTv']);
    Route::get('Tv/Auth/{id}/user-edit-tv', 'TV\UserRegisterControllerTv@userEditTv')->name('user-edit-tv')->middleware(['auth', 'isTv']);
    Route::put('Tv/Auth/{id}/user-update-tv', 'TV\UserRegisterControllerTv@userUpdateTv')->name('user-update-tv')->middleware(['auth', 'isTv']);
    Route::get('Tv/Auth/{id}/user-delete-tv', 'TV\UserRegisterControllerTv@userDeleteTv')->name('user-delete-tv')->middleware(['auth', 'isTv']);


    Route::get('tv/programs/program-template-create', 'Tv\ProgramControllerTv@programTemplateCreate')->name('program-template-create')->middleware(['auth', 'isTv']);
    Route::post('tv/programs/program-template-save', 'Tv\ProgramControllerTv@programTemplateSave')->name('program-template-save')->middleware(['auth', 'isTv']);
    Route::get('tv/programs/{id}/program-template-edit', 'Tv\ProgramControllerTv@programTemplateEdit')->name('program-template-edit')->middleware(['auth', 'isTv']);
    Route::post('tv/programs/{id}/program-template-update', 'Tv\ProgramControllerTv@programTemplateUpdate')->name('program-template-update')->middleware(['auth', 'isTv']);

    Route::get('tv/programs/{id}/program-list-by-date-tv', 'Tv\AllcontrollerTv@programListByDateTv')->name('program-list-by-date-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-edit-tv', 'Tv\ProgramControllerTv@programListByDateEditTv')->name('program-list-by-date-edit-tv')->middleware(['auth', 'isTv']);
    Route::post('tv/programs/{id}/program-list-by-date-update-tv', 'Tv\ProgramControllerTv@programListByDateUpdateTv')->name('program-list-by-date-update-tv')->middleware(['auth', 'isTv']);
    Route::get('tv/programs/{id}/program-list-by-date-delete-tv', 'Tv\ProgramControllerTv@programListByDateDeleteTv')->name('program-list-by-date-delete-tv')->middleware(['auth', 'isTv']);



    Route::get('tv/programs/{id}/program-list-by-date-tewat-tv', 'Tv\AllcontrollerTv@programListByDateTewatTv')->name('program-list-by-date-tewat-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-ken-tv', 'Tv\AllcontrollerTv@programListByDateKenTv')->name('program-list-by-date-ken-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-mata-tv', 'Tv\AllcontrollerTv@programListByDateMataTv')->name('program-list-by-date-mata-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-lelit-tv', 'Tv\AllcontrollerTv@programListByDateLelitTv')->name('program-list-by-date-lelit-tv')->middleware(['auth']);

    Route::post('tv/programs/{id}/program-list-by-date-tewat-tv', 'Tv\AllcontrollerTv@updatePositionTv')->middleware(['auth']);
    Route::post('tv/programs/{id}/program-list-by-date-ken-tv', 'Tv\AllcontrollerTv@updatePositionTv')->middleware(['auth']);
    Route::post('tv/programs/{id}/program-list-by-date-mata-tv', 'Tv\AllcontrollerTv@updatePositionTv')->middleware(['auth']);
    Route::post('tv/programs/{id}/program-list-by-date-lelit-tv', 'Tv\AllcontrollerTv@updatePositionTv')->middleware(['auth']);


    Route::post('tv/programs/{id}/program-approve-all-tv', 'Tv\ProgramControllerTv@programApproveAllTv')->name('program-approve-all-tv')->middleware(['auth', 'isTv']);
    Route::post('tv/programs/{id}/program-approve-tech-tv', 'Tv\ProgramControllerTv@programApproveTechTv')->name('program-approve-tech-tv')->middleware(['isTvtechnician']);


    Route::get('tv/programs/{id}/program-list-by-date-tewat-print', 'Tv\AllcontrollerTv@programListByDateTewatPrintTv')->name('program-list-by-date-tewat-print-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-ken-print', 'Tv\AllcontrollerTv@programListByDateKenPrintTv')->name('program-list-by-date-ken-print-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-mata-print', 'Tv\AllcontrollerTv@programListByDateMataPrintTv')->name('program-list-by-date-mata-print-tv')->middleware(['auth']);
    Route::get('tv/programs/{id}/program-list-by-date-lelit-print', 'Tv\AllcontrollerTv@programListByDateLelitPrintTv')->name('program-list-by-date-lelit-print-tv')->middleware(['auth']);


    Route::get('tv/programs/program-list-tv', 'Tv\AllcontrollerTv@programListTv')->name('program-list-tv')->middleware(['auth']);


//tv mastawokia

    Route::get('tv/mastawokia/mastawokia-create-tv', 'Pro\MastawokiaControllerTv@mastawokiaCreateTv')->name('mastawokia-create-tv')->middleware(['auth', 'isPromotion']);
    Route::post('tv/mastawokia/mastawokia-save-tv', 'Pro\MastawokiaControllerTv@mastawokiaSaveTv')->name('mastawokia-save-tv')->middleware(['auth', 'isPromotion']);
    Route::get('tv/mastawokia/{id}/mastawokia-edit-tv', 'Pro\MastawokiaControllerTv@mastawokiaEditTv')->name('mastawokia-edit-tv')->middleware(['auth', 'isPromotion']);
    Route::post('tv/mastawokia/{id}/mastawokia-update-tv', 'Pro\MastawokiaControllerTv@mastawokiaUpdateTv')->name('mastawokia-update-tv')->middleware(['auth', 'isPromotion']);
    Route::get('tv/programs/mastawokia/{id}/mastawokia-delete-tv', 'Pro\MastawokiaControllerTv@mastawokiaDeleteTv')->name('mastawokia-delete-tv')->middleware(['auth', 'isPromotion']);


    Route::post('tv/mastawokia/{id}/mastawokia-approve-artayi-tv', 'Pro\MastawokiaControllerTv@mastawokiaApproveArtayiTv')->name('mastawokia-approve-artayi-tv')->middleware(['isPromotion']);
    Route::post('tv/mastawokia/{id}/mastawokia-approve-tech-tv', 'Pro\MastawokiaControllerTv@mastawokiaApproveTechTv')->name('mastawokia-approve-tech-tv')->middleware(['auth']);//tv
    Route::post('tv/mastawokia/{id}/mastawokia-approve-tech-not-tv', 'Pro\MastawokiaControllerTv@mastawokiaApproveTechNotTv')->name('mastawokia-approve-tech-not-tv')->middleware(['auth']); //tv


    Route::get('tv/mastawokia/mastawokia-list-tv', 'Pro\MastawokiaControllerTv@mastawokiaListTv')->name('mastawokia-list-tv')->middleware(['auth']);
    Route::get('tv/mastawokia/mastawokia-list-tv-yaltelalefu', 'Pro\MastawokiaControllerTv@mastawokiaListTvYaltelalefu')->name('mastawokia-list-tv-yaltelalefu')->middleware(['auth']);

//administrator

    Route::get('admin/Auth/register-user-admin', 'Admin\UserRegisterControllerAdmin@registerUserFormAdmin')->name('register-user-admin')->middleware(['auth', 'isSysAdmin']);
    Route::post('admin/Auth/register-create-admin', 'Admin\UserRegisterControllerAdmin@registerCreateAdmin')->name('register-create-admin')->middleware(['auth', 'isSysAdmin']);
    Route::get('admin/Auth/{id}/user-edit-admin', 'Admin\UserRegisterControllerAdmin@userEditAdmin')->name('user-edit-admin')->middleware(['auth', 'isSysAdmin']);
    Route::put('admin/Auth/{id}/user-update-admin', 'Admin\UserRegisterControllerAdmin@userUpdateAdmin')->name('user-update-admin')->middleware(['auth', 'isSysAdmin']);
    Route::get('admin/Auth/{id}/user-delete-admin', 'Admin\UserRegisterControllerAdmin@userDeleteAdmin')->name('user-delete-admin')->middleware(['auth', 'isSysAdmin']);


    Route::post('admin/Auth/{id}/user-make-active', 'Admin\UserRegisterControllerAdmin@userMakeActive')->name('user-make-active')->middleware(['auth', 'isSysAdmin']);
    Route::post('admin/Auth/{id}/user-make-inactive', 'Admin\UserRegisterControllerAdmin@userMakeInActive')->name('user-make-inactive')->middleware(['auth', 'isSysAdmin']);


//    feedback
    Route::get('feedback/feedback-create', 'Fb\FeedbackController@feedbackCreate')->name('feedback-create')->middleware(['auth']);
    Route::post('feedback/{id}/feedback-save', 'Fb\FeedbackController@feedbackSave')->name('feedback-save')->middleware(['auth']);


    Route::get('feedback/{id}/feedback-delete', 'Fb\FeedbackController@feedbackDelete')->name('feedback-delete')->middleware(['auth', 'isSysAdmin']);


//supervisor



    Route::get('supervisor/Auth/register-user-supervisor', 'supervisor\supervisorController@registerUserFormSupervisor')->name('register-user-supervisor')->middleware(['auth', 'isSuper']);
    Route::post('supervisor/Auth/register-create-supervisor', 'supervisor\supervisorController@registerCreateSupervisor')->name('register-create-supervisor')->middleware(['auth', 'isSuper']);
    Route::get('supervisor/Auth/{id}/user-edit-supervisor', 'supervisor\supervisorController@userEditSupervisor')->name('user-edit-supervisor')->middleware(['auth', 'isSuper']);
    Route::put('supervisor/Auth/{id}/user-update-supervisor', 'supervisor\supervisorController@userUpdateSupervisor')->name('user-update-supervisor')->middleware(['auth', 'isSuper']);
    Route::get('supervisor/Auth/{id}/user-delete-supervisor', 'supervisor\supervisorController@userDeleteSupervisor')->name('user-delete-supervisor')->middleware(['auth', 'isSuper']);


    Route::post('tv/programs/{id}/program-approve-supervisor-tv', 'Tv\ProgramControllerTv@programApproveSupervisor')->name('program-approve-supervisor-tv')->middleware(['auth', 'isSuper']);
    Route::post('tv/mastawokia/{id}/mastawokia-approve-supervisor-tv', 'Pro\MastawokiaControllerTv@mastawokiaApprovesupervisorTv')->name('mastawokia-approve-supervisor-tv')->middleware(['auth', 'isSuper']);

});



