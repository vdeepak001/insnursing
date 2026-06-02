<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code - {{ $testLabel }}</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: Inter, Arial, sans-serif; color: #1e293b;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
        style="background-color: #f8fafc; padding: 24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                    style="max-width: 620px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 18px; overflow: hidden;">
                    <tr>
                        <td align="center" style="padding: 24px 24px 16px;">
                            <img src="{{ $message->embed(public_path('Impetus-logo.png')) }}" alt="IHS Nursing Logo"
                                style="height: 50px; width: auto; display: block;">
                        </td>
                    </tr>
                    <tr>
                        <td style="background: linear-gradient(135deg, #F36E21 0%, #E28C56 50%, #1D2A57 100%); padding: 24px;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; line-height: 1.3; font-weight: 700;">
                                {{ $testLabel }} Verification Code
                            </h1>
                            <p style="margin: 8px 0 0; color: #f8fafc; font-size: 14px; line-height: 1.6;">
                                Complete your verification to access the {{ strtolower($testLabel) }}.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 24px;">
                            <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.7; color: #334155;">
                                Hello {{ $user->name }},
                            </p>
                            <p style="margin: 0 0 20px; font-size: 15px; line-height: 1.7; color: #334155;">
                                One Time Code for your Online CNE Test <strong>{{ $otpCode }}</strong>. Unique code
                                will expire in 10 Minutes. For any further assistance mail us to <a
                                    href="mailto:support@ihsnursing.com"
                                    style="color: #F36E21; font-weight: 600; text-decoration: underline;">support@ihsnursing.com</a>
                            </p>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                                style="border: 1px solid #e2e8f0; border-radius: 12px; background-color: #f8fafc; margin-bottom: 20px;">
                                <tr>
                                    <td align="center"
                                        style="padding: 20px 16px; font-size: 32px; letter-spacing: 6px; font-weight: 800; color: #F36E21; font-family: monospace;">
                                        {{ $otpCode }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 16px 24px 24px; border-top: 1px solid #f1f5f9;">
                            <p style="margin: 0; font-size: 12px; line-height: 1.7; color: #64748b;">
                                &copy; 2026 Impetus Healthcare Skills Private Limited. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
