FROM scratch

LABEL org.opencontainers.image.source="https://github.com/flux-caps/flux-ilias-rest-object-helper-plugin"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"
LABEL flux-docker-registry-rest-api-build-path="/flux-ilias-rest-object-helper-plugin"

COPY . /flux-ilias-rest-object-helper-plugin

ARG COMMIT_SHA
LABEL org.opencontainers.image.revision="$COMMIT_SHA"
