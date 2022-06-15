<?php

use FluxIliasRestApi\Libs\FluxIliasApi\Adapter\Api\IliasApi;
use FluxIliasRestApi\Libs\FluxIliasApi\Service\Object\LegacyDefaultInternalObjectType;

class ilflux_ilias_rest_object_helper_pluginPlugin extends ilRepositoryObjectPlugin
{

    public static function _getIcon(/*string*/ $a_type, /*?string*/ $a_size = null, /*?int*/ $a_obj_id = null) : string
    {
        return static::getIliasApi()
            ->getFluxIliasRestObjectWebIconUrl(
                $a_obj_id ?: null
            );
    }


    public static function getIliasApi() : IliasApi
    {
        require_once __DIR__ . "/../autoload.php";

        return ilflux_ilias_rest_helper_pluginPlugin::getIliasApi();
    }


    public function allowCopy() : bool
    {
        return false;
    }


    public function getPluginName() : string
    {
        return "flux_ilias_rest_object_helper_plugin";
    }


    public function txt(string $a_var) : string
    {
        $type = LegacyDefaultInternalObjectType::XFRO()->value;
        $type_title = static::getIliasApi()
            ->getFluxIliasRestObjectWebTypeTitle();
        $multiple_type_title = static::getIliasApi()
            ->getFluxIliasRestObjectWebMultipleTypeTitle();

        $txts = (object) [
            "obj_" . $type                        => $type_title,
            "obj_" . $type . "_duplicate"         => "Copy " . $type_title,
            "objs_" . $type                       => $multiple_type_title,
            "objs_" . $type . "_duplicate"        => "Copy " . $multiple_type_title,
            "rbac_create_" . $type                => "Create " . $type_title,
            "rep_robj_" . $type . "_obj_" . $type => $type_title,
            $type . "_add"                        => "Add",
            $type . "_delete"                     => "Delete",
            $type . "_edit_permission"            => "Edit permission",
            $type . "_new"                        => "Create " . $type_title,
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
