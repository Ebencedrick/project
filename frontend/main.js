// Example JS for dynamic property loading (AJAX)
document.addEventListener('DOMContentLoaded', function() {
  const grid = document.querySelector('.property-grid');
  if (grid) {
    fetch('../backend/controllers/get_properties.php')
      .then(res => res.json())
      .then(properties => {
        grid.innerHTML = properties.map(p => `
          <div class="card">
            <img src="../backend/uploads/${p.image || 'sample.jpg'}" alt="Property" style="width:100%;height:180px;object-fit:cover;">
            <h3>${p.title}</h3>
            <p>${p.location}</p>
            <p><b>$${p.price}</b></p>
            <a href="property_detail.html?id=${p.id}" class="btn">View Details</a>
          </div>
        `).join('');
      });
  }
});
