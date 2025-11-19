<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Columns</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
        }

       
    </style>
</head>
<body>
    <footer>
        <div class="footer-container">
            <div class="footer-columns">
                <!-- About Us Column -->
                <div class="footer-column">
                    <h3>About Us</h3>
                    <p>We are committed to providing the best products and services to our customers with free delivery and 24/7 support.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Customer Service Column -->
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Size Guide</a></li>
                    </ul>
                </div>

                <!-- Quick Links Column -->
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Shop All</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Sale</a></li>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Store Locations</a></li>
                    </ul>
                </div>

                <!-- Newsletter Column -->
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to get special offers, free giveaways, and updates.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit">Subscribe</button>
                    </form>
                    <div class="payment-methods">
                        <svg width="50" height="30" viewBox="0 0 50 30" fill="none">
                            <rect width="50" height="30" rx="4" fill="#fff"/>
                            <text x="25" y="19" text-anchor="middle" font-size="10" fill="#000" font-weight="bold">VISA</text>
                        </svg>
                        <svg width="50" height="30" viewBox="0 0 50 30" fill="none">
                            <rect width="50" height="30" rx="4" fill="#fff"/>
                            <circle cx="20" cy="15" r="8" fill="#EB001B"/>
                            <circle cx="30" cy="15" r="8" fill="#F79E1B"/>
                        </svg>
                        <svg width="50" height="30" viewBox="0 0 50 30" fill="none">
                            <rect width="50" height="30" rx="4" fill="#fff"/>
                            <text x="25" y="19" text-anchor="middle" font-size="8" fill="#000" font-weight="bold">PayPal</text>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </div>
    </footer>
</body>
</html>
