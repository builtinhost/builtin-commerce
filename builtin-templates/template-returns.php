<?php get_header(); ?>

<style>
.page-header { background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; padding: 60px 25px; text-align: center; }
.page-header h1 { font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
.page-header p { font-size: 16px; opacity: 0.9; }
.page-content { max-width: 1200px; margin: 0 auto; padding: 80px 25px; }
.policy-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); margin-bottom: 30px; }
.policy-box h2 { font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px; }
.policy-box p { color: #666; line-height: 1.8; margin-bottom: 15px; }
.steps { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
.step { display: flex; gap: 20px; margin-bottom: 30px; }
.step-number { background: #e63946; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
.step-content h3 { margin: 0 0 10px 0; font-size: 18px; color: #1a1a1a; }
.step-content p { margin: 0; color: #666; }
@media (max-width: 768px) { .step { flex-direction: column; } }
</style>

<header class="page-header">
<h1>Returns & Refunds</h1>
<p>30-day money-back guarantee</p>
</header>

<div class="page-content">
<div class="policy-box">
<h2>↩️ Our Return Policy</h2>
<p>We want you to be completely satisfied with your purchase. If you're not happy with your order for any reason, you have 30 days from the date of purchase to return it for a full refund, no questions asked.</p>
<p><strong>Return period:</strong> 30 days from purchase date</p>
<p><strong>Condition:</strong> Items must be unused and in original packaging</p>
<p><strong>Refund timeline:</strong> 5-7 business days after return is received</p>
</div>

<div class="steps">
<h2 style="margin-bottom: 30px;">How to Return Your Order</h2>

<div class="step">
<div class="step-number">1</div>
<div class="step-content">
<h3>Contact Us</h3>
<p>Email us at support@example.com with your order number and reason for return.</p>
</div>
</div>

<div class="step">
<div class="step-number">2</div>
<div class="step-content">
<h3>Receive Return Label</h3>
<p>We'll send you a prepaid return shipping label. No return shipping costs for you!</p>
</div>
</div>

<div class="step">
<div class="step-number">3</div>
<div class="step-content">
<h3>Ship It Back</h3>
<p>Pack your item securely and use the return label to ship it back to us.</p>
</div>
</div>

<div class="step">
<div class="step-number">4</div>
<div class="step-content">
<h3>Get Your Refund</h3>
<p>Once we receive and inspect your return, we'll process your refund within 5-7 business days.</p>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>


