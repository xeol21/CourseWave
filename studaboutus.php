<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="image/coursefavicon.png">

    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #222;
            background: linear-gradient(to right, #96c0e9, #f9f9f9);
            transition: background-color 0.5s ease;
        }

        .container {
            width: 80%;
            margin: auto;
            text-align: center;
            padding-top: 50px;
            transition: padding-top 0.5s ease;
        }

        .wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 50px auto;
            width: 80%;
            transition: margin 0.5s ease, width 0.5s ease;
        }

        .content,
        .image {
            width: 45%;
            transition: width 0.5s ease;
        }

        .content h2 {
            font-size: 2rem;
            color: #284966;
            margin-bottom: 15px;
            text-align: left;
            text-transform: uppercase;
            font-weight: bold;
            transition: color 0.5s ease, font-size 0.5s ease, margin-bottom 0.5s ease;
        }

        .content p {
            color: #666;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: justify;
            transition: color 0.5s ease, font-size 0.5s ease, line-height 0.5s ease;
        }

        .image img {
            width: 70%;
            height: auto;
            display: block;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, filter 0.3s ease, box-shadow 0.3s ease; /* Updated transition for image */
        }

        .wrapper:hover .image img {
            transform: scale(1.05);
            filter: grayscale(100%);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3); /* Additional transition effect */
        }

        @media screen and (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                transition: flex-direction 0.5s ease;
            }

            .content,
            .image {
                width: 80%;
                margin-top: 20px;
                transition: width 0.5s ease, margin-top 0.5s ease;
            }

            .content h2 {
                font-size: 1.8rem;
                transition: font-size 0.5s ease;
            }

            .content p {
                font-size: 1rem;
                transition: font-size 0.5s ease;
            }
        }

        /* Modern style for h1 tag */
        .header-title {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 700;
            font-size: 3rem;
            color: #007bff;
            text-transform: uppercase;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
            position: relative;
            letter-spacing: 2px;
        }

        /* Add underline effect on hover */
        .header-title::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #007bff;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        /* Scale up the underline on hover */
        .header-title:hover::before {
            transform: scaleX(1);
        }

        /* Add shadow effect */
        .header-title {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        /* Add pulse effect */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .header-title:hover {
            animation: pulse 1s infinite;
        }

    .button-wrapper {
    text-align: center;
    }

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}
    </style>
</head>

<body>
    <div class="container">
        <h1 class="header-title">About Us</h1>
    </div>
    <div class="wrapper">
        <div class="content">
            <h2>The Vision is</h2>
            <p>To Make Every Student Industry Ready And Facilitate Education In Every House. To empower every student
                for the industry by simplifying education access. <br><br>CourseWave Registration Hub equips students with
                essential skills, ensuring they achieve their highest potential. <br><br>Our commitment is reflected in our
                slogan - Nurturing 'Registration' for 'Elevating' Futures."
            </p>
        </div>
        <div class="image">
            <img src="image\coursewave-high-resolution-logo-transparent (1).png" alt="CourseWave Logo">
        </div>
    </div>
    <div class="container">
        <div class="button-wrapper">
            <a href="learnmstud.php" class="button">Learn More</a>
        </div>
    </div>
</body>

</html>
