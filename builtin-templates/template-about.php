<?php
/*
Template Name: About Page
Template Post Type: page
*/
get_header(); ?>

<style>
.page-content { max-width: 1200px; margin: 0 auto; padding: 80px 25px; }
.content-section { margin-bottom: 80px; }
.section-title { font-family: 'Playfair Display', serif; font-size: 36px; font-weight: 700; margin-bottom: 30px; color: #1a1a1a; }
.section-text { color: #666; font-size: 15px; line-height: 1.8; margin-bottom: 20px; }
.features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 30px; }
.feature-card { background: white; padding: 35px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); text-align: center; transition: all 0.3s ease; }
.feature-card:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.12); }
.feature-icon { font-size: 48px; margin-bottom: 20px; }
.feature-title { font-size: 18px; font-weight: 600; margin-bottom: 12px; color: #1a1a1a; }
.feature-desc { color: #666; font-size: 14px; line-height: 1.6; }

@media (max-width: 768px) {
  .section-title { font-size: 28px; }
  .page-content { padding: 50px 20px; }
}
</style>

<header class="page-header">
<h1>About Our Store</h1>
<p>Curated collections of premium products for discerning shoppers since 2015</p>
</header>

<div class="page-content">
<div class="content-section">
<h2 class="section-title">Our Story</h2>
<p class="section-text">We started with a simple vision: to bring carefully curated, premium products to customers who appreciate quality and craftsmanship. What began as a small passion project has grown into a trusted destination for those seeking exceptional value and uncompromising quality.</p>
<p class="section-text">Every product in our collection is handpicked by our team of experts. We believe in transparency, authenticity, and building lasting relationships with our customers.</p>
</div>

<div class="content-section">
<h2 class="section-title">Our Commitment</h2>
<div class="features-grid">
<div class="feature-card">
<div class="feature-icon">✓</div>
<h3 class="feature-title">Authenticity</h3>
<p class="feature-desc">Every item is verified for authenticity. We partner only with trusted suppliers and brands.</p>
</div>
<div class="feature-card">
<div class="feature-icon">⭐</div>
<h3 class="feature-title">Quality First</h3>
<p class="feature-desc">We don't compromise on quality. Premium products, premium experience, fair prices.</p>
</div>
<div class="feature-card">
<div class="feature-icon">❤️</div>
<h3 class="feature-title">Customer Care</h3>
<p class="feature-desc">Your satisfaction is our priority. We stand behind every purchase with our guarantee.</p>
</div>
<div class="feature-card">
<div class="feature-icon">🌿</div>
<h3 class="feature-title">Sustainability</h3>
<p class="feature-desc">We're committed to responsible sourcing and ethical business practices.</p>
</div>
</div>
</div>

<div class="content-section">
<h2 class="section-title">Why Shop With Us</h2>
<p class="section-text">We've built our reputation on three pillars: exceptional products, outstanding customer service, and fair pricing. When you shop with us, you're not just making a purchase�you're joining a community of people who value quality and authenticity.</p>
<p class="section-text">Have questions? We'd love to hear from you. Contact our customer care team at <a href="mailto:support@shop.local" style="color: #e63946; text-decoration: none; font-weight: 600;">support@shop.local</a></p>
</div>
</div>

<?php get_footer(); ?>


