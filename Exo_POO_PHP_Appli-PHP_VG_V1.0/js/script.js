    document.addEventListener('DOMContentLoaded', function(){
      let prix = document.getElementById('prix');
      let quantite = document.getElementById('quantite');
      let Prix_total = document.getElementById('Prix_total');
      prix.addEventListener('input', function(){
        Prix_total.value = (prix.value * quantite.value).toFixed(2);
      });
      quantite.addEventListener('input', function(){
        Prix_total.value = (prix.value * quantite.value).toFixed(2);
      });
    });