<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "--- BEFORE UPDATE ---\n";
foreach (User::all() as $user) {
    if (in_array($user->role_type, ['superadmin', 'admin'])) {
        echo "ID: {$user->id} | Role: {$user->role_type} | Email: {$user->email}\n";
    }
}

echo "\nPerforming update on local database...\n";

// 1. Update Super Admin
$superAdmin = User::where('role_type', 'superadmin')->first();
if ($superAdmin) {
    $superAdmin->email = 'superadmin@ihsnursing.com';
    $superAdmin->password = Hash::make('test@123');
    $superAdmin->password_raw = 'test@123';
    $superAdmin->save();
    echo "Local: Updated Super Admin (ID: {$superAdmin->id}) email to superadmin@ihsnursing.com and password to test@123.\n";
} else {
    foreach (User::all() as $user) {
        if (strtolower(trim($user->email)) === 'admin@impetus.com') {
            $user->email = 'superadmin@ihsnursing.com';
            $user->password = Hash::make('test@123');
            $user->password_raw = 'test@123';
            $user->save();
            echo "Local: Updated Super Admin (ID: {$user->id}) email to superadmin@ihsnursing.com and password to test@123.\n";
            break;
        }
    }
}

// 2. Update Admin
$admin = User::where('role_type', 'admin')->first();
if ($admin) {
    $admin->email = 'admin@ihsnursing.com';
    $admin->password = Hash::make('test@123');
    $admin->password_raw = 'test@123';
    $admin->save();
    echo "Local: Updated Admin (ID: {$admin->id}) email to admin@ihsnursing.com and password to test@123.\n";
} else {
    foreach (User::all() as $user) {
        $decryptedEmail = strtolower(trim($user->email));
        if ($decryptedEmail === 'admin@ventura.com' || $decryptedEmail === 'admin@venturacpd.com') {
            $user->email = 'admin@ihsnursing.com';
            $user->password = Hash::make('test@123');
            $user->password_raw = 'test@123';
            $user->save();
            echo "Local: Updated Admin (ID: {$user->id}) email to admin@ihsnursing.com and password to test@123.\n";
            break;
        }
    }
}

echo "\n--- AFTER UPDATE ---\n";
foreach (User::all() as $user) {
    if (in_array($user->role_type, ['superadmin', 'admin'])) {
        echo "ID: {$user->id} | Role: {$user->role_type} | Email: {$user->email}\n";
    }
}
