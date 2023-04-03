#!/usr/bin/env sh

set -e

patch_file="`dirname $0`/ilias8-core-apply-repository-plugins-patch.diff"
echo "Patch file: $patch_file"

ilias_root_dir="$(realpath "$(dirname $0)/../../../../../../../..")"
echo "ILIAS root directory: $ilias_root_dir"

set +e
if which git > /dev/null; then
    echo "Uses git"
    apply_patch="git -C $ilias_root_dir apply -v"
elif which patch > /dev/null; then
    echo "Uses patch"
    apply_patch="patch -p1 -d $ilias_root_dir -f -r /dev/null"
else
    echo "Neither git or patch found" >&2
    exit 1
fi
set -e

echo "Apply"
cat $patch_file | $apply_patch

echo "Done"
