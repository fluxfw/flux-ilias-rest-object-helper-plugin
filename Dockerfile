FROM php:8.1-cli-alpine AS build

RUN (mkdir -p /flux-php-backport && cd /flux-php-backport && wget -O - https://github.com/fluxfw/flux-php-backport/releases/download/v2022-07-12-1/flux-php-backport-v2022-07-12-1-build.tar.gz | tar -xz --strip-components=1)

COPY . /build/flux-ilias-rest-object-helper-plugin

RUN /flux-php-backport/bin/php-backport.php /build/flux-ilias-rest-object-helper-plugin FluxIliasRestApi\\Libs\\FluxLegacyEnum
RUN sed -i "s/DefaultInternalObjectType::XFRO/DefaultInternalObjectType::XFRO()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::READ/DefaultInternalPermission::READ()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::WRITE/DefaultInternalPermission::WRITE()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::EDIT_PERMISSION/DefaultInternalPermission::EDIT_PERMISSION()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php

FROM scratch

COPY --from=build /build /
