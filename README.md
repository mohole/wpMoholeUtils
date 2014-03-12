wpMoholeUtils
=============

(Plugin WordPress) Set funzionalità per i siti Mohole.

## Utilità incluse

* Logo login customizzato
* Rinominazione ruoli WordPress
* Redirect nel gestionale al login
* Link al gestionale nella barra di admin
* Shortcodes
* Link alla guida (questa pagina) nella barra di admin

***

### Rinominazione ruoli
* Editore -> Staff
* Autore -> Docente
* Contributore -> Collaboratore
* Sottoscrittore -> Allievo

Amministratore rimane invariato.

### Shortcodes
	[persona] testo [/persona]	
crea un div con le classi "persona" e "well" (questa è una classe di Bottstrap che crea un piccolo contenitore grigio intorno all'elemento).

	[mappa altezza="450" larghezza="900"]
bla bla bla


### Logo login customizzato
Su attivazione il plugin utilizza il file "img/moholeLogin.svg" come logo per la schermata di login rimpiazzando l'originale.

***

##Funzioni "libere"

### aggiungiIva($valore)
Calcola l'IVA al 22% di un valore e lo somma al valore iniziale.

* $valore : numero
