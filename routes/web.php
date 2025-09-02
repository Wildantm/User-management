    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\PlantController;
    use App\Http\Controllers\DepartementController;
    use App\Http\Controllers\JabatanController;
    use App\Http\Controllers\UserDashboardController;
    use App\Http\Controllers\Admin\AdminDashboardController;
    use App\Http\Controllers\Supervisor\SupervisorController;

    use App\Http\Controllers\CheckPermissionController;


    // redirect default route ke halaman login

    Route::get('/', fn() => redirect()->route('login'));


    // ===============
    // Authentication Users
    // ===============
    Route::middleware(['auth'])->group(function() {

        // Profile management
        Route::prefix('profile')->group(function() {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
        });


        // ===============
        // user dashboard
        // ===============
        Route::prefix('users')->group(function() {
            Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('users.dashboard');
            Route::get('/profile/edit', [UserDashboardController::class, 'edit'])->name('users.edit');
            Route::put('/profile/update', [UserDashboardController::class, 'update'])->name('users.profile.update');
            // Route::get('/supervisor/dashboard', [SupervisorController::class, 'index'])->name('supervisor.dashboard');
            // Route::get('/', fn () => view('admin.dashboard'))->name('admin.dashboard');
        });

        Route::get('/profile', [UserDashboardController::class, 'profile'])->name('users.profile');


        // Plant, Jabatan, Departement management
        Route::resource('plant', PlantController::class);
        Route::resource('departements', DepartementController::class);
        Route::resource('jabatans', JabatanController::class);

        Route::get('/plant/{plant}/departements', [DepartementController::class, 'byPlant'])->name('plant.departements');
    });


    // ===============
    // Supervisor dashboard
    // ===============
    // Route::middleware(['auth', 'role:supervisor'])->prefix('supervisor')->group(function() {
    //     Route::get('/dashboard', [SupervisorController::class, 'index'])->name('supervisor.dashboard');
    //     Route::get('/index/{user:npk}', [SupervisorController::class, 'index'])->name('supervisor.index');
    // });

    // ===============
    // sectionhead dashboard
    // ===============
    Route::middleware(['auth', 'role:section_head'])->prefix('sectionhead')->group(function() {
        Route::get('/dashboard', [SupervisorController::class, 'dashboard'])->name('Supervisor.dashboard');
    });


    // Route::middleware(['auth', 'permission:admin.dashboard'])->group(function() {
    //     Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // });

    Route::middleware(['auth', 'permission:supervisor.dashboard'])->group(function() {
        Route::get('/supervisor/dashboard', [SupervisorController::class, 'index'])->name('supervisor.dashboard');
    });

    Route::middleware(['auth', 'permission:admin.permissions.index'])->group(function() {
        Route::get('/permissions', [CheckPermissionController::class, 'index'])->name('admin.permissions.index');
        Route::post('/permissions/assign', [CheckPermissionController::class, 'assignPermission'])->name('permissions.assign');
    });
    // ===============
    // Admin dashboard
    // ===============
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function() {
        Route::get('/', fn () => view('admin.dashboard'))->name('admin.dashboard');

        // Admin profile
        Route::get('/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
            Route::put('admin/users/{user:npk}', [AdminDashboardController::class, 'update'])->name('admin.users.update');


        //user management
        Route::get('/users', [AdminDashboardController::class, 'index'])->name('admin.users.index');
        Route::get('/users/edit/{user:npk}', [AdminDashboardController::class, 'edit'])->name('admin.users.edit');

        // Register User
        Route::get('/register', [AdminDashboardController::class, 'create'])->name('admin.register');
        Route::post('/register', [AdminDashboardController::class, 'store'])->name('admin.register.store');

        // Toggle Status
        Route::patch('/user/{user:npk}/toggle-active', [AdminDashboardController::class, 'toggleActive'])->name('admin.users.toggle-active');
        //delete user
        Route::delete('/user/{user:npk}', [AdminDashboardController::class, 'destroy'])->name('admin.users.destroy');


        //permission
        // Route::get('/admin/permission', [CheckPermissionController::class, 'index'])->name('admin.permission.index');
        // Route::put('/admin/permission/{user:npk', [CheckPermissionController::class])->name('admin.poermission.update');
        // Route::delete('/admin/permission/revoke-all/{user:npk}', [CheckPermissionController::class, 'revokeAll'])->name('admin.permission.revokeAll');
        Route::get('/permissions', [CheckPermissionController::class, 'index'])->name('permissions.index');
        Route::post('/permissions/assign', [CheckPermissionController::class, 'assignPermission'])->name('permissions.assign');
    });

    // Route::middleware(['auth', 'role_or_permission:admin|manage users'])->group(function() {
    //     Route::get('\admin\users', [AdminDashboardController::class, 'index'])->name('admin.users.index');
    // });

    // laravel Auth Routes
    require __DIR__.'/auth.php';