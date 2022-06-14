<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;

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
    return view('pages.login');
});

Route::match(['get','post'],'/login',[AdminpanelController::class, 'Login']);
Route::get('/register',[AdminpanelController::class, 'RegisterPage']);
Route::match(['get','post'],'/saveregister',[AdminpanelController::class, 'Register']);

Route::get('/index',[AdminpanelController::class, 'Index']);
Route::get('/dashboard',[AdminpanelController::class, 'Dashboard']);
Route::get('/about',[AdminpanelController::class, 'about']);
Route::get('/contact-us',[AdminpanelController::class, 'Contactus']);
Route::get('/donate',[AdminpanelController::class, 'Donate']);
Route::get('/donation',[AdminpanelController::class, 'Donation']);
Route::get('/events',[AdminpanelController::class, 'Events']);
Route::get('/sponsor',[AdminpanelController::class, 'Sponsor']);
Route::get('/left-sidebar',[AdminpanelController::class, 'leftSidebar']);

Route::post('/insert-sub-menu',[AddController::class, 'insertSubmenu']);
//Home area starts here
Route::get('/add-home',[AddController::class, 'AddSample']);

Route::get('/add-banner',[AddController::class, 'AddBanner']);
Route::get('/edit-banner/{id}',[AddController::class, 'editBanner']);
Route::put('update-banner/{id}', [AddController::class, 'updateBanner']);
Route::post('/search-banner',[AddController::class, 'SearchBanner']);
Route::post('/insert-banner',[AddController::class, 'insertBanner']);
Route::get('/delete-banner/{id}',[AddController::class, 'destroyBanner']);

Route::get('/add-home-causes',[AddController::class, 'AddCauses']);
Route::get('/edit-causes/{id}',[AddController::class, 'editCauses']);
Route::put('update-causes/{id}', [AddController::class, 'updateCauses']);
Route::post('/insert-causes',[AddController::class, 'insertCauses']);
Route::post('/search-causes',[AddController::class, 'SearchCauses']);
Route::get('/delete-causes/{id}',[AddController::class, 'destroyCauses']);

Route::get('/add-home-purpose',[AddController::class, 'AddPurpose']);
Route::get('/edit-purpose/{id}',[AddController::class, 'editPurpose']);
Route::put('update-purpose/{id}', [AddController::class, 'updatePurpose']);
Route::post('/insert-purpose',[AddController::class, 'insertPurpose']);
Route::post('/search-purpose',[AddController::class, 'SearchPurpose']);
Route::get('/delete-purpose/{id}',[AddController::class, 'destroyPurpose']);


Route::get('/add-home-gallery',[AddController::class, 'AddGallery']);
Route::get('/edit-gallery/{id}',[AddController::class, 'editGallery']);
Route::put('update-gellery/{id}', [AddController::class, 'updateGallery']);
Route::post('/insert-gallery-category',[AddController::class, 'insertGallerycategory']);
Route::post('/insert-gallery',[AddController::class, 'insertGallery']);
Route::post('/search-gallery',[AddController::class, 'SearchGallery']);
Route::get('/delete-gallery/{id}',[AddController::class, 'destroyGallery']);

Route::get('/add-home-help',[AddController::class, 'AddHelpus']);
Route::get('/edit-help/{id}',[AddController::class, 'editHelp']);
Route::put('update-help/{id}', [AddController::class, 'updateHelp']);
Route::post('/insert-help',[AddController::class, 'insertHelp']);
Route::post('/search-help',[AddController::class, 'SearchHelp']);
Route::get('/delete-help/{id}',[AddController::class, 'destroyHelp']);

Route::get('/add-home-events',[AddController::class, 'AddEvent']);
Route::get('/edit-upcoming-event/{id}',[AddController::class, 'editUpcomingevent']);
Route::put('update-upcoming-event/{id}', [AddController::class, 'updateUpcomingevent']);
Route::post('/insert-event',[AddController::class, 'insertEvent']);
Route::post('/search-home-event',[AddController::class, 'SearchhomeEvent']);
Route::get('/delete-home-event/{id}',[AddController::class, 'destroyHomeevent']);

Route::get('/add-home-people',[AddController::class, 'AddPeople']);
Route::get('/edit-people/{id}',[AddController::class, 'editPeople']);
Route::put('update-people/{id}', [AddController::class, 'updatePeople']);
Route::post('/insert-people',[AddController::class, 'insertPeople']);
Route::post('/search-people',[AddController::class, 'SearchPeople']);
Route::get('/delete-people/{id}',[AddController::class, 'destroyPeople']);

Route::get('/add-home-sponsor',[AddController::class, 'AddSponsor']);
Route::get('/edit-home-sponsor/{id}',[AddController::class, 'editSponsor']);
Route::put('update-home-sponsor/{id}', [AddController::class, 'updateHomesponsor']);
Route::post('/insert-sponsor',[AddController::class, 'insertSponsor']);
Route::post('/search-home-sponsor',[AddController::class, 'SearchhomeSponsor']);
Route::get('/delete-home-sponsor/{id}',[AddController::class, 'destroyHomeSponsor']);

Route::get('/edit-home/{id}',[AddController::class, 'editSample']);
// Route::get('/add-sample',[AddController::class, 'AddSample']);
Route::match(['get','post'],'/insert-sample',[AddController::class, 'insertSample2']);
Route::post('/search-home',[AddController::class, 'SearchHome']);
Route::get('/delete-home/{id}',[AddController::class, 'destroy']);
//Home area ends here

//About area starts here
Route::get('/add-about',[AboutController::class, 'Addabout']);
Route::get('/add-about-us',[AboutController::class, 'AddAboutus']);
Route::put('update-about-us/{id}', [AboutController::class, 'updateAboutus']);
Route::get('/edit-about-us/{id}',[AboutController::class, 'editAboutus']);
Route::post('/insert-about-us',[AboutController::class, 'insertAboutus']);
Route::post('/search-about-us',[AboutController::class, 'SearchAboutus']);
Route::get('/delete-about-us/{id}',[AboutController::class, 'destroyAboutus']);

Route::get('/add-about-owner',[AboutController::class, 'AddOwner']);
Route::get('/edit-owner/{id}',[AboutController::class, 'editOwner']);
Route::put('update-owner/{id}', [AboutController::class, 'updateOwner']);
Route::post('/insert-owner',[AboutController::class, 'insertAboutowner']);
Route::post('/search-about-owner',[AboutController::class, 'SearchAboutowner']);
Route::get('/delete-about-owner/{id}',[AboutController::class, 'destroyOwner']);

Route::get('/add-about-volunteer',[AboutController::class, 'AddVolunteer']);
Route::post('/insert-volunteer',[AboutController::class, 'insertVolunteer']);
Route::get('/edit-volunteer/{id}',[AboutController::class, 'editVolunteer']);
Route::put('update-volunteer/{id}', [AboutController::class, 'updateVolunteer']);
Route::post('/search-about-volunteer',[AboutController::class, 'SearchAboutVolunteer']);
Route::get('/delete-about-volunteer/{id}',[AboutController::class, 'destroyVolunteer']);

Route::get('/add-about-total',[AboutController::class, 'AddTotal']);
Route::get('/edit-total/{id}',[AboutController::class, 'editTotal']);
Route::put('update-total/{id}', [AboutController::class, 'updateTotal']);
Route::post('/insert-total',[AboutController::class, 'insertTotal']);
Route::post('/search-about-total',[AboutController::class, 'SearchAbouttotal']);
Route::get('/delete-about-total/{id}',[AboutController::class, 'destroyTotal']);

Route::get('/edit-about/{id}',[AboutController::class, 'editabout']);
Route::match(['get','post'],'/insert-about',[AboutController::class, 'insertAbout']);
Route::post('/search-about',[AboutController::class, 'SearchAbout']);
Route::get('/delete-about/{id}',[AboutController::class, 'destroy']);

//About area ends here

//Contact us area starts here
Route::get('/add-contact-us',[ContactController::class, 'AddContactus']);
Route::get('/edit-contact-us/{id}',[ContactController::class, 'editContactus']);
Route::post('/insert-contact-us',[ContactController::class, 'insertContactus']);
Route::get('/delete-contact-us/{id}',[ContactController::class, 'destroy']);
Route::post('/search-contact-us',[ContactController::class, 'SearchContact']);

//Contact us ends starts here

//Event area starts here
Route::get('/add-events',[EventController::class, 'AddEvents']);
Route::get('/edit-events/{id}',[EventController::class, 'editEvents']);
Route::put('update-event/{id}', [EventController::class, 'updateEvent']);
Route::post('/insert-events',[EventController::class, 'insertEvent']);
Route::post('/search-event',[EventController::class, 'SearchEvent']);
Route::get('/delete-event/{id}',[EventController::class, 'destroy']);
//Event ends starts here

//Sponsor area starts here
Route::get('/add-sponsor',[SponsorController::class, 'AddSponsor']);
Route::get('/edit-sponsor/{id}',[SponsorController::class, 'editSponsor']);
Route::put('update-sponsor/{id}', [SponsorController::class, 'updateSponsor']);
Route::post('/insert-sponsors',[SponsorController::class, 'insertSponsor']);
Route::get('/delete-sponsor/{id}',[SponsorController::class, 'destroy']);
Route::post('/search-sponsor',[SponsorController::class, 'SearchSponsor']);
//Sponsor area ends here

//Donation area starts here
Route::get('/add-donation',[DonationController::class, 'AddDonation']);
Route::get('/edit-donation/{id}',[DonationController::class, 'editDonation']);
Route::post('/insert-donation',[DonationController::class, 'insertDonation']);
Route::get('/delete-donation/{id}',[DonationController::class, 'destroy']);
Route::post('/search-donation',[DonationController::class, 'SearchDonation']);
//Donation area ends here

Route::get('/session/remove',[AdminpanelController::class, 'deleteUserProfile'])->name('session.delete');

Route::post('/send',[ContactController::class,'send'])->name('send.email');





