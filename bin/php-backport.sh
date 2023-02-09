#!/usr/bin/env sh

set -e

bin="`dirname "$0"`"
root="$bin/.."
libs="$root/.."

"$libs/flux-php-backport/bin/php-backport.php" "$libs"

sed -i "s/DefaultInternalObjectType::XFRO/DefaultInternalObjectType::XFRO()/" "$root/classes/"*.php
sed -i "s/DefaultInternalPermission::READ/DefaultInternalPermission::READ()/" "$root/classes/"*.php
sed -i "s/DefaultInternalPermission::WRITE/DefaultInternalPermission::WRITE()/" "$root/classes/"*.php
sed -i "s/DefaultInternalPermission::EDIT_PERMISSION/DefaultInternalPermission::EDIT_PERMISSION()/" "$root/classes/"*.php
