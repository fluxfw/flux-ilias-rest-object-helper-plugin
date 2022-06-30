<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Service\Object\DefaultInternalObjectType;
use FluxIliasRestApi\Libs\FluxIliasApi\Service\Permission\DefaultInternalPermission;

/**
 * @property ilflux_ilias_rest_object_helper_pluginPlugin $plugin
 */
class ilObjflux_ilias_rest_object_helper_pluginListGUI extends ilObjectPluginListGUI
{

    public function getCommandLink(/*string*/ $a_cmd) : string
    {
        switch ($a_cmd) {
            case "config":
                return $this->plugin::getIliasApi()
                    ->getFluxIliasRestObjectConfigLink(
                        $this->ref_id
                    );

            case "perm":
                return $this->ctrl->getLinkTargetByClass([ilObjPluginDispatchGUI::class, $this->getGuiClass(), ilPermissionGUI::class], $a_cmd);

            case "web_proxy":
                return $this->plugin::getIliasApi()
                    ->getFluxIliasRestObjectWebProxyLink(
                        $this->ref_id,
                        $this->obj_id
                    );

            default:
                return parent::getCommandLink($a_cmd);
        }
    }


    public function getGuiClass() : string
    {
        return ilObjflux_ilias_rest_object_helper_pluginGUI::class;
    }


    public function initCommands() : array
    {
        $this->commands_enabled = true;
        $this->comments_enabled = false;
        $this->comments_settings_enabled = false;
        $this->copy_enabled = false;
        $this->cut_enabled = false;
        $this->delete_enabled = true;
        $this->description_enabled = true;
        $this->expand_enabled = false;
        $this->info_screen_enabled = false;
        $this->link_enabled = false;
        $this->notes_enabled = false;
        $this->notice_properties_enabled = false;
        $this->payment_enabled = false;
        $this->preconditions_enabled = false;
        $this->properties_enabled = false;
        $this->rating_enabled = false;
        $this->rating_categories_enabled = false;
        $this->repository_transfer_enabled = false;
        $this->search_fragment_enabled = false;
        $this->static_link_enabled = false;
        $this->subscribe_enabled = false;
        $this->tags_enabled = false;
        $this->timings_enabled = false;

        return [
            [
                "permission" => DefaultInternalPermission::READ->value,
                "cmd"        => "web_proxy",
                "default"    => true
            ],
            [
                "permission" => DefaultInternalPermission::WRITE->value,
                "cmd"        => "config",
                "txt"        => "Config"
            ],
            [
                "permission" => DefaultInternalPermission::EDIT_PERMISSION->value,
                "cmd"        => "perm",
                "lang_var"   => "perm_settings"
            ]
        ];
    }


    public function initType() : void
    {
        $this->setType(DefaultInternalObjectType::XFRO->value);
    }
}
