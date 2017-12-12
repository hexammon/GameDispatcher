#!/usr/bin/env bash

source .env

docker run -it --rm \
    --user $UID:$UID \
    --volume $(pwd):/srv/game-dispatcher \
    ${DEV_DOCKER_IMAGE} phpdbg -qrr vendor/bin/phpunit "$@"
