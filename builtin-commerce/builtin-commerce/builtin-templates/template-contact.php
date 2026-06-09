<?php
/**
 * Contact Page Template - Builtin Commerce
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header();
?>

<style>
.contact-header {
background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
color: white;
padding: 80px 25px;
text-align: center;
}
.contact-header h1 {
font-family: 'Playfair Display', serif;
font-size: 48px;
font-weight: 700;
margin-bottom: 15px;
letter-spacing: -1px;
}
.contact-header p {
font-size: 16px;
opacity: 0.9;
}

.contact-container {
max-width: 1000px;
margin: 0 auto;
padding: 80px 25px;
}

.contact-grid {
display: grid;
grid-template-columns: 1fr 1fr;
gap: 60px;
margin-bottom: 60px;
}

.contact-info {
padding-right: 20px;
}
.contact-info h2 {
font-family: 'Playfair Display', serif;
font-size: 32px;
font-weight: 700;
margin-bottom: 30px;
color: #1a1a1a;
}

.info-item {
margin-bottom: 35px;
}
.info-item h3 {
font-size: 16px;
font-weight: 700;
color: #1a1a1a;
margin-bottom: 8px;
text-transform: uppercase;
letter-spacing: 0.5px;
}
.info-item p {
color: #666;
font-size: 15px;
line-height: 1.6;
margin: 0;
}
.info-item a {
color: #e63946;
text-decoration: none;
transition: 0.3s;
}
.info-item a:hover {
color: #c5252f;
}

.contact-form-section h2 {
font-family: 'Playfair Display', serif;
font-size: 32px;
font-weight: 700;
margin-bottom: 30px;
color: #1a1a1a;
}

.form-group {
margin-bottom: 25px;
}
.form-group label {
display: block;
font-weight: 700;
font-size: 14px;
color: #1a1a1a;
margin-bottom: 8px;
text-transform: uppercase;
letter-spacing: 0.5px;
}
.form-group input,
.form-group textarea {
width: 100%;
padding: 14px 16px;
border: 1px solid #ddd;
border-radius: 4px;
font-family: inherit;
font-size: 14px;
color: #333;
transition: 0.3s;
box-sizing: border-box;
}
.form-group input:focus,
.form-group textarea:focus {
outline: none;
border-color: #e63946;
box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
}
.form-group textarea {
resize: vertical;
min-height: 140px;
}

.form-submit {
background: #e63946;
color: white;
padding: 14px 42px;
border: none;
border-radius: 4px;
font-weight: 700;
font-size: 13px;
letter-spacing: 0.6px;
text-transform: uppercase;
cursor: pointer;
transition: all 0.3s;
display: inline-block;
}
.form-submit:hover {
background: #c5252f;
transform: translateY(-2px);
box-shadow: 0 8px 20px rgba(230, 57, 70, 0.3);
}

.contact-page-content {
background: #f8f9fa;
padding: 60px 25px;
margin-bottom: 60px;
border-radius: 8px;
}
.contact-page-content h2 {
font-family: 'Playfair Display', serif;
font-size: 32px;
font-weight: 700;
margin-bottom: 20px;
color: #1a1a1a;
}
.contact-page-content p {
color: #666;
font-size: 15px;
line-height: 1.8;
margin-bottom: 15px;
}

@media (max-width: 768px) {
.contact-grid {
grid-template-columns: 1fr;
gap: 40px;
}
.contact-info {
padding-right: 0;
}
.contact-header h1 {
font-size: 32px;
}
}
</style>

<div class="contact-header">
<h1><?php echo esc_html( get_the_title() ); ?></h1>
<p>We'd love to hear from you. Get in touch with us today!</p>
</div>

<div class="contact-container">
<div class="contact-grid">
<!-- Contact Information -->
<div class="contact-info">
<h2>Get in Touch</h2>

<div class="info-item">
<h3>📍 Address</h3>
<p>123 Business Street<br>New York, NY 10001<br>United States</p>
</div>

<div class="info-item">
<h3>📞 Phone</h3>
<p><a href="tel:+12025551234">+1 (202) 555-1234</a></p>
</div>

<div class="info-item">
<h3>✉️ Email</h3>
<p><a href="mailto:info@demosite.com">info@demosite.com</a></p>
</div>

<div class="info-item">
<h3>🕒 Hours</h3>
<p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
</div>
</div>

<!-- Contact Form -->
<div class="contact-form-section">
<h2>Send us a Message</h2>
<form method="post" action="">
<div class="form-group">
<label for="contact-name">Full Name *</label>
<input 
type="text" 
id="contact-name" 
name="contact_name" 
required 
placeholder="Enter your full name"
>
</div>

<div class="form-group">
<label for="contact-email">Email Address *</label>
<input 
type="email" 
id="contact-email" 
name="contact_email" 
required 
placeholder="Enter your email"
>
</div>

<div class="form-group">
<label for="contact-phone">Phone Number</label>
<input 
type="tel" 
id="contact-phone" 
name="contact_phone" 
placeholder="Enter your phone number"
>
</div>

<div class="form-group">
<label for="contact-subject">Subject *</label>
<input 
type="text" 
id="contact-subject" 
name="contact_subject" 
required 
placeholder="What is this about?"
>
</div>

<div class="form-group">
<label for="contact-message">Message *</label>
<textarea 
id="contact-message" 
name="contact_message" 
required 
placeholder="Please enter your message..."
></textarea>
</div>

<button type="submit" class="form-submit">Send Message</button>
</form>
</div>
</div>

<?php
// Display page content if added
if ( have_posts() ) {
while ( have_posts() ) {
the_post();
$content = get_the_content();
if ( ! empty( $content ) ) {
echo '<div class="contact-page-content">';
the_content();
echo '</div>';
}
}
}
?>
</div>

<?php
get_footer();
