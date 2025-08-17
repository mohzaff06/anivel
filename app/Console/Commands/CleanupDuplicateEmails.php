<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanupDuplicateEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-duplicate-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $duplicates = DB::table('users')
            ->select('email')
            ->groupBy('email')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('email');

        foreach ($duplicates as $email) {
            $users = DB::table('users')->where('email', $email)->orderBy('id')->get();

            $primaryUser = $users->first();

            foreach ($users->skip(1) as $duplicateUser) {
                // Reassign related data if needed
                DB::table('posts')->where('user_id', $duplicateUser->id)
                    ->update(['user_id' => $primaryUser->id]);

                DB::table('users')->where('id', $duplicateUser->id)->delete();
            }
        }

        $stillDuplicates = DB::table('users')
            ->select('email')
            ->groupBy('email')
            ->havingRaw('COUNT(*) > 1')
            ->count();

        $this->info($stillDuplicates === 0
            ? '✅ All duplicates removed. Safe to add unique constraint.'
            : '⚠️ Still some duplicates. Check manually.');
    }

}
