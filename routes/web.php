    <?php

    use App\Http\Controllers\Admin\BookApprovalController;
    use App\Http\Controllers\Admin\BookController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\KategoriController;
    use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjaman;
    use App\Http\Controllers\Admin\PeminjamController as AdminPeminjamanController;
    use App\Http\Controllers\Admin\PeminjamController;
    use App\Http\Controllers\Admin\PengembalianController;
    use App\Http\Controllers\Admin\LaporanController;
    use App\Http\Controllers\Admin\StaffAuthController;
    use App\Http\Controllers\Admin\StaffController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\Peminjam\BookController as PeminjamBookController;
    use App\Http\Controllers\Peminjam\FavoriteController;
    use App\Http\Controllers\Peminjam\PeminjamanController;
    use App\Http\Controllers\Petugas\BookRequestController;
    use App\Http\Controllers\Petugas\DashboardController as DashboardPetugasController;
    use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjaman;
    use App\Http\Controllers\Petugas\PengembalianController as PetugasPengembalian;
    use App\Http\Controllers\ReviewController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('landing');
    })->name('landing');


    //petugas
    Route::get('petugas/dashboard', function () {
        return view('petugas/dashboard');
    });

    //data petugas
    Route::get('admin/dataPengguna/petugas/index', [StaffController::class, 'index'])->name('admin.dataPengguna.petugas.index');


    //admin
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');


    //data peminjam
    Route::get('admin/dataPengguna/peminjam/index', [PeminjamController::class, 'index'])->name('admin.dataPengguna.peminjam.index');

    //peminjam
    Route::get('/peminjam', [PeminjamBookController::class, 'index'])->name('peminjam.index');
    Route::get('/peminjam/buku/{book}', [PeminjamBookController::class, 'show'])->name('peminjam.buku.detail');


    // Route::get('peminjam/buku/detail', function () {
    //     return view('peminjam/buku/detail');
    // })->name('peminjam/buku/detail');


    Route::get('peminjam/peminjaman/form', function () {
        return view('peminjam.peminjaman.form');
    })->name('peminjaman/form');

    Route::get('admin/peminjam/edit/{id}', [PeminjamController::class, 'edit']);


    Route::delete('admin/peminjam/delete/{id}', [PeminjamController::class, 'destroy']);

    //Login
    Route::get('/auth/login', function () {
        return view('auth.login');
    })->name('auth/login');

    Route::get('login', function () {
        return redirect('/petugas/login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

    // Forgot Password for Users
    Route::get('/auth/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
    Route::post('/auth/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
    Route::get('/auth/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/auth/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('password.update');

    //register
    Route::get('register', function () {
        return view('auth/register');
    })->name('auth/register');

    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('admin/dataPengguna/petugas/create', [StaffController::class, 'create']);
    Route::post('admin/dataPengguna/petugas/store', [StaffController::class, 'store']);

    // halaman login
    Route::get('/petugas/login', [StaffAuthController::class, 'showLogin'])
        ->name('petugas.login');

    // proses login
    Route::post('/petugas/login', [StaffAuthController::class, 'login'])
        ->name('petugas.login.process');

    // Forgot Password for Staff
    Route::get('/petugas/forgot-password', [App\Http\Controllers\Admin\StaffForgotPasswordController::class, 'showForgotForm'])->name('staff.password.request');
    Route::post('/petugas/forgot-password', [App\Http\Controllers\Admin\StaffForgotPasswordController::class, 'sendResetLink'])->name('staff.password.email');
    Route::get('/petugas/reset-password', [App\Http\Controllers\Admin\StaffForgotPasswordController::class, 'showResetForm'])->name('staff.password.reset');
    Route::post('/petugas/reset-password', [App\Http\Controllers\Admin\StaffForgotPasswordController::class, 'resetPassword'])->name('staff.password.update');

    Route::view('/petugas/dashboard', 'petugas.dashboard');

    Route::get('/petugas/logout', [StaffAuthController::class, 'logout'])
        ->name('staff.logout');


    // Route::resource('admin/dataBuku', BookController::class)
    //     ->names('admin.dataBuku');

    Route::get('admin/dataBuku/modal_create', [BookController::class, 'create']);
    Route::post('admin/dataBuku/store', [BookController::class, 'store'])->name('dataBuku.store');
    Route::get('admin/dataBuku/index', [BookController::class, 'index'])->name('admin.dataBuku.index');
    Route::put('admin/dataBuku/{book}', [BookController::class, 'update'])->name('admin.dataBuku.update');
    Route::delete('admin/dataBuku/{book}', [BookController::class, 'destroy']);


    Route::resource('admin/kategori', KategoriController::class);


    Route::prefix('petugas')->group(function () {
        Route::get('/dataBuku', [BookRequestController::class, 'index']);
        Route::post('/dataBuku/store', [BookRequestController::class, 'store']);
        Route::post('/dataBuku/update/{book}', [BookRequestController::class, 'update']);
        Route::post('/dataBuku/delete/{book}', [BookRequestController::class, 'delete']);
        Route::get('/dataKategori', function () {
            $kategori = \App\Models\KategoriBuku::all();
            return view('petugas.dataKategori.index', compact('kategori'));
        })->name('petugas.dataKategori.index');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/book-requests', [BookApprovalController::class, 'index'])->name('admin.book.requests');
        Route::post('/book-requests/approve/{requestData}', [BookApprovalController::class, 'approve']);
        Route::post('/book-requests/reject/{requestData}', [BookApprovalController::class, 'reject']);
        Route::get('/messages', function () {
            $messages = \App\Models\Message::where('recipient', 'admin')->orderBy('created_at', 'desc')->get();
            return view('admin.messages.index', compact('messages'));
        })->name('admin.messages.index');
        Route::get('/reviews', function () {
            $reviews = \App\Models\Review::with(['user', 'book'])->orderBy('created_at', 'desc')->get();
            return view('admin.reviews.index', compact('reviews'));
        })->name('admin.reviews.index');
    });

    Route::get('peminjam/peminjaman/form', function () {
        return view('peminjam.peminjaman.form');
    })->name('peminjam.peminjaman.form');

    Route::get('/petugas/dashboard', [DashboardPetugasController::class, 'index']);



    Route::get('/admin/settings', [StaffController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings/update', [StaffController::class, 'updateSettings'])->name('admin.settings.update');


    Route::middleware('auth')->group(function () {
        Route::post('/favorit/{id}', [FavoriteController::class, 'toggle'])->name('favorit.toggle');
        Route::get('/favorit', [FavoriteController::class, 'index'])->name('favorit.index');
        Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/peminjaman/{id}/pdf', [PeminjamanController::class, 'generatePDF'])->name('peminjaman.pdf');
        Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

        Route::get('/peminjam/settings', [AuthController::class, 'showProfile'])->name('peminjam.settings');
        Route::post('/peminjam/settings/update', [AuthController::class, 'updateProfile'])->name('peminjam.settings.update');
    });


    Route::get('/buku/{book}/pinjam', [BookController::class, 'Formpinjam'])->name('buku.Formpinjam');



    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/peminjaman', [AdminPeminjaman::class, 'index'])->name('admin.peminjaman.index');
        Route::post('/peminjaman/{id}/approve', [AdminPeminjaman::class, 'approve'])->name('admin.peminjaman.approve');
        Route::post('/peminjaman/{id}/reject', [AdminPeminjaman::class, 'reject'])->name('admin.peminjaman.reject');
    });



    Route::prefix('petugas')->middleware('staff.auth')->group(function () {
        Route::get('/peminjaman', [PetugasPeminjaman::class, 'index'])
            ->name('petugas.peminjaman.index');

        Route::post('/peminjaman/{id}/approve', [PetugasPeminjaman::class, 'approve'])
            ->name('petugas.peminjaman.approve');

        Route::post('/peminjaman/{id}/reject', [PetugasPeminjaman::class, 'reject'])
            ->name('petugas.peminjaman.reject');

        Route::get('/pengembalian', [PetugasPengembalian::class, 'index'])
            ->name('petugas.pengembalian.index');

        Route::post('/pengembalian/approve/{id}', [PetugasPengembalian::class, 'approve'])
            ->name('petugas.pengembalian.approve');

        Route::post('/pengembalian/tolak/{id}', [PetugasPengembalian::class, 'tolak'])
            ->name('petugas.pengembalian.tolak');

        Route::get('/messages', function () {
            $messages = \App\Models\Message::where('recipient', 'petugas')->orderBy('created_at', 'desc')->get();
            return view('petugas.messages.index', compact('messages'));
        })->name('petugas.messages.index');

        Route::get('/reviews', function () {
            $reviews = \App\Models\Review::with(['user', 'book'])->orderBy('created_at', 'desc')->get();
            return view('petugas.reviews.index', compact('reviews'));
        })->name('petugas.reviews.index');

        Route::get('/settings', [StaffController::class, 'settings'])->name('petugas.settings');
        Route::post('/settings/update', [StaffController::class, 'updateSettings'])->name('petugas.settings.update');
    });


    Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])
        ->name('peminjam.riwayat');


    Route::post(
        '/peminjaman/{id}/kembalikan',
        [PeminjamanController::class, 'kembalikan']
    )->name('peminjaman.kembalikan');



    Route::prefix('admin')->group(function () {

        Route::get('/pengembalian', [PengembalianController::class, 'index'])
            ->name('admin.pengembalian');

        Route::post('/pengembalian/approve/{id}', [PengembalianController::class, 'approve'])
            ->name('admin.pengembalian.approve');

        Route::post('/pengembalian/tolak/{id}', [PengembalianController::class, 'tolak'])
            ->name('admin.pengembalian.tolak');
    });

    Route::post(
        '/admin/pengembalian/tolak/{id}',
        [App\Http\Controllers\Admin\PeminjamanController::class, 'tolakPengembalian']
    )
        ->name('admin.pengembalian.tolak');

    // Route Laporan PDF
    Route::prefix('admin/laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('admin.laporan.index');
        Route::get('/buku', [LaporanController::class, 'buku'])->name('laporan.buku');
        Route::get('/peminjam', [LaporanController::class, 'peminjam'])->name('laporan.peminjam');
        Route::get('/petugas', [LaporanController::class, 'petugas'])->name('laporan.petugas');
        Route::get('/peminjaman', [LaporanController::class, 'peminjaman'])->name('laporan.peminjaman');
        Route::get('/pengembalian', [LaporanController::class, 'pengembalian'])->name('laporan.pengembalian');
    });

    // Route Laporan PDF Petugas
    Route::prefix('petugas/laporan')->middleware('staff.auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Petugas\LaporanController::class, 'index'])->name('petugas.laporan.index');
        Route::get('/buku', [App\Http\Controllers\Petugas\LaporanController::class, 'buku'])->name('petugas.laporan.buku');
        Route::get('/peminjam', [App\Http\Controllers\Petugas\LaporanController::class, 'peminjam'])->name('petugas.laporan.peminjam');
        Route::get('/petugas', [App\Http\Controllers\Petugas\LaporanController::class, 'petugas'])->name('petugas.laporan.petugas');
        Route::get('/peminjaman', [App\Http\Controllers\Petugas\LaporanController::class, 'peminjaman'])->name('petugas.laporan.peminjaman');
        Route::get('/pengembalian', [App\Http\Controllers\Petugas\LaporanController::class, 'pengembalian'])->name('petugas.laporan.pengembalian');
        Route::get('/kategori', [App\Http\Controllers\Petugas\LaporanController::class, 'kategori'])->name('petugas.laporan.kategori');
    });

// Contact form route
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
