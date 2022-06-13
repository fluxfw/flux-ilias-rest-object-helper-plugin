<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Channel\Object\LegacyDefaultInternalObjectType;

/**
 * @property ilflux_ilias_rest_object_helper_pluginPlugin $plugin
 */
class ilObjflux_ilias_rest_object_helper_plugin extends ilObjectPlugin
{

    public function supportsOfflineHandling() : bool
    {
        return false;
    }


    protected function doDelete() : void
    {
        $this->plugin->deleteObjectConfig(
            $this->id
        );
    }


    protected function initType() : void
    {
        $this->setType(LegacyDefaultInternalObjectType::XFRH()->value);
    }
}
