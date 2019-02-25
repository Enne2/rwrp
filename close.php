<?php
 exec('sudo supervisorctl stop rremote.liq');
  exec('sudo supervisorctl stop radio.liq');
  exec('sudo killall chromium');
    exec('sudo killall chromium-browse');