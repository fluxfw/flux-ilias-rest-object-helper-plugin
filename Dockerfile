ARG FLUX_PHP_BACKPORT_IMAGE=docker-registry.fluxpublisher.ch/flux-php-backport

FROM $FLUX_PHP_BACKPORT_IMAGE:v2022-06-23-1 AS build

COPY . /build/flux-ilias-rest-object-helper-plugin

RUN php-backport /build/flux-ilias-rest-object-helper-plugin FluxIliasRestApi\\Libs\\FluxLegacyEnum
RUN sed -i "s/DefaultInternalObjectType::XFRO/DefaultInternalObjectType::XFRO()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::READ/DefaultInternalPermission::READ()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::WRITE/DefaultInternalPermission::WRITE()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php
RUN sed -i "s/DefaultInternalPermission::EDIT_PERMISSION/DefaultInternalPermission::EDIT_PERMISSION()/" /build/flux-ilias-rest-object-helper-plugin/classes/*.php

RUN (cd /build && tar -czf flux-ilias-rest-object-helper-plugin.tar.gz flux-ilias-rest-object-helper-plugin)

FROM scratch

LABEL org.opencontainers.image.source="https://github.com/flux-caps/flux-ilias-rest-object-helper-plugin"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"
LABEL flux-docker-registry-rest-api-build-path="/flux-ilias-rest-object-helper-plugin.tar.gz"

COPY --from=build /build /

ARG COMMIT_SHA
LABEL org.opencontainers.image.revision="$COMMIT_SHA"
