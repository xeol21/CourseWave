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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            color: #222;
            background-image: radial-gradient(farthest-side, #afc8f9 90%, #fff0),
                radial-gradient(farthest-side, #ddc1fb 90%, #fff0),
                radial-gradient(circle at 0 0, #d5e0fa, #e5d5f6) !important;
            background-size: 7rem 7rem, 6rem 6rem, auto;
            background-position: 30% 10%, 80% 90%, 0;
            background-repeat: no-repeat;
            backdrop-filter: blur(50px);
            transition: background-color 0.5s ease;
        }

        .container {
            width: 85%;
            margin: auto;
            text-align: center;
        }

        .container h1 {
            color: #f15b43;
            font-size: 50px;
            margin-top: 50px;
        }

        .wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 50px auto;
            width: 85%;
            transition: 0.4s ease;
        }

        .content,
        .image {
            width: 40%;
            transition: transform 0.4s ease;
        }

        .content h2 {
            font-size: 30px;
            color: #284966;
            margin-bottom: 15px;
        }

        .content p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }

        .content .btn {
            position: relative;
            margin-top: 30px;
            text-decoration: none;
            border: 2px solid #f15b43;
            font-size: 18px;
            color: #f15b43;
            padding: 13px 16px;
            display: inline-block;
            letter-spacing: 1px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .content .btn::before {
            content: "";
            position: absolute;
            border: 1px solid transparent;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #f15b43;
            z-index: -1;
            transition: transform 0.7s;
            transform-origin: 0 0;
            transition-timing-function: cubic-bezier(0.5, 1.5, 0.4, 0.7);
            transform: scaleX(0);
        }

        .content .btn:hover::before {
            transform: scaleX(1);
        }

        .content .btn:hover {
            color: #fff;
        }

        .image img {
            width: 100%;
            height: auto;
        }

        @media screen and (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .content,
            .image {
                width: 100%;
                margin-top: 20px;
            }

            .content h2 {
                font-size: 25px;
            }

            .content .btn {
                font-size: 16px;
                padding: 12px 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>About Us</h1>
    </div>
    <div class="wrapper">
        <div class="content">
            <h2>The Vision is</h2>
            <p>To Make Every Student Industry Ready And Facilitate Education In Every House. To empower every student
                for the industry by simplifying education access. CourseWave Registration Hub equips students with
                essential skills, ensuring they achieve their highest potential. Our commitment is reflected in our
                slogan - Nurturing 'Registration' for 'Elevating' Futures."
            </p>
            <a href="main.php" class="btn">Go Back</a>
        </div>
        <div class="image">
            <img src="image\coursewave-high-resolution-logo-transparent (1).png" alt="CourseWave Logo">
        </div>
    </div>
</body>

</html>
