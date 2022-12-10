<?php 
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\PitchController;
    use App\Http\Controllers\TimeSlotController;
    // Admin
    Route::group(['middleware'=>['CheckLogoutAdmin']],function () {
        Route::get('/login', [App\Http\Controllers\AdminController::class, 'admin_login']);
        Route::post('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    });
    Route::group(['middleware'=>['CheckLoginAdmin']],function () {
        Route::get('/logout', [App\Http\Controllers\AdminController::class, 'LogoutAdmin']);
        Route::get('/profile/{id}', [App\Http\Controllers\AdminController::class, 'Profile']);
        Route::post('/update-profile', [App\Http\Controllers\AdminController::class, 'UpdateProfile']);
        Route::get('/dashboards', [App\Http\Controllers\AdminController::class, 'index']);

        Route::get('/ListAdmin', [AdminController::class, 'ListAdmin']);
        Route::get('/AddAdmin', [AdminController::class, 'AddAdmin']);
        Route::post('/insert-admin', [AdminController::class,'insert_admin']);
        Route::post('/RemoveAdmin', [AdminController::class,'RemoveAdmin']);
        Route::get('/delete-admin/{admin_id}', [AdminController::class,'delete_admin']);
        Route::get('/edit-admin/{admin_id}', [AdminController::class,'edit_admin']);
        Route::post('/update-admin/{admin_id}', [AdminController::class,'update_admin']);
        Route::get('/add-pitch', [PitchController::class, 'index']);

        // pitch
        Route::get('/add-pitch', [PitchController::class,'index']);
        Route::get('/ListPitch', [PitchController::class,'ListPitch']);

        Route::post('/ajaxGetListDistricts', [PitchController::class,'ajaxGetListDistricts']);
        Route::post('/getStreetBy', [PitchController::class,'getStreetBy']);
        Route::post('/ajaxGetListWards', [PitchController::class,'ajaxGetListWards']);
        Route::post('/insert-pitch', [PitchController::class,'InsertPitch']);
        Route::post('/delete-img', [PitchController::class, 'DeleteImg']);

        Route::get('/delete-pitch/{pitch_id}', [PitchController::class,'DeletePitch']);
        Route::get('/edit-pitch/{pitch_id}', [PitchController::class,'EditPitch']);
        Route::post('/update-pitch/{pitch_id}', [PitchController::class,'UpdatePitch']);

        // pitch type
        Route::get('/add-pitchType', [PitchController::class,'FormPitchType']);
        Route::get('/ListPitchType', [PitchController::class,'ListPitchType']);
        Route::post('/insert-pitch-type', [PitchController::class,'InsertPitchType']);

        Route::get('/delete-pitchtype/{pitch_type_id}', [PitchController::class,'DeletePitchType']);
        Route::get('/edit-pitchtype/{pitch_type_id}', [PitchController::class,'EditPitchType']);
        Route::post('/update-pitchtype/{pitch_type_id}', [PitchController::class,'UpdatePitchType']);

        // time booking
        Route::get('/time-slot', [TimeSlotController::class,'TimeSlot']);
        Route::get('/add-time-slot', [TimeSlotController::class,'FormAddTime']);
        Route::post('/insert-time-slot', [TimeSlotController::class,'InsertTimeSlot']);

        Route::get('/delete-time/{time_id}', [TimeSlotController::class,'DeleteTime']);
        Route::get('/edit-time/{time_id}', [TimeSlotController::class,'EditTime']);
        Route::post('/update-time/{time_id}', [TimeSlotController::class,'UpdateTime']);
        // extension
        Route::get('/extension', [PitchController::class,'ListExtension']);
        Route::get('/add-extension', [PitchController::class,'AddExtension']);
        Route::post('/insert-extension', [PitchController::class,'InsertExtension']);
        Route::get('/delete-extension/{ex_id}', [PitchController::class,'DeleteExtension']);
        Route::get('/edit-extension/{ex_id}', [PitchController::class,'EditExtension']);
        Route::post('/update-extension/{ex_id}', [PitchController::class,'UpdateExtension']);

        // booking
        Route::get('/booking', [AdminController::class,'Booking']);
        Route::get('/done-booking/{booking_id}', [AdminController::class,'DoneBooking']);
    });
