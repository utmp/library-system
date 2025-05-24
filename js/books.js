$(document).ready(function() {
    const searchInput = $('#searchInput');
    const categorySelect = $('#categorySelect');
    const booksContainer = $('#booksContainer');
    let searchTimeout;

    function performSearch() {
        const search = searchInput.val();
        const category = categorySelect.val();
        booksContainer.html('<div class="loading">Loading books...</div>');
        
        $.ajax({
            url: 'get_books.php',
            type: 'GET',
            data: {
                search: search,
                category: category
            },
            success: function(response) {
                booksContainer.html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                booksContainer.html('<p>Error loading books. Please try again.</p>');
            }
        });
    }
    performSearch();
    searchInput.on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 300);
    });
    categorySelect.on('change', performSearch);
});