
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="home-page">

    <header class="header">

        <div class="left-nav">
            <img src="hospital_13298007.png" alt="">
            <h3>Heal Up Hospital</h3>
        </div>

        <div class="right-nav">
      <h4><a href="Home.php">Home</a></h4>
      <h4><a href="Services.php">Service</a></h4>
      <h4><a href="services_details.php">Service Details</a></h4>
      <h4><a href="about_us.php">About Us</a></h4>
      <button><a href="Login.php">Log In</a></button>
        </div>
    </header>

    <main class="main">

        <div class="top-main">
            <div class="left-main">
                <h1>Don't Let Your Health Take a Backseat!</h1>
                <h3>Compassionate care, advanced medicine, and trusted specialists available 24/7</h3>
                <button>
                    <a href="services_details.php">Book an appintment</a>
                    <img src="book-black-cover-closed_32354.png" alt="">
                </button>
            </div>

            <div class="right-main">
                <img src="isometric-medical-diagnostic-hospital-health-care-vector-39726194-removebg-preview.png" alt="">
            </div>
        </div>

        <div class="departaments">
            <p>OUR DEPARTAMENTS</p>
            <h1>For Your Health</h1>
        </div>

    <div class="slider-wrapper">
    <button class="prev">❮</button>
    <div class="slider">
        <div class="slide"><img src="mushkerite.png" alt="Kidney"></div>
        <div class="slide"><img src="neurologji.png" alt="Heart"></div>
        <div class="slide"><img src="ortho.png" alt="Tooth"></div>
        <div class="slide"><img src="veshkat.png" alt="Brain"></div>
        <div class="slide"><img src="zemra.png" alt="Arthritis"></div>
    </div>
    <button class="next">❯</button>

    <div class="dots"></div>
</div>

        <div class="text">
            <h4>We Serve In Different Areas For Our Patients</h4>
        </div>

        <div class="homepageNotified">
            <div class="emailForm">
                <h3>Get Notified Of Any Updates!</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Labore et magnam, odit mollitia dignissimos
                    perferendis ullam voluptatibus voluptates sequi!
                    Iste dolorum fuga sunt, eos ullam possimus
                    mollitia et dolorem esse.
                </p>

                <form action="">
                    <input type="text" placeholder="Email Address">
                    <button>Notify</button>
                </form>
            </div>
        </div>
    </main>

   <footer class="footer">

        <div class="footer-container">

            <div class="footer-section">
                <h2>Contact Us</h2>
                <ul>
                    <li>Email: info@healup.com</li>
                    <li>Phone: +355 69 123 4567</li>
                    <li>Address: Rruga Arberia, Pristina</li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Service Details</a></li>
                    <li><a href="">Login</a></li>
                    <li><a href="">Reviews</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Follow Us</h2>
                <ul>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Instagram</a></li>
                    <li><a href="">TikTok</a></li>
                    <li><a href="">YouTube</a></li>
                </ul>
            </div>
        </div>
        
         <p class="footer-copy">  2025 HealUp. All rights reserved.</p>
    </footer>


<script>
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const dotsContainer = document.querySelector('.dots');

let index = 0;
const totalSlides = slides.length;

for (let i = 0; i < totalSlides; i++) {
    const dot = document.createElement('span');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => {
        index = i;
        updateSlider();
    });
    dotsContainer.appendChild(dot);
}

const dots = document.querySelectorAll('.dots span');

function updateSlider() {
    const slideWidth = slides[0].clientWidth + 20;
    slider.style.transform = `translateX(-${index * slideWidth}px)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

prevBtn.addEventListener('click', () => {
    index = (index - 1 + totalSlides) % totalSlides; 
    updateSlider();
});

nextBtn.addEventListener('click', () => {
    index = (index + 1) % totalSlides; 
    updateSlider();
});

let startX = 0;
let isDragging = false;

slider.addEventListener('touchstart', e => {
    startX = e.touches[0].clientX;
    isDragging = true;
});

slider.addEventListener('touchmove', e => {
    if (!isDragging) return;
    const moveX = e.touches[0].clientX - startX;
    slider.style.transform = `translateX(${-index * (slides[0].clientWidth + 20) + moveX}px)`;
});

slider.addEventListener('touchend', e => {
    isDragging = false;
    const diff = e.changedTouches[0].clientX - startX;
    if (diff > 50) index = (index - 1 + totalSlides) % totalSlides;
    else if (diff < -50) index = (index + 1) % totalSlides;
    updateSlider();
});

    </script>
</body>

</html>