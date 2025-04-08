document.addEventListener("DOMContentLoaded", () => {
    const recetaDiv = document.getElementById("receta");
  
    fetch("https://www.themealdb.com/api/json/v1/1/search.php?s=Arrabiata")
      .then(response => response.json())
      .then(data => {
        const platillo = data.meals[0];
  
        const nombre = platillo.strMeal;
        const imagen = platillo.strMealThumb;
        const preparacion = platillo.strInstructions;
  
        
        let ingredientes = "";
        for (let i = 1; i <= 20; i++) {
          const ingrediente = platillo[`strIngredient${i}`];
          const medida = platillo[`strMeasure${i}`];
          if (ingrediente && ingrediente.trim() !== "") {
            ingredientes += `• ${ingrediente} - ${medida}\n`;
          }
        }
  
        // Mostrar receta
        recetaDiv.innerHTML = `
        <div class="row g-4">
          <div class="col-md-5">
            <img src="${imagen}" alt="${nombre}" class="img-fluid rounded shadow-sm">
          </div>
          <div class="col-md-7">
            <h2 class="mb-3">${nombre}</h2>
            <h5 class="text-primary">Ingredientes:</h5>
            <pre class="bg-light p-3 rounded border">${ingredientes}</pre>
            <h5 class="text-primary mt-3">Preparación:</h5>
            <p>${preparacion}</p>
            <button id="guardarBtn" class="btn btn-success mt-3">Guardar receta</button>
          </div>
        </div>
      `;
       
  
        // guardar la receta
        document.getElementById("guardarBtn").addEventListener("click", () => {
          const formData = new FormData();
          formData.append("nombre", nombre);
          formData.append("ingredientes", ingredientes);
          formData.append("preparacion", preparacion);
          formData.append("imagen", imagen);
  
          fetch("php/guardar.php", {
            method: "POST",
            body: formData
          })
          .then(res => res.text())
          .then(mensaje => {
            alert(mensaje);
          })
          .catch(error => {
            console.error("Error al guardar:", error);
          });
        });
      })
      .catch(error => {
        recetaDiv.innerHTML = "<p>Error al cargar la receta.</p>";
        console.error("Error al conectar con la API:", error);
      });
  });
  