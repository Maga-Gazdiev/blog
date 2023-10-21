<?php

// app/Console/Commands/DeleteUnverifiedAccounts.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\User;

class DeleteUnverifiedAccounts extends Command
{
    protected $signature = 'delete:unverified-accounts';
    protected $description = 'Delete unverified user accounts created more than 24 hours ago';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $twentyFourHoursAgo = Carbon::now()->subHours(24);
        $unverifiedUsers = \App\Models\User::where('email_verified_at', null)
            ->where('created_at', '<', $twentyFourHoursAgo)
            ->get();

        foreach ($unverifiedUsers as $user) {
            $user->delete();
        }

        $this->info('Unverified accounts deleted successfully.');
    }
}

