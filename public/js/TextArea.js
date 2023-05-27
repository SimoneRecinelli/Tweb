
$(document).ready(function() {
    // Seleziona tutte le textarea con l'ID "expandingTextarea" e aggiungi un gestore per l'evento di input
    $('.form-control').on('input', function() {
      // Imposta l'altezza minima della textarea (puoi modificarla a tuo piacimento)
      var minHeight = 40;
      // Imposta l'altezza massima della textarea (puoi modificarla a tuo piacimento)
      var maxHeight = 300;
      
      // Calcola l'altezza necessaria in base al contenuto
      var scrollHeight = this.scrollHeight;
      // Limita l'altezza tra il valore minimo e massimo
      var height = Math.min(maxHeight, Math.max(scrollHeight, minHeight));
      
      // Imposta la nuova altezza della textarea
      $(this).css('height', height + 'px');
    });
  });

/* Utilizza il metodo $(document).ready() per assicurarsi che il codice venga eseguito quando il documento HTML è comple
tamente caricato.

* La funzione seleziona tutte le textarea con l'ID "expandingTextarea" utilizzando la classe .form-control e aggiunge un
gestore per l'evento di input. Quando viene digitato del testo nella textarea, la funzione viene attivata.

* All'interno della funzione, vengono definiti un'altezza minima (minHeight) e un'altezza massima (maxHeight) per la
textarea. Successivamente, viene calcolata l'altezza necessaria (scrollHeight) in base al contenuto della textarea.
Questo valore viene quindi limitato tra l'altezza minima e massima utilizzando la funzione Math.min() e Math.max().
Infine, viene impostata la nuova altezza della textarea utilizzando il metodo css().

*/