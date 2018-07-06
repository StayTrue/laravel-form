#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
echo "Laravel provisioning";
cd code
cp .env.example .env
php artisan key:generate