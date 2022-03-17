<?php

namespace Joy\VoyagerBreadCampaign\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('campaign.key1');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-bread-campaign::seeders.settings.campaign.key1'),
                'value'        => 'Joy Voyager',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Campaign',
            ])->save();
        }

        $setting = $this->findSetting('campaign.image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('joy-voyager-bread-campaign::seeders.settings.campaign.image'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 2,
                'group'        => 'Campaign',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
