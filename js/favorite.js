document.querySelectorAll('.favorite-checkbox').forEach(cb => {
  cb.addEventListener('change', () => {
    fetch('/ajax/favorite_toggle.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({
        recipe_id: cb.dataset.recipeId,
        is_favorite: cb.checked ? 1 : 0
      })
    });
  });
});
