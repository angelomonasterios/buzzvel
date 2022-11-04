# Desafio buzzvel

### install and run projects

#### steep one
create a subnet for a projects
~~~~ 
docker network create  --driver=bridge  --subnet=172.28.0.0/16  --ip-range=172.28.5.0/24  --gateway=172.28.5.254 app_subnet

~~~~
#### steep two
execute this command to install dependencies
~~~~
docker exec -it buzzvel bash
~~~~



