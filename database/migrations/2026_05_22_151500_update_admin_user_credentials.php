<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Update Super Admin (role_type = 'superadmin')
        $superAdmin = User::where('role_type', 'superadmin')->first();
        if ($superAdmin) {
            $superAdmin->email = 'superadmin@ihsnursing.com';
            $superAdmin->password = Hash::make('test@123');
            $superAdmin->password_raw = 'test@123';
            $superAdmin->save();
            echo "Successfully updated Super Admin (ID: {$superAdmin->id}) email to superadmin@ihsnursing.com and password to test@123.\n";
        } else {
            // Fallback: search by decrypted email 'admin@impetus.com'
            foreach (User::all() as $user) {
                if (strtolower(trim($user->email)) === 'admin@impetus.com') {
                    $user->email = 'superadmin@ihsnursing.com';
                    $user->password = Hash::make('test@123');
                    $user->password_raw = 'test@123';
                    $user->save();
                    echo "Successfully updated Super Admin (found by email, ID: {$user->id}) to superadmin@ihsnursing.com and password to test@123.\n";
                    break;
                }
            }
        }

        // 2. Update Admin (role_type = 'admin' or email = 'admin@ventura.com' / 'admin@venturacpd.com')
        $admin = User::where('role_type', 'admin')->first();
        if ($admin) {
            $admin->email = 'admin@ihsnursing.com';
            $admin->password = Hash::make('test@123');
            $admin->password_raw = 'test@123';
            $admin->save();
            echo "Successfully updated Admin (ID: {$admin->id}) email to admin@ihsnursing.com and password to test@123.\n";
        } else {
            // Fallback: search by decrypted email
            foreach (User::all() as $user) {
                $decryptedEmail = strtolower(trim($user->email));
                if ($decryptedEmail === 'admin@ventura.com' || $decryptedEmail === 'admin@venturacpd.com') {
                    $user->email = 'admin@ihsnursing.com';
                    $user->password = Hash::make('test@123');
                    $user->password_raw = 'test@123';
                    $user->save();
                    echo "Successfully updated Admin (found by email, ID: {$user->id}) to admin@ihsnursing.com and password to test@123.\n";
                    break;
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reversion logic not required for one-way administrative credential updates.
    }
};
