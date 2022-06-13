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


    public function getFluxIliasRestObjectConfigLink(int $ref_id) : string
    {
        return $this->ilias_api->getFluxIliasRestObjectConfigLink(
            $ref_id
        );
    }


    public function getFluxIliasRestObjectWebProxyLink(int $ref_id) : string
    {
        return $this->ilias_api->getFluxIliasRestObjectWebProxyLink(
            $ref_id
        );
    }


    public function getPluginName() : string
    {
        return "flux_ilias_rest_object_helper_plugin";
    }


    public function txt(string $a_var) : string
    {
        $type = LegacyDefaultInternalObjectType::XFRH()->value;

        $txts = (object) [
            "obj_" . $type                        => "flux-ilias-rest-object",
            "obj_" . $type . "_duplicate"         => "Copy flux-ilias-rest-object",
            "objs_" . $type                       => "flux-ilias-rest-objects",
            "objs_" . $type . "_duplicate"        => "Copy flux-ilias-rest-objects",
            "rbac_create_" . $type                => "Create flux-ilias-rest-object",
            "rep_robj_" . $type . "_obj_" . $type => "flux-ilias-rest-object",
            $type . "_add"                        => "Add",
            $type . "_delete"                     => "Delete",
            $type . "_edit_permission"            => "Edit permission",
            $type . "_new"                        => "Create flux-ilias-rest-object",
            $type . "_read"                       => "Read",
            $type . "_visible"                    => "visible",
            $type . "_write"                      => "Edit"
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
