#!/bin/bash

CURR_USER_ID="${UID}"
CURR_GROUP_ID="${GID}"

if [ -z "$CURR_USER_ID" ]; then
	CURR_USER_ID=`id -u`
fi

if [ -z "$CURR_GROUP_ID" ]; then
	CURR_GROUP_ID=`id -g`
fi

export CURR_USER_ID
export CURR_GROUP_ID



export USER_AND_GROUP="$CURR_USER_ID:$CURR_GROUP_ID"

docker-compose up $@




