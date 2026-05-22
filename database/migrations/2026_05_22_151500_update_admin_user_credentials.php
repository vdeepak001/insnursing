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
        // Fetch all users to handle encrypted model attributes
        $users = User::all();
        $updatedCount = 0;

        foreach ($users as $user) {
            $decryptedEmail = strtolower(trim($user->email));
            if ($decryptedEmail === 'admin@ventura.com' || $decryptedEmail === 'admin@venturacpd.com') {
                $user->email = 'admin@ihsnursing.com';
                $user->password = Hash::make('test@123');
                $user->password_raw = 'test@123';
                $user->save();
                $updatedCount++;
            }
        }

        echo "Successfully updated {$updatedCount} admin user(s).\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $users = User::all();
        $revertedCount = 0;

        foreach ($users as $user) {
            $decryptedEmail = strtolower(trim($user->email));
            if ($decryptedEmail === 'admin@ihsnursing.com') {
                $user->email = 'admin@venturacpd.com';
                // Password remains test@123, or can be reset if needed.
                $user->password = Hash::make('test@123');
                $user->password_raw = 'test@123';
                $user->save();
                $revertedCount++;
            }
        }

        echo "Successfully reverted {$revertedCount} admin user(s).\n";
    }
};
