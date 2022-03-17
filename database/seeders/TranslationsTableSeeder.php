<?php

namespace Joy\VoyagerBreadCampaign\Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadCampaign\Models\Campaign;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->campaignsTranslations();
        $this->menusTranslations();
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function campaignsTranslations()
    {
        // Adding translations for 'campaigns'
        //
        $cat = Campaign::where('name', 'campaign-1')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['campaigns', 'name'], $cat->id), 'campaign-1');
            $this->trans('pt', $this->arr(['campaigns', 'description'], $cat->id), 'Campaign 1');
        }
        $cat = Campaign::where('name', 'campaign-2')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['campaigns', 'name'], $cat->id), 'campaign-2');
            $this->trans('pt', $this->arr(['campaigns', 'description'], $cat->id), 'Campaign 2');
        }
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        
        $dtp = DataType::where($_fld, __('joy-voyager-bread-campaign::seeders.data_types.category.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Campaign');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, __('joy-voyager-bread-campaign::seeders.data_types.category.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Campaigns');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->findMenuItem(__('joy-voyager-bread-campaign::seeders.menu_items.campaigns'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Campaigns');
        }
    }

    private function findMenuItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
