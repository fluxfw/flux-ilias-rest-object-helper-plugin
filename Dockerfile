ARG FLUX_PHP_BACKPORT_IMAGE=docker-registry.fluxpublisher.ch/flux-php-backport

FROM $FLUX_PHP_BACKPORT_IMAGE AS build

COPY . /flux-ilias-rest-object-helper-plugin

RUN php-backport /flux-ilias-rest-object-helper-plugin FluxIliasRestApi\\Libs\\FluxLegacyEnum

FROM scratch

LABEL org.opencontainers.image.source="https://github.com/flux-caps/flux-ilias-rest-object-helper-plugin"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"
LABEL flux-docker-registry-rest-api-build-path="/flux-ilias-rest-object-helper-plugin"

COPY --from=build /flux-ilias-rest-object-helper-plugin /flux-ilias-rest-object-helper-plugin

ARG COMMIT_SHA
LABEL org.opencontainers.image.revision="$COMMIT_SHA"
