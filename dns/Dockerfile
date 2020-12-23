FROM ubuntu:bionic

RUN apt-get update \
  && apt-get install -y \
  bind9 \
  bind9utils \
  bind9-doc \
  lsof \
  dnsutils

# Enable IPv4
RUN sed -i 's/OPTIONS=.*/OPTIONS="-4 -u bind"/' /etc/default/bind9

# Copy configuration files
COPY bind/named.conf.options /etc/bind/
COPY bind/named.conf.local /etc/bind/
COPY bind/zones/db.fake-umd.edu /etc/bind/zones/
COPY bind/zones/reverse.fake-umd.edu /etc/bind/zones/
COPY startscript /opt/startscript
# Run eternal loop
CMD ["/bin/bash", "-c", "/opt/startscript"]
