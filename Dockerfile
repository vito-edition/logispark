FROM wordpress:latest

RUN apt-get update \
    && apt-get install -y --no-install-recommends less default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sO https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

COPY setup.sh /usr/local/bin/setup.sh
RUN chmod +x /usr/local/bin/setup.sh

CMD ["/usr/local/bin/setup.sh"]
