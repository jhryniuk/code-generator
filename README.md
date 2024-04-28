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

**Running project**

```shell
# Builds required docker images
make build
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
# Shutting down the virtual environment
make down
```
