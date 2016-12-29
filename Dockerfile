FROM hiracchi/apache2-php
MAINTAINER Toshiyuki HIRANO <hiracchi@gmail.com>

# packages install 
RUN apt-get update && \
    apt-get install -y \
        git curl unzip gettext php-curl php-sqlite3 \
	gettext \
        libhttp-daemon-perl liblwp-protocol-https-perl libyaml-tiny-perl \
        supervisor && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# default parameters
ARG REP2_UID=10001
ARG REP2_DIR=/opt/p2-php


# setup user
RUN useradd -u ${REP2_UID} -d /home/rep2 -m -s /bin/bash rep2
RUN mkdir -p ${REP2_DIR} && chown -R rep2 ${REP2_DIR}


# setup rep2
USER rep2
WORKDIR ${REP2_DIR}
RUN git clone git://github.com/2ch774/p2-php.git ${REP2_DIR}
RUN curl -O http://getcomposer.org/composer.phar
RUN php -d detect_unicode=0 composer.phar install
RUN chmod 0777 data/* rep2/ic


# setup 2chproxy
USER root
RUN git clone https://github.com/yama-natuki/2chproxy.pl.git /opt/2chproxy
COPY rep2.yml /opt/2chproxy/rep2.yml


# supervisor
CMD mv /etc/supervisor/supervisord.conf /etc/supervisor/supervisord.conf.orig
COPY supervisord.conf /etc/supervisor/supervisord.conf
COPY apache2.conf /etc/supervisor/conf.d/
COPY 2chproxy.conf /etc/supervisor/conf.d/

#RUN sed -i.bak \
#  -e 's|DEDICATED_BROWSER => "JD"|DEDICATED_BROWSER => "rep2"|' \
#  -e 's|DAT_DIRECTORY => "$ENV{HOME}/.jd/"|DAT_DIRECTORY => "/opt/2chproxy/data/"|' \
#  /opt/2chproxy/2chproxy.pl
# RUN perl /opt/2chproxy/2chproxy.pl --config /opt/2chproxy/rep2.yml --daemon 


WORKDIR /root
RUN chown -R rep2:www-data ${REP2_DIR}
RUN ln -s ${REP2_DIR}/rep2 /var/www/html/rep2


EXPOSE 80 443
ENTRYPOINT ["/docker-entrypoint.sh"]
CMD ["/usr/bin/supervisord"]


