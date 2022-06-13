<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Adapter\Api\IliasApi;
use FluxIliasRestApi\Libs\FluxIliasApi\Channel\Object\LegacyDefaultInternalObjectType;
use FluxIliasRestApi\Libs\FluxIliasApi\Channel\ObjectConfig\LegacyObjectConfigKey;

class ilflux_ilias_rest_object_helper_pluginPlugin extends ilRepositoryObjectPlugin
{

    private static ?IliasApi $ilias_api = null;


    public function __construct(...$args)
    {
        parent::__construct(...$args);

        static::initPlugin();
    }


    public static function _getIcon(/*string*/ $a_type, /*string*/ $a_size, /*?int*/ $a_obj_id = null) : string
    {
        if ($a_obj_id !== null) {
            static::initPlugin();

            $web_proxy_map_key = static::$ilias_api->getObjectConfig(
                $a_obj_id,
                LegacyObjectConfigKey::WEB_PROXY_MAP_KEY()
            );
            if ($web_proxy_map_key !== null) {
                $web_proxy_map = static::$ilias_api->getFluxIliasRestObjectWebProxyMapByKey(
                    $web_proxy_map_key
                );
                if ($web_proxy_map !== null && $web_proxy_map->icon_url !== null) {
                    return $web_proxy_map->icon_url;
                }
            }
        }

        return ilUtil::getImagePath("icon_webr.svg");
    }


    private static function initPlugin() : void
    {
        if (static::$ilias_api === null) {
            require_once __DIR__ . "/../autoload.php";

            static::$ilias_api = IliasApi::new();
        }
    }


    public function allowCopy() : bool
    {
        return false;
    }


    public function deleteObjectConfig(int $id) : void
    {
        static::$ilias_api->deleteObjectConfig(
            $id
        );
    }


    public function getFluxIliasRestObjectConfigLink(int $ref_id) : string
    {
        return static::$ilias_api->getFluxIliasRestObjectConfigLink(
            $ref_id
        );
    }


    public function getFluxIliasRestObjectWebProxyLink(int $ref_id) : string
    {
        return static::$ilias_api->getFluxIliasRestObjectWebProxyLink(
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
}
