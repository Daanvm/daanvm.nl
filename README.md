# Welcome at Daan Virtual Machines

Hi there! Just to be clear: Daan Virtual Machines is a joke, the domain name [daanvm.nl](http://daanvm.nl) was chosen
because of my name (Daan van Marsbergen). It's an empty site, I use the domain name primarily for email.

## How to deploy initially?

1. Create a Kubernetes namespace:
   ```shell
   kubectl create namespace daanvm-nl
   
   # Select this namespace as default.
   kubens daanvm-nl
   ```
2. Create the Kubernetes deployment and service.
   ```shell
   kubectl apply -f config/kubernetes/deployment.yaml
   kubectl apply -f config/kubernetes/service.yaml
   ```

## How to update to a newer version?

1. Create a new tag:
   ```shell
   # Update the version in the command below.
   git tag v<version>
   git push --tags
   ```
2. Wait for [Docker Hub](https://hub.docker.com/r/daanvm/daanvm.nl/tags?page=1&ordering=last_updated) to build and publish the new image.
3. Update the image of the Kubernetes Deployment:
   ```shell
   # Replace the version in the command below.
   kubectl set image deployment/daanvm-nl daanvm-nl-nginx=daanvm/daanvm.nl:<version> --record
   
   # Watch the deployment progress.
   kubectl rollout status deployment/daanvm-nl
   ```

## How to rollback to a previous version?

1. Show the previous versions:
   ```shell
   kubectl rollout history deployment.v1.apps/daanvm-nl
   ```

2. Roll back to the previous release:
   ```shell
   kubectl rollout undo deployment.v1.apps/daanvm-nl
   
   # Or optionally specify which version you want to rollback to.
   kubectl rollout undo deployment.v1.apps/daanvm-nl --to-revision=2
   
   # Watch the rollback progress.
   kubectl rollout status deployment/daanvm-nl
   ```

## Other useful commands

* Stream logs from all pods:
  ```shell
  kubectl logs --prefix -f --selector app=daanvm-nl
  ```
