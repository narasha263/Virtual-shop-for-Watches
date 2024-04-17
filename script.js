
    $(document).ready(function() {
        $('.add-to-cart-btn').click(function() {
            // Get product details from data attributes
            var productId = $(this).data('id');
            var productName = $(this).data('name');
            var productPrice = $(this).data('price');

            // You can perform additional operations here, such as adding the product to the cart
            console.log("Product ID: " + productId);
            console.log("Product Name: " + productName);
            console.log("Product Price: " + productPrice);

            // For demonstration purposes, let's just display an alert
            alert("Added to cart: " + productName);

            // Redirect the user to cart.php with added items
            var url = 'viewcart.php?productId=' + productId + '&productName=' + productName + '&productPrice=' + productPrice;
            window.location.href = url;
        });

        // You can add similar click event handlers for the "View" button if needed
    });
