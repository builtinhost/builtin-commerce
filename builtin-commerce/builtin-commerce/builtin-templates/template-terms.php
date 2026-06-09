<?php
/**
 * Terms & Conditions Page Template
 * Builtin Commerce Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header();
?>

<style>
.page-header { 
background: linear-gradient(135deg, #F8F5F2 0%, #F1E8E3 100%); 
color: #1a1a1a; 
padding: 60px 25px; 
text-align: center; 
border-bottom: 3px solid #D72638;
}
.page-header h1 { 
font-family: 'Playfair Display', serif; 
font-size: 48px; 
font-weight: 700; 
margin-bottom: 12px; 
color: #1a1a1a;
letter-spacing: -1px;
}

.page-content { 
max-width: 1000px; 
margin: 0 auto; 
padding: 80px 25px; 
}

.terms-section { 
background: white; 
padding: 30px; 
border-radius: 8px; 
box-shadow: 0 5px 20px rgba(0,0,0,0.08); 
margin-bottom: 25px;
border-left: 4px solid #D72638;
transition: 0.3s;
}
.terms-section:hover {
box-shadow: 0 8px 30px rgba(215, 38, 56, 0.1);
}

.terms-section h2 { 
font-size: 22px; 
font-weight: 700; 
color: #D72638; 
margin-bottom: 15px;
}

.terms-section p { 
color: #666; 
line-height: 1.8; 
margin-bottom: 15px; 
font-size: 15px;
}

.terms-section ul { 
color: #666; 
line-height: 1.8; 
padding-left: 25px;
margin-bottom: 15px;
}

.terms-section li { 
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
.terms-section {
padding: 20px;
}
}
</style>

<header class="page-header">
<h1>Terms & Conditions</h1>
</header>

<div class="page-content">
<div class="terms-section">
<h2>Agreement to Terms</h2>
<p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
</div>

<div class="terms-section">
<h2>Use License</h2>
<p>Permission is granted to temporarily download one copy of the materials (information or software) on our website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
<ul>
<li>Modify or copy the materials</li>
<li>Use the materials for any commercial purpose or for any public display</li>
<li>Attempt to decompile or reverse engineer any software contained on the website</li>
<li>Remove any copyright or other proprietary notations from the materials</li>
<li>Transfer the materials to another person or "mirror" the materials on any other server</li>
</ul>
</div>

<div class="terms-section">
<h2>Disclaimer</h2>
<p>The materials on our website are provided on an 'as is' basis. We make no warranties, expressed or implied, and hereby disclaim and negate all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
</div>

<div class="terms-section">
<h2>Limitations</h2>
<p>In no event shall our company or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on our website, even if we or an authorized representative has been notified orally or in writing of the possibility of such damage.</p>
</div>

<div class="terms-section">
<h2>Accuracy of Materials</h2>
<p>The materials appearing on our website could include technical, typographical, or photographic errors. We do not warrant that any of the materials on our website are accurate, complete, or current. We may make changes to the materials contained on our website at any time without notice.</p>
</div>

<div class="terms-section">
<h2>Links</h2>
<p>We have not reviewed all of the sites linked to our website and are not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by us of the site. Use of any such linked website is at the user's own risk.</p>
</div>

<div class="terms-section">
<h2>Modifications</h2>
<p>We may revise these terms and conditions for our website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms and conditions.</p>
</div>

<div class="terms-section">
<h2>User Responsibilities</h2>
<p>Users are responsible for maintaining the confidentiality of their account information and passwords. Users agree to accept responsibility for all activities that occur under their account. Users agree to notify us immediately of any unauthorized use of their account or any other breaches of security.</p>
</div>

<div class="terms-section">
<h2>Governing Law</h2>
<p>These terms and conditions are governed by and construed in accordance with the laws of the jurisdiction in which our company is located, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
</div>

<div class="last-updated">Last updated: June 2026</div>
</div>

<?php
get_footer();
