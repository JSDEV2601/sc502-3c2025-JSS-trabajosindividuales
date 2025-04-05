$(document).ready(function() {
    $('#buscar').click(function() {
      const palabra = $('#palabra').val().trim();
      if (palabra === '') {
        alert('Por favor ingrese una palabra.');
        return;
      }
  
      $('#resultado').html('<p>Buscando información...</p>');
      $('#guardar').hide();
  
      $.get(`https://api.dictionaryapi.dev/api/v2/entries/en/${palabra}`, function(data) {
        try {
          const definicion = data[0].meanings[0].definitions[0].definition;
          const ejemplo = data[0].meanings[0].definitions[0].example || 'No hay ejemplo disponible.';
          const audio = data[0].phonetics.find(p => p.audio)?.audio || '';
  
          let html = `<p><strong>Definición:</strong> ${definicion}</p>`;
          html += `<p><strong>Ejemplo:</strong> ${ejemplo}</p>`;
          if (audio) {
            html += `<p><strong>Audio:</strong><br><audio controls src="${audio}"></audio></p>`;
          } else {
            html += `<p><strong>Audio:</strong> No disponible.</p>`;
          }
  
          $('#resultado').html(html);
          $('#guardar').show();
        } catch (error) {
          $('#resultado').html('<p>No se pudo procesar la información correctamente.</p>');
          $('#guardar').hide();
        }
      }).fail(function() {
        $('#resultado').html('<p>No se encontró la palabra. Intente con otra.</p>');
        $('#guardar').hide();
      });
    });
  
    $('#guardar').click(function() {
      const palabra = $('#palabra').val().trim();
      $('#guardar').text('Guardando...').prop('disabled', true);
  
      // Simulación de guardado en base de datos mas tomar en cuenta que no se guarda ya que el ejercicio no lo pide
      setTimeout(() => {
        alert(`La palabra "${palabra}" fue guardada en la base de datos (simulado).`);
        $('#guardar').text('Guardar palabra').prop('disabled', false);
      }, 1000);
    });
  });
  