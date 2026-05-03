<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Non-Disclosure Agreement</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 14px; line-height: 1.6; color: #333; }
        h1 { text-align: center; font-size: 20px; text-transform: uppercase; margin-bottom: 30px; }
        .section { margin-bottom: 20px; }
        .party { font-weight: bold; }
        .signature-box { margin-top: 50px; border-top: 1px solid #ccc; padding-top: 10px; width: 60%; }
        .digital-stamp { border: 2px solid #0056b3; padding: 15px; margin-top: 30px; background-color: #f0f8ff; border-radius: 5px; }
        .stamp-title { color: #0056b3; font-weight: bold; font-size: 16px; margin-bottom: 10px; text-transform: uppercase; }
        .stamp-detail { margin: 2px 0; font-family: monospace; font-size: 12px; }
    </style>
</head>
<body>
    <h1>Non-Disclosure Agreement (NDA)</h1>
    
    <div class="section">
        <p>This Non-Disclosure Agreement (the "Agreement") is entered into on <strong>{{ $date }}</strong>, by and between:</p>
        <p><span class="party">Disclosing Party:</span> {{ $deal->company->name }}</p>
        <p><span class="party">Receiving Party:</span> {{ $user->name }} (Email: {{ $user->email }})</p>
    </div>

    <div class="section">
        <p><strong>1. Purpose</strong><br>
        The Receiving Party wishes to evaluate the Disclosing Party's business ("Project {{ $deal->title }}") for a potential transaction. For this purpose, the Disclosing Party may disclose certain confidential information.</p>

        <p><strong>2. Confidential Information</strong><br>
        "Confidential Information" means all non-public information disclosed by the Disclosing Party, including but not limited to financial records, trade secrets, business plans, and customer lists.</p>

        <p><strong>3. Non-Disclosure Obligations</strong><br>
        The Receiving Party agrees to: (a) hold the Confidential Information in strict confidence; (b) not disclose it to any third party; and (c) use it solely for the Purpose.</p>

        <p><strong>4. Term</strong><br>
        This Agreement shall remain in effect for 2 years from the date of execution.</p>
    </div>

    <div class="digital-stamp">
        <div class="stamp-title">VERIFIED DIGITAL SIGNATURE</div>
        <p class="stamp-detail"><strong>Signatory:</strong> {{ $user->name }}</p>
        <p class="stamp-detail"><strong>Account Email:</strong> {{ $user->email }}</p>
        <p class="stamp-detail"><strong>Timestamp:</strong> {{ $timestamp }}</p>
        <p class="stamp-detail"><strong>IP Address:</strong> {{ $ip_address }}</p>
        <p class="stamp-detail"><strong>Agreement ID:</strong> NDA-{{ $deal->id }}-{{ $user->id }}-{{ time() }}</p>
        <p class="stamp-detail" style="font-size: 10px; color: #666; margin-top: 10px;">This document was electronically signed via the M&A Marketplace platform. This digital signature is legally binding and complies with electronic signature regulations.</p>
    </div>
</body>
</html>
