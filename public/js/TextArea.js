
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