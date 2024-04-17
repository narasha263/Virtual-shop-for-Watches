<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Search Results</h2>
        <hr>
        <?php
        // Check if the query parameter exists
        if (isset($_GET['query'])) {
            // Get the search query
            $search_query = $_GET['query'];

            // Perform your search operation here (e.g., in a database)
            // This is just a placeholder to demonstrate the search functionality
            $search_results = [
                "Watch 1",
                "Watch 2",
                "Watch 3"
            ];

            // Display search results
            if (!empty($search_results)) {
                echo "<ul>";
                foreach ($search_results as $result) {
                    echo "<li>$result</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No results found for '$search_query'.</p>";
            }
        } else {
            echo "<p>No search query provided.</p>";
        }
        ?>
    </div>
</body>
</html>
