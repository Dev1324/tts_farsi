import requests
import pygame
from io import BytesIO

def TTS(text):
    data = {
        'text' : text
    }

    get = requests.post('https://ai.amirabbasmousavi.ir/tts.php', data=data)
    if(get):
        return get.text
    else:
        return get

def sey(url):
    resp_audio = requests.get(url)
    audio_data = BytesIO(resp_audio.content)

    pygame.init()
    pygame.mixer.init()
    pygame.mixer.music.load(audio_data)
    pygame.mixer.music.play()

    while pygame.mixer.music.get_busy():
        pygame.time.Clock().tick(10)

    pygame.quit()

text = input('plz write text :')#.replace(" ", "+")

tts = TTS(text)
print(tts)
sey(tts)
