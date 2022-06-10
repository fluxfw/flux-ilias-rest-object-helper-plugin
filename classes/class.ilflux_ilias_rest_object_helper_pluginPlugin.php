<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Adapter\Api\IliasApi;
use FluxIliasRestApi\Libs\FluxIliasApi\Channel\Object\LegacyDefaultInternalObjectType;

class ilflux_ilias_rest_object_helper_pluginPlugin extends ilRepositoryObjectPlugin
{

    private IliasApi $ilias_api;


    public function __construct(...$args)
    {
        parent::__construct(...$args);

        $this->initPlugin();
    }


    public static function _getIcon(/*string*/ $a_type, /*string*/ $a_size) : string
    {
        return ilUtil::getImagePath("icon_webr.svg");
    }


    public function allowCopy() : bool
    {
        return false;
    }


    public function deleteObjectConfig(int $id) : void
    {
        $this->ilias_api->deleteObjectConfig(
            $id
        );
    }


    public function getObjectConfigLink(int $ref_id) : string
    {
        return $this->ilias_api->getObjectConfigLink(
            $ref_id
        );
    }


    public function getObjectWebProxyLink(int $ref_id) : string
    {
        return $this->ilias_api->getObjectWebProxyLink(
            $ref_id
        );
    }


    public function getPluginName() : string
    {
        return "flux_ilias_rest_object_helper_plugin";
    }


    public function txt(string $a_var) : string
    {
        $id = LegacyDefaultInternalObjectType::XFRH()->value;

        $txts = (object) [
            "obj_" . $id                      => "flux ilias rest object",
            "obj_" . $id . "_duplicate"       => "Copy flux ilias rest object",
            "objs_" . $id                     => "flux ilias rest objects",
            "objs_" . $id . "_duplicate"      => "Copy flux ilias rest objects",
            "rbac_create_" . $id              => "Create flux ilias rest object",
            "rep_robj_" . $id . "_obj_" . $id => "flux ilias rest object",
            $id . "_add"                      => "Add",
            $id . "_delete"                   => "Delete",
            $id . "_edit_permission"          => "Edit permission",
            $id . "_new"                      => "Create flux ilias rest object",
            $id . "_read"                     => "Read",
            $id . "_visible"                  => "visible",
            $id . "_write"                    => "Edit"
        ];

        $txt = $txts->{$a_var} ?? null;
        if ($txt !== null) {
            return $txt;
        } else {
            return parent::txt($a_var);
        }
    }


    protected function uninstallCustom() : void
    {

    }


    private function initPlugin() : void
    {
        require_once __DIR__ . "/../autoload.php";

        $this->ilias_api = IliasApi::new();
    }
}
