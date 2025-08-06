<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image/coursefavicon.png">

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

        .content {
            width: 60%;
            margin: 50px auto;
            text-align: left;
        }

        .content h2 {
            font-size: 36px;
            color: #284966;
            margin-bottom: 15px;
        }

        .content p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .content img {
            width: 80%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .content a {
            text-decoration: none;
            color: #f15b43;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .content a:hover {
            color: #284966;
        }

        @media screen and (max-width: 768px) {
            .content {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Learn More</h1>
    </div>
    <div class="content">
        <h2>About CourseWave</h2>
        <p>
            Welcome to CourseWave – your go-to platform for simplified education access. We believe in empowering
            students with the skills they need to excel in the industry. Our commitment is to nurture the process of
            registration, making it a gateway to elevated futures.
        </p>
        <img src="image\learn.jpg" alt="Learn More Image">
        <h2>Our Mission</h2>
        <p>
            At CourseWave, we strive to make education accessible to every house, ensuring that every student is
            industry-ready. Our multimedia education platform is designed to develop the skills needed to reach
            students' highest potential.
        </p>
        <h2>Get Started</h2>
        <p>
            Ready to embark on your learning journey? Join CourseWave today and explore a world of opportunities. Learn
            and implement, shaping your skills for scaling higher in your academic and professional endeavors.
        </p>
        <a href="signup.php" class="btn">Enroll Now</a>
    </div>
</body>

</html>
