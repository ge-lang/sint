<?php if (!empty($_SESSION['user_id']) && PayPal_CLIENT_ID !== ''): ?>
    <div id="paypal-button-container"></div>
    <p id="paypal-result" class="text-danger" role="alert"></p>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo rawurlencode(PayPal_CLIENT_ID); ?>&currency=<?php echo rawurlencode(CURRENCY); ?>&intent=capture"></script>
    <script>
        paypal.Buttons({
            createOrder: function () {
                return fetch('paypal-create-order.php', {method: 'POST'})
                    .then(function (response) { return response.json(); })
                    .then(function (data) {
                        if (!data.id) throw new Error(data.error || 'Could not create PayPal order.');
                        return data.id;
                    });
            },
            onApprove: function (data) {
                return fetch('paypal-capture-order.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({orderID: data.orderID})
                })
                    .then(function (response) { return response.json(); })
                    .then(function (result) {
                        if (!result.success) throw new Error(result.error || 'Payment was not completed.');
                        window.location.href = 'my-orders.php?status=true';
                    })
                    .catch(function (error) {
                        document.getElementById('paypal-result').textContent = error.message;
                    });
            },
            onError: function () {
                document.getElementById('paypal-result').textContent = 'PayPal payment could not be started.';
            }
        }).render('#paypal-button-container');
    </script>
<?php elseif (empty($_SESSION['user_id'])): ?>
    <a href="login.php" class="btn amado-btn w-100">Log in to pay</a>
<?php else: ?>
    <p class="text-danger">PayPal is not configured.</p>
<?php endif; ?>
