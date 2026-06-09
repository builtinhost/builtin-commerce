<?php get_header(); ?>

<style>
.page-header { background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; padding: 60px 25px; text-align: center; }
.page-header h1 { font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
.page-header p { font-size: 16px; opacity: 0.9; }
.page-content { max-width: 1200px; margin: 0 auto; padding: 80px 25px; }
.content-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
.info-section { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
.info-section h2 { font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px; }
.info-section p { color: #666; line-height: 1.8; margin-bottom: 15px; }
.shipping-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
.shipping-table th, .shipping-table td { padding: 12px; text-align: left; border-bottom: 1px solid #e0e0e0; }
.shipping-table th { background: #f5f5f5; font-weight: 700; }
.faq { background: white; padding: 25px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
.faq h3 { margin: 0 0 10px 0; font-size: 16px; color: #1a1a1a; }
.faq p { margin: 0; color: #666; }
@media (max-width: 768px) { .content-grid { grid-template-columns: 1fr; } }
</style>

<header class="page-header">
<h1>Shipping Information</h1>
<p>Fast & reliable shipping worldwide</p>
</header>

<div class="page-content">
<div class="content-grid">
<div class="info-section">
<h2>📦 Shipping Rates</h2>
<table class="shipping-table">
<tr><th>Order Value</th><th>Shipping Cost</th></tr>
<tr><td>Under $25</td><td>$5.99</td></tr>
<tr><td>$25 - $50</td><td>$3.99</td></tr>
<tr><td>$50 - $100</td><td>$1.99</td></tr>
<tr><td>Over $100</td><td>FREE</td></tr>
</table>
</div>

<div class="info-section">
<h2>⏱️ Delivery Times</h2>
<p><strong>Standard Shipping:</strong> 5-7 business days</p>
<p><strong>Express Shipping:</strong> 2-3 business days (+$9.99)</p>
<p><strong>Overnight Shipping:</strong> Next business day (+$24.99)</p>
<p style="color: #e63946; font-weight: 600;">All orders ship from our warehouse in California.</p>
</div>
</div>

<div style="max-width: 800px; margin: 60px auto;">
<h2 style="text-align: center; font-size: 28px; margin-bottom: 40px;">Shipping FAQs</h2>
<div class="faq">
<h3>When will my order ship?</h3>
<p>Orders are processed and shipped within 1-2 business days. You'll receive a tracking number via email.</p>
</div>
<div class="faq">
<h3>Do you ship internationally?</h3>
<p>Yes! We ship to most countries worldwide. International orders may take 10-15 business days and incur customs fees.</p>
</div>
<div class="faq">
<h3>Can I track my order?</h3>
<p>Absolutely. You'll receive a tracking link in your shipping confirmation email. Click it to monitor your package in real-time.</p>
</div>
<div class="faq">
<h3>What if my order is delayed?</h3>
<p>We guarantee delivery within our stated timeframes. If your order is delayed, contact us for a refund or replacement.</p>
</div>
</div>
</div>

<?php get_footer(); ?>


