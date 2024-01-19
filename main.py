import pyttsx3
import pyaudio
import speech_recognition as sr
import datetime
import wikipedia
import webbrowser
import os
import smtplib
import pyautogui

engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice',voices[1].id)

def speak(text):
    engine.say(text)
    engine.runAndWait()

def wish():
    hour = datetime.datetime.now().hour
    if hour>=0 and hour<12:
        speak("Good Morning")
    elif hour>=12 and hour<18:
        speak("Good Afternoon")
    else:
        speak("Good Evening")

def takecommand():
    r=sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        r.pause_threshold=0.8
        r.energy_threshold=600
        audio=r.listen(source)
    try:
        query = r.recognize_google(audio,language='en-in')
        print("you said:")
        print(query)
    except Exception as e:
        print("say that again please..")
        return "none"
    return query

webbrowser.register('chrome',None,webbrowser.BackgroundBrowser("C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe"))
webbrowser.register('edge',None,webbrowser.BackgroundBrowser("C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe"))
      


#if __name__=="__main__":
#speak("welcome Boss")
wish()
webbrowser1=webbrowser.get('chrome')
webbrowser2=webbrowser.get('edge')

while True:
    query = takecommand()
    query=query.lower()
    if 'wikipedia' in query:
        speak("searching..")
        query = query.replace("wikipedia","")
        res = wikipedia.summary(query,sentences=2)
        print(res)
        speak(res) 

    elif 'search' in query:
         speak("searching..")
         query = query.replace("search","")
         query = query.replace(" ","_")
         print(query)
         res = webbrowser2.open(query)
         #res = webbrowser1.open(https://www.google.com/search?q=what+is+global+warming&rlz=1C1GCFX_enIN1062IN1062&oq=what+is+globl+warming&gs_lcrp=EgZjaHJvbWUqDAgBEAAYChixAxiABDIGCAAQRRg5MgwIARAAGAoYsQMYgAQyCQgCEAAYChiABDIJCAMQABgKGIAEMgkIBBAAGAoYgAQyCQgFEAAYChiABDIJCAYQABgKGIAEMgkIBxAAGAoYgAQyCQgIEAAYChiABDIJCAkQABgKGIAE0gEIODg5OWoxajeoAgCwAgA&sourceid=chrome&ie=UTF-8)

         

    elif 'open youtube' in query:
        webbrowser1.open("youtube.com")

    # elif 'close youtube' in query:
    #     os.system("TASKKILL /im YouTube /f") 

    elif 'open gmail' in query:
        webbrowser1.open("gmail.com")  

    elif 'open whatsapp' in query:
        webbrowser2.open("https://web.whatsapp.com/")

    # elif 'close whatsapp' in query:
    #     os.system("TASKKILL /im WhatsApp /f")

    elif 'open project' in query:
        webbrowser2.open("http://127.0.0.1//life saviour//home.php")
    #     query= takecommand().lower()
    #     if 'admin' in query:
    #         webbrowser2.open("http://127.0.0.1//life saviour//admin_login.php")
    #     elif 'donor' in query:
    #         webbrowser2.open("http://127.0.0.1//life saviour//donor.php")
    
    elif 'open notepad' in query: 
        path_notepad="C:\\Windows\\system32\\notepad.exe"
        os.startfile(path_notepad)

    elif 'close notepad' in query: 
        path_notepad="C:\\Windows\\system32\\notepad.exe"
        os.system("TASKKILL /im notepad.exe /f")
           
    elif 'open google' in query: 
        path_google="C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe"
        os.startfile(path_google)

    elif 'screenshot' in query:
        time=datetime.datetime.now().strftime("%d/%m/%Y%H:%M:%S")
        print(time)
        ss=pyautogui.screenshot()
        ss.save("C:\\Users\\admin\\Pictures\\Screenshots\\ss.jpg")
        speak("Screenshot taken successfully")

    elif 'quite' in query:
        break

    elif 'close' in query:
        break


#takecommand()
