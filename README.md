# flux-ilias-rest-object-helper-plugin

ILIAS Rest Object Helper Plugin

## Installation

Hint: Use `latest` as `%tag%` (or omit it) for get the latest build

### flux-ilias-rest-object-helper-plugin

```dockerfile
COPY --from=docker-registry.fluxpublisher.ch/flux-ilias-api/rest-object-helper-plugin:%tag% /flux-ilias-rest-object-helper-plugin %web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin
```

or

```dockerfile
RUN (mkdir -p %web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin && cd %web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin && wget -O - https://docker-registry.fluxpublisher.ch/api/get-build-archive/flux-ilias-api/rest-object-helper-plugin.tar.gz?tag=%tag% | tar -xz --strip-components=1)
```

or

Download https://docker-registry.fluxpublisher.ch/api/get-build-archive/flux-ilias-api/rest-object-helper-plugin.tar.gz?tag=%tag% and extract it to `%web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin`

Hint: If you use `wget` without pipe use `--content-disposition` to get the correct file name

### Helper Plugin

You need to install [flux-ilias-rest-helper-plugin](https://github.com/flux-caps/flux-ilias-rest-helper-plugin) too
