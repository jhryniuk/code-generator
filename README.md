Code Generator
===
Application is created to represent distributed architecture.

**Framework** Application is built with Symfony Framework 6.4.

**Queue system** RabbiMQ has been chosen to work as a queue system.

**Virtualization** Docker is the virtualization tool.

**Before run**

Before you start this project on your local machine make sure that:
* you have `docker` with `docker compose` extension
* you have `Make`
* you have turned off below processes:
  * apache2
  * nginx
  * mysql

**Access to services:**
* rest api `http://localhost/api`
* rabbitmq `http://localhost:15672`
* mariadb by db client on port 3306
* frontend `http://localhost:8080`

**Running project**

```shell
# Builds required docker images
make build
```

```shell
# Builds db
make build-db
```

```shell
# Starts the project and install required dependencies
make up
```

```shell
# Starts the worker that generate the codes and consumes messages from queue
make worker
```

```shell
# Stop the worker
make worker-down
```

```shell
# Shutting down the virtual environment
make down
```


**Order commands to start up the project:**
```shell
make build
make up
make build-db
make worker
```