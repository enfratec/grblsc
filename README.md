GRBLSC (GRBL Manager for Embedded Computer)
======

Attenzione non installare su server online!!! alto rischio per la sicurezza!
======
   
<p>GRBL for Small Computer</p>

<p>Testato e funzionante su TL703 e simili con SO OpenWrt</p>
<p>Funziona anche con RaspberryPi e simili con SO Linux</p>

<p>Installare:</p>

<p>php5</p>

<p>Guida:<br />
Presa da wiki.openwrt.org</p>

<p>Installare PHP5:<br />
&nbsp; &nbsp;opkg update<br />
&nbsp; &nbsp;opkg install php5 php5-cgi</p>

<p>Installare UHTTPD:<br />
&nbsp; &nbsp;opkg update<br />
&nbsp; &nbsp;opkg install uhttpd</p>

<p>Aggiungere una nuova istanza sulla porta 81:<br />
&nbsp; &nbsp;uci set uhttpd.llmp=uhttpd<br />
&nbsp; &nbsp;uci set uhttpd.llmp.listen_http=81<br />
&nbsp; &nbsp;uci set uhttpd.llmp.home=/srv/www<br />
&nbsp; &nbsp;uci commit uhttpd</p>

<p>Creare la cartella in cui inserire lo script:<br />
&nbsp; &nbsp;mkdir -p $(uci get uhttpd.llmp.home)</p>

<p>Avviare il server UHTTPD:<br />
&nbsp; &nbsp;/etc/init.d/uhttpd restart<br />
&nbsp; &nbsp;/etc/init.d/uhttpd start<br />
&nbsp; &nbsp;/etc/init.d/uhttpd enable</p>
