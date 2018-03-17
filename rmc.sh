composer install
sudo chmod -R 777 var/{logs,cache,sessions}
./bin/console c:c
./bin/console a:i
./bin/console a:d
./bin/console d:s:u --force
sudo chmod -R 777 var/{logs,cache,sessions}
./bin/console c:c
sudo chmod -R 777 var/{logs,cache,sessions}
