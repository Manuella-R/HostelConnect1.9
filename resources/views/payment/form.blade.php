<!-- resources/views/payment/form.blade.php -->

@extends('profile.profile-layout')
@section('profile')
   <style>
        .payment-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
            width: 100%;
            text-align: center;
        }

        .payment-options button {
            background: none;
            border: 1px solid #ccc;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 4px;
            cursor: pointer;
        }

        .payment-options button.active {
            background-color: #6a1b9a;
            color: #fff;
        }

        .payment-details input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .expiration-cvv {
            display: flex;
            justify-content: space-between;
        }

        .expiration-cvv input {
            width: calc(50% - 10px);
        }

        

        

        #confirm-btn {
            background-color: #00bcd4;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .hidden {
            display: none;
        }

        #loading,
        #success {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="payment-form">
        <h2>Pay with 
        <div class="payment-options">
            <button id="credit-card-btn" class="active">Credit card</button>
            </h2> 
        </div>
        
        <div class="payment-details" id="credit-card-form">
            <input type="text" id="card-number" placeholder="Card number">
            <input type="text" id="card-holder" placeholder="Card holder">
            <div class="expiration-cvv">
                <input type="text" id="expiration-date" placeholder="Expiration date">
                <input type="text" id="cvv" placeholder="CVV">
            </div>
           
        </div>
        <p>By selecting the button below, I agree to the Property Rules and <a href="#">Terms and Conditions</a></p>
        <button id="confirm-btn">Confirm and pay</button>
        <div id="loading" class="hidden">Processing...</div>
        <div id="success" class="hidden">Payment successful!</div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const creditCardBtn = document.getElementById('credit-card-btn');
            const googlePayBtn = document.getElementById('google-pay-btn');
            const paypalBtn = document.getElementById('paypal-btn');
            const confirmBtn = document.getElementById('confirm-btn');
            const loading = document.getElementById('loading');
            const success = document.getElementById('success');
            const paymentDetails = document.getElementById('credit-card-form');
            
            creditCardBtn.addEventListener('click', function() {
                creditCardBtn.classList.add('active');
                googlePayBtn.classList.remove('active');
                paypalBtn.classList.remove('active');
                paymentDetails.style.display = 'block';
            });

            googlePayBtn.addEventListener('click', function() {
                creditCardBtn.classList.remove('active');
                googlePayBtn.classList.add('active');
                paypalBtn.classList.remove('active');
                paymentDetails.style.display = 'none';
            });

            paypalBtn.addEventListener('click', function() {
                creditCardBtn.classList.remove('active');
                googlePayBtn.classList.remove('active');
                paypalBtn.classList.add('active');
                paymentDetails.style.display = 'none';
            });

            confirmBtn.addEventListener('click', function() {
                // Show loading message
                loading.classList.remove('hidden');

                // Simulate a delay for the payment process
                setTimeout(function() {
                    // Hide loading message and show success message
                    loading.classList.add('hidden');
                    success.classList.remove('hidden');
                }, 2000); // 2 seconds delay

                // Collect payment data
                const paymentData = {
                    cardNumber: document.getElementById('card-number').value,
                    cardHolder: document.getElementById('card-holder').value,
                    expirationDate: document.getElementById('expiration-date').value,
                    cvv: document.getElementById('cvv').value,
                    saveCard: document.getElementById('save-card').checked
                };

                // Send payment data to the server
                fetch('/payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(paymentData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
@endsection
