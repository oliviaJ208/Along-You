<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Cleaning Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: #2a9d8f;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .hero {
            background: url('car-cleaning.jpg') no-repeat center center/cover;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        .hero h2 {
            font-size: 2em;
        }
        .content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .services {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .service {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 20px);
            text-align: center;
        }
        .service img {
            max-width: 100%;
            border-radius: 10px;
        }
        .service h3 {
            margin-top: 15px;
            color: #2a9d8f;
        }
        .footer {
            background: #2a9d8f;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Car Cleaning Services</h1>
    </header>

    <div class="hero">
        <h2>Bring the Shine Back to Your Ride!</h2>
    </div>

    <div class="content">
        <h2>Our Services</h2>
        <p>We provide top-notch car cleaning services to ensure your vehicle looks brand new. From exterior washes to interior detailing, we've got you covered.</p>

        <div class="services">
            <div class="service">
                <img src="exterior-wash.jpg" alt="Exterior Wash">
                <h3>Exterior Wash</h3>
                <p>Restore your car's shine with our professional exterior washing services.</p>
            </div>
            <div class="service">
                <img src="interior-cleaning.jpg" alt="Interior Cleaning">
                <h3>Interior Cleaning</h3>
                <p>Deep cleaning to make your car's interior spotless and fresh.</p>
            </div>
            <div class="service">
                <img src="full-detailing.jpg" alt="Full Detailing">
                <h3>Full Detailing</h3>
                <p>Complete cleaning and detailing for both the interior and exterior of your car.</p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Car Cleaning Services. All Rights Reserved.</p>
    </footer>
</body>
</html>
