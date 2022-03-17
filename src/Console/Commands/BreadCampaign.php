<?php

namespace Joy\VoyagerBreadCampaign\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class BreadCampaign extends Command
{
    protected $name = 'joy-bread-campaign';

    protected $description = 'Joy VoyagerBreadCampaign';

    public function handle()
    {
        $this->output->title('Starting bread-campaign');

        // Your magic here

        $this->output->success('BreadCampaign successful');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['arguement1', InputArgument::REQUIRED, 'The argument1 description'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            [
                'option1',
                'o',
                InputOption::VALUE_OPTIONAL,
                'The option1 description',
                config('joy-voyager-bread-campaign.option1')
            ],
        ];
    }
}
