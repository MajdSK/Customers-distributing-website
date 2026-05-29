<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Services\CustomerDistributer;

#[Signature('distributer:run')]
#[Description('assigns the customers that have no users or salesmen to a non-busy user')]
class AssignCustomers extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(CustomerDistributer $distributer)
    {
        $this->info('Starting background customer distributing...');
        $distributer->rebalanceOrphanCustomers();

        $this->info('distributing finished successfully!');
    }
}