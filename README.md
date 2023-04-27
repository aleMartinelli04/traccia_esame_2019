## TRACCIA ESAME 2019

#### Analisi

È necessario progettare un sistema che fornisce informazioni per dei punti di interesse (POI).
I poi possono essere sia di tipo monumentale che di tipo artistico, tuttavia per lo scopo del sistema non è necessario
distinguere i due tipi. Ogni POI avrà due pagine web dedicate:

- Base: contiene un breve video di presentazione, un massimo di tre immagini con relativa descrizione
- Avanzato: contiene un video e delle immagini con la relativa descrizione, tutto disponibile in 7 lingue. Ogni
  immagine e video avranno quindi una serie di descrizioni in diverse lingue, identificate dal codice dell'immagine o
  del video e dalla lingua stessa.

Presso ogni InfoPoint si possono acquistare dei biglietti, i quali possono essere di tre tipi.
Ogni tipo permette la visualizzazione di pagine diverse:

- Base: solo pagine base
- Intermedio: 3 pagine avanzate e tutte le pagine base
- Pieno: tutte le pagine

Per ogni biglietto è necessario salvare un codice univoco, il quale sarà utlizzato come password per accedere alle
pagine web, e il giorno di emissione (ogni biglietto vale solo nel giorno in cui viene emesso).
Assieme al biglietto, viene consegnato anche un dispositivo mobile. Al fine di riceverlo, l'utente deve lasciare o un
documento d'identità o un numero valido di carta di credito. Per la riconsegna dei dispositivi, l'utente deve andare
nello stesso InfoPoint se ha lasciato il documento, mentre con la carta di credito si possono riconsegnare in tutti
gli InfoPoint disponibili.

Le entità rilevate sono:

- POI
- Pagina (Base, Avanzato)
- Immagine
- Video
- DescrizioneImmagine, DescrizioneVideo
- Biglietto (Base, Intermedio, Pieno)
- Dispositivo Mobile

È necessario dividere il software in due parti:

- App per utenti: permette di visualizzare le pagine web e di accedere alle pagine avanzate con il codice del biglietto
- App per InfoPoint: permette di emettere i biglietti, e di gestire i dispositivi mobili

#### Modello ER

![Immagine modello ER](./db/modello_er.png)

#### Modello Logico

- POI(**id**, nome)
- InfoPoint(**id**, nome)
-
- Pagina(**id**, _poi_)
- PaginaBase(**_pagina_**, _video_)
- PaginaAvanzata(**_pagina_**, _video_)
-
- Immagine(**id**, _pagina_, url )
- DescrizioneImmagine(**_immagine_, lingua**, descrizione)
-
- Video(**id**, _pagina_, url)
- DescrizioneVideo(**_video_, lingua**, descrizione)
-
- Biglietto(**id**, giorno_emissione)
- BigliettoBase(**_biglietto_**)
- BigliettoIntermedio(**_biglietto_**)
- BigliettoPieno(**_biglietto_**)
-
- Visite(**biglietto_intermedio, _poi_**)