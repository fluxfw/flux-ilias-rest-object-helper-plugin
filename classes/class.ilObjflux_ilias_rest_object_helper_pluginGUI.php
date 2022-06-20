<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Service\Object\DefaultInternalObjectType;

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

    public static function _goto(/*int*/ $a_target) : void
    {
        global $DIC;

        $DIC->ctrl()->redirectToURL(ilflux_ilias_rest_object_helper_pluginPlugin::getIliasApi()
            ->getFluxIliasRestObjectWebProxyLink(
                $a_target[0],
                ilObject::_lookupObjId($a_target[0])
            ));
    }


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
        return DefaultInternalObjectType::XFRO->value;
    }


    public function performCommand(/*string*/ $cmd) : void
    {
        $this->ctrl->redirectToURL($this->plugin::getIliasApi()
            ->getFluxIliasRestObjectWebProxyLink(
                $this->ref_id,
                $this->obj_id
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
