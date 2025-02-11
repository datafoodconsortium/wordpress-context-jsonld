# WordPress Context Jsonld

This is a WordPress plugin that adds an alternate link HTTP header to provide a JSON-LD context at the website root url.

The Apache `headers` module must be enabled.

## Deploy to a WordPress instance

WARNING: be sure to include the .htaccess file.

To deploy the plugin just copy-paste the folder `wordpress-context-jsonld` into the `wp-content/wp-plugins` folder of your WordPress site. Then go to the "plugins" menu in your administration panel and enable the plugin.

You can also create a Zip of the `wordpress-context-jsonld` folder and upload it with the "Add plugin" button available in the "plugins" menu of your WordPress administration panel.

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