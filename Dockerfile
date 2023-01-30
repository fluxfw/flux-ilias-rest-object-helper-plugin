FROM php:8.2-cli-alpine AS build

RUN (mkdir -p /flux-php-backport && cd /flux-php-backport && wget -O - https://github.com/fluxfw/flux-php-backport/archive/refs/tags/v2023-01-30-1.tar.gz | tar -xz --strip-components=1)

COPY . /build/flux-ilias-rest-object-helper-plugin

RUN /flux-php-backport/bin/php-backport.php /build/flux-ilias-rest-object-helper-plugin
RUN sed -i "s/DefaultInternalObjectType::XFRO/DefaultInternalObjectType::XFRO()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::READ/DefaultInternalPermission::READ()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::WRITE/DefaultInternalPermission::WRITE()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::EDIT_PERMISSION/DefaultInternalPermission::EDIT_PERMISSION()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php

FROM scratch

COPY --from=build /build /
