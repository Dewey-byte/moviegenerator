const API_KEY = '73c7baa92225ea9e3616e1d85579ffd8'; // Replace with your actual key
const genreSelect = document.getElementById('genreSelect');
const movieDiv = document.getElementById('movie');

// Load genres when page loads
document.addEventListener('DOMContentLoaded', () => {
  fetch(`https://api.themoviedb.org/3/genre/movie/list?api_key=${API_KEY}`)
    .then(res => res.json())
    .then(data => {
      data.genres.forEach(genre => {
        const option = document.createElement('option');
        option.value = genre.id;
        option.textContent = genre.name;
        genreSelect.appendChild(option);
      });
    })
    .catch(err => console.error('Error loading genres:', err));
});

// Fetch and display multiple movies based on selected genre
function getMovieByGenre() {
  const genreId = genreSelect.value;
  if (!genreId) {
    alert('Please select a genre first.');
    return;
  }

  fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${API_KEY}&with_genres=${genreId}&sort_by=popularity.desc`)
    .then(res => res.json())
    .then(data => {
      movieDiv.innerHTML = ''; // Clear previous results

      data.results.forEach(movie => {
        const imageUrl = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;

        // Handle missing poster
        const poster = movie.poster_path
          ? `<img src="${imageUrl}" class="my-2 rounded w-full max-w-xs" />`
          : `<div class="bg-gray-700 text-center py-20 my-2 rounded w-full max-w-xs">No Image</div>`;

        const movieCard = document.createElement('div');
        movieCard.className = 'bg-gray-800 p-4 rounded mb-6';

        movieCard.innerHTML = `
          <h2 class="text-xl font-semibold">${movie.title}</h2>
          ${poster}
          <p class="text-gray-300 text-sm mt-2">${movie.overview}</p>
          <form method="POST" action="save.php" class="mt-2">
            <input type="hidden" name="title" value="${movie.title}" />
            <input type="hidden" name="poster" value="${imageUrl}" />
            <input type="hidden" name="overview" value="${movie.overview}" />
            <button type="submit" class="bg-green-600 mt-2 px-3 py-1 rounded hover:bg-green-700">Save Movie</button>
          </form>
        `;

        movieDiv.appendChild(movieCard);
      });
    })
    .catch(err => {
      console.error('Error fetching movies:', err);
      movieDiv.innerHTML = '<p class="text-red-500">Failed to load movies. Try again.</p>';
    });
}
