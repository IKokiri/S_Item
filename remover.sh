docker stop $(docker container ps -q -a)
docker rm $(docker container ps -q -a)
docker rmi $(docker images -q -a)
