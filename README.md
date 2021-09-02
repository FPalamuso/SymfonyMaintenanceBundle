Installation
============

### 1) Download 

`composer require fpalamuso/symfony-maintenance-bundle`

### 2) Configure the Bundle 

Adds following configurations 

to ` config/packages/fpalamuso_maintenance.yaml` :

```yml  
fpalamuso_symfony_maintenance:
    is_active: true
    ips: ['127.0.0.1' '...'] # Whitelist of ip that can normally access the site during maintenance.
    routes: ['app_home'] # If specified, only those routes will be in maintenance mode.
``` 
