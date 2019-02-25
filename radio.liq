#!/usr/bin/liquidsoap
istring = interactive.string
url = istring("url", "tcp://localhost:4321/?listen=1")
# A simple (long) cross-fade
def crossfade(a,b)
  add(normalize=false,
      [ sequence([ blank(duration=1.),
                   fade.initial(duration=3.,b) ]),
        fade.final(duration=3.,a) ])
end

def input.ffmpeg(~id="input.ffmpeg",
         ~restart=true,~restart_on_error=true,
         ~buffer=0.2,~max=10.,s) =
  input.external(id=id,restart=restart,
      restart_on_error=restart_on_error,
      buffer=buffer,max=max,
      "avconv -i  #{s}  -f s16le -c:a pcm_s16le pipe:1 2>/dev/null")
end
print(url())
set("server.telnet",true)
#radio = input.ffmpeg(url())
radio = input.harbor("test-harbor",port=4321,password="shit")

output.alsa(device="hw:0,1,0",mksafe(radio))
#radio = input.alsa()
# Music
myplaylist = mksafe(playlist("/home/pi/Music/"))
radio = fallback(track_sensitive = false, transitions=[ crossfade, crossfade], [strip_blank(max_blank=5.,radio), myplaylist])
output.alsa(device="hw:1,0",radio)
