# flux-ilias-rest-object-helper-plugin

ILIAS Rest Object Helper Plugin

## Installation

### flux-ilias-rest-object-helper-plugin

```dockerfile
RUN (mkdir -p %web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin && cd %web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin && wget -O - https://github.com/flux-eco/flux-ilias-rest-object-helper-plugin/releases/download/%tag%/flux-ilias-rest-object-helper-plugin-%tag%-build.tar.gz | tar -xz --strip-components=1)
```

or

Download https://github.com/flux-eco/flux-ilias-rest-object-helper-plugin/releases/download/%tag%/flux-ilias-rest-object-helper-plugin-%tag%-build.tar.gz and extract it to `%web_root%/Customizing/global/plugins/Services/Repository/RepositoryObject/flux_ilias_rest_object_helper_plugin`

### Helper Plugin

You need to install [flux-ilias-rest-helper-plugin](https://github.com/flux-eco/flux-ilias-rest-helper-plugin) too
