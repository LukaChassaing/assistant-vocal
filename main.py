import speech_recognition as sr
import os

def callback(recognizer, audio):
    try:
        response = r.recognize_google(audio, language='fr-FR')  
        mon_fichier = open("speech.txt", "a")
        mon_fichier.write(response.encode('utf-8')+";")
        mon_fichier.close()
        print response
        os.system('php main.php')
    except AssertionError as error:
        print(error)
    except Exception as e:
        print(e)
r = sr.Recognizer()
mic = sr.Microphone()
with mic as source:
    r.adjust_for_ambient_noise(source)
r.energy_threshold=4000
r.operation_timeout = 3
r.pause_threshold = 0.5
r.dynamic_energy_threshold = True
r.listen_in_background(sr.Microphone(), callback)

import time
while True: time.sleep(0.1)  