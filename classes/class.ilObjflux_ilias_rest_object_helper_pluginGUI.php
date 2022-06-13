<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Channel\Object\LegacyDefaultInternalObjectType;

/**
 * @property ilflux_ilias_rest_object_helper_pluginPlugin $plugin
 *
 * @ilCtrl_isCalledBy ilObjflux_ilias_rest_object_helper_pluginGUI: ilAdministrationGUI
 * @ilCtrl_isCalledBy ilObjflux_ilias_rest_object_helper_pluginGUI: ilObjPluginDispatchGUI
 * @ilCtrl_isCalledBy ilObjflux_ilias_rest_object_helper_pluginGUI: ilRepositoryGUI
 * @ilCtrl_Calls      ilObjflux_ilias_rest_object_helper_pluginGUI: ilCommonActionDispatcherGUI
 * @ilCtrl_Calls      ilObjflux_ilias_rest_object_helper_pluginGUI: ilInfoScreenGUI
 * @ilCtrl_Calls      ilObjflux_ilias_rest_object_helper_pluginGUI: ilObjectCopyGUI
 * @ilCtrl_Calls      ilObjflux_ilias_rest_object_helper_pluginGUI: ilPermissionGUI
 */
class ilObjflux_ilias_rest_object_helper_pluginGUI extends ilObjectPluginGUI
{

    public function getAfterCreationCmd() : string
    {
        return "";
    }


    public function getStandardCmd() : string
    {
        return "";
    }


    public function getType() : string
    {
        return LegacyDefaultInternalObjectType::XFRH()->value;
    }


    public function performCommand(/*string*/ $cmd) : void
    {
        $this->ctrl->redirectToURL($this->plugin->getFluxIliasRestObjectWebProxyLink(
            $this->ref_id
        ));
    }


    protected function supportsCloning() : bool
    {
        return false;
    }


    protected function supportsExport() : bool
    {
        return false;
    }
}
