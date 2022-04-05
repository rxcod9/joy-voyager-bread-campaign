<?php

namespace Joy\VoyagerBreadCampaign\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'campaigns');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'campaigns',
                'display_name_singular' => __('joy-voyager-bread-campaign::seeders.data_types.campaign.singular'),
                'display_name_plural'   => __('joy-voyager-bread-campaign::seeders.data_types.campaign.plural'),
                'icon'                  => 'voyager-bread voyager-bread-campaign voyager-news',
                'model_name'            => 'Joy\\VoyagerBreadCampaign\\Models\\Campaign',
                // 'policy_name'           => 'Joy\\VoyagerBreadCampaign\\Policies\\CampaignPolicy',
                // 'controller'            => 'Joy\\VoyagerBreadCampaign\\Http\\Controllers\\VoyagerBreadCampaignController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
