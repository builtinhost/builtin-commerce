<?php get_header(); ?>

<style>
.page-header { 
background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); 
color: white; 
padding: 60px 25px; 
text-align: center; 

}
.page-header h1 { 
font-family: 'Playfair Display', serif; 
font-size: 48px; 
font-weight: 700; 
margin-bottom: 12px; 
color: white;
letter-spacing: -1px;
}
.page-content { 
max-width: 1000px; 
margin: 0 auto; 
padding: 80px 25px; 
}
.policy-section { 
background: white; 
padding: 30px; 
border-radius: 8px; 
box-shadow: 0 5px 20px rgba(0,0,0,0.08); 
margin-bottom: 25px;
border-left: 4px solid #D72638;
transition: 0.3s;
}
.policy-section:hover {
box-shadow: 0 8px 30px rgba(215, 38, 56, 0.1);
}
.policy-section h2 { 
font-size: 22px; 
font-weight: 700; 
color: #D72638; 
margin-bottom: 15px;
}
.policy-section p { 
color: #666; 
line-height: 1.8; 
margin-bottom: 15px; 
font-size: 15px;
}
.policy-section ul { 
color: #666; 
line-height: 1.8; 
padding-left: 25px;
margin-bottom: 15px;
}
.policy-section li { 
margin-bottom: 12px;
font-size: 15px;
}
.last-updated { 
text-align: center; 
color: #999; 
font-size: 14px; 
margin-top: 60px;
padding-top: 20px;
border-top: 1px solid #eee;
}

@media (max-width: 768px) {
.page-header h1 {
font-size: 32px;
}
.policy-section {
padding: 20px;
}
}
</style>

<header class="page-header">
<h1>Privacy Policy</h1>
</header>

<div class="page-content">
<div class="policy-section">
<h2>Introduction</h2>
<p>We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.</p>
</div>

<div class="policy-section">
<h2>Information We Collect</h2>
<p>We may collect information about you in a variety of ways. The information we may collect on the Site includes:</p>
<ul>
<li><strong>Personal Data:</strong> Name, email address, phone number, shipping address, billing address</li>
<li><strong>Payment Information:</strong> Credit card details (processed securely through third-party payment processors)</li>
<li><strong>Usage Data:</strong> IP address, browser type, pages visited, time spent on pages</li>
<li><strong>Device Information:</strong> Device type, operating system, device identifiers</li>
</ul>
</div>

<div class="policy-section">
<h2>How We Use Your Information</h2>
<p>We use the information we collect for the following purposes:</p>
<ul>
<li>To process and fulfill your orders</li>
<li>To communicate with you about your account and orders</li>
<li>To improve our website and services</li>
<li>To prevent fraudulent transactions</li>
<li>To comply with legal obligations</li>
</ul>
</div>

<div class="policy-section">
<h2>Information Security</h2>
<p>We implement appropriate security measures to protect your personal information. However, no method of transmission over the internet is 100% secure. We cannot guarantee absolute security of your data.</p>
</div>

<div class="policy-section">
<h2>Third-Party Links</h2>
<p>Our website may contain links to third-party websites. We are not responsible for the privacy practices of external sites. Please review their privacy policies before providing any information.</p>
</div>

<div class="policy-section">
<h2>Contact Us</h2>
<p>If you have questions about this Privacy Policy, please contact us at privacy@example.com</p>
</div>

<div class="last-updated">Last updated: June 2026</div>
</div>

<?php get_footer(); ?>

