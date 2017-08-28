NAME=rep2
TAG=latest
REP2_DIR=/opt/p2-php
REP2_DATA_DIR=/opt/p2-php/data
LOCAL_PORT=8000
LOCAL_DATA_DIR=`pwd`/data

build:
	docker build ./ --build-arg REP2_DIR=$(REP2_DIR) -t $(NAME):$(TAG)

run:
	docker run -d -p $(LOCAL_PORT):80 -v $(LOCAL_DATA_DIR):$(REP2_DATA_DIR) $(NAME):$(TAG)

clean:
	rm -rf $(LOCAL_DATA_DIR)
