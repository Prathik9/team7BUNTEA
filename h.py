from gtts import gTTS
import random
import os
import speech_recognition as sr
import pyttsx3
from time import sleep


print(".....Listen to the pronounciation......")
with open("tt2.txt", "r") as file:
        allText = file.read()
        words = list(map(str, allText.split(",")))

    # The text that you want to convert to audio

        mytext=random.choice(words)
        print(mytext)
        file1 = open("tt3.txt", "w")
        file1.write(mytext)
        file1.close()


    # Language in which you want to convert
        language = 'pt'

    # Passing the text and language to the engine,
    # here we have marked slow=False. Which tells
    # the module that the converted audio should
    # have a high speed
        myobj = gTTS(text=mytext, lang=language, slow=False)


        # Saving the converted audio in a mp3 file named
        # welcome
        myobj.save("welcome.mp3")

        # Playing the converted file

        os.system("welcome.mp3")
sleep(3)
print("***please pronounce the word***")
r = sr.Recognizer()
def SpeakText(command):
    # Initialize the engine
    engine = pyttsx3.init()
    engine.say(command)
    engine.runAndWait()




while (1):

    # Exception handling to handle
    # exceptions at the runtime
    try:

        # use the microphone as source for input.
        with sr.Microphone() as source2:

            # wait for a second to let the recognizer
            # adjust the energy threshold based on
            # the surrounding noise level
            r.adjust_for_ambient_noise(source2, duration=0.5)

            # listens for the user's input
            audio2 = r.listen(source2)

            # Using google to recognize audio
            MyText = r.recognize_google(audio2,language="pt")
            MyText = MyText.lower()

            print("the pronounced word is", MyText)

            # SpeakText(MyText)
            file1 = open("text1.txt", "w")
            file1.write(MyText)
            file1.close()
            break


    except sr.RequestError as e:
        print("Could not request results; {0}".format(e))

    except sr.UnknownValueError:
        print("unknown error occurred")

print("accuracy of your prounonciation")
from urllib3.connectionpool import xrange
def longest_common_substring(s1, s2):
    m = [[0] * (1 + len(s2)) for i in xrange(1 + len(s1))]
    longest, x_longest = 0, 0
    for x in xrange(1, 1 + len(s1)):
        for y in xrange(1, 1 + len(s2)):
            if s1[x - 1] == s2[y - 1]:
                m[x][y] = m[x - 1][y - 1] + 1
                if m[x][y] > longest:
                    longest = m[x][y]
                    x_longest = x
            else:
                m[x][y] = 0
    return s1[x_longest - longest: x_longest]


def similarity(s1, s2):
    return 2 * len(longest_common_substring(s1, s2)) / (len(s1) + len(s2)) * 100
with open ("text1.txt","r") as file:
    for word in file:
        a=word
with open ("tt3.txt","r") as file:
    for word1 in file:
        b=word1

print(similarity(a,b),"% accurate")
