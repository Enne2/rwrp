# rwrp
Web gui based reliable web radio player for Raspberri Pi 3

A php generated web gui that controls, via supervisor daemon, a couple of liquidsoap scripts.
Using ffmpeg, it supports every streaming format and protocol.
The liquidsoap scripts are coded to switch from remotem stream to a local playlist if the first is down, not accessible or in silence and go back when ready. FFmpeg is restarted until it works correctly.
You must have got installed
- libav-tools
- supervisor
- liquidsoap
- php-cli
