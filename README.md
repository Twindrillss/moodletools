# moodletools

Strumenti utili per l'estrazione di dati su utenti contenuti in un'installazione di moodle

<li>Nel file controllastatoiscrizione.php è possibile trovare una funzione che può essere richiamata nel file view.php all'interno della cartella course per fare vedere all'utente lo stato delle sue iscrizioni. Serve passare come parametri l'id del corso e quello dell'utente loggato</li>
<li>Nel file controllaprimoaccessoalcorso.php è possibile ottenere una stampa in plain html della data di primo accesso ad un corso da parte di un utente. Serve passare come parametri (GET) l'id dell'utente su cui effettuare la verifica e lo shortname del corso</li>
