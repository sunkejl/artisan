https://stackoverflow.com/questions/41984399/denied-requested-access-to-the-resource-is-denied-docker


So, this means you have to tag your image before pushing:

```
docker tag firstimage YOUR_DOCKERHUB_NAME/firstimage
```
and then you should be able to push it.
```
docker push YOUR_DOCKERHUB_NAME/firstimage
```
Update: see also the answer from provided by Dean Wu. Before pushing, remember to log in from the command line to your docker hub account

```
docker login
```



https://hub.docker.com
```
docker tag local-image:tagname new-repo:tagname

docker push new-repo:tagname

```
