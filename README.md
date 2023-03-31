# WordPress Context Jsonld

This is a WordPress plugin that adds an alternate link HTTP header to provide a JSON-LD context at the website root url.

The Apache `headers` module must be enabled.

## Developement
```
docker compose up -d
```

Log in the container to enable the Apache `headers` module:
```
docker exec -it <container> /bin/bash
a2enmod headers
service apache2 restart
exit
```