<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Inquiry</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: Inter, Arial, sans-serif; color: #1e293b;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f8fafc; padding: 24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 620px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 18px; overflow: hidden;">
                    <tr>
                        <td align="center" style="padding: 24px 24px 16px;">
                            <img src="{{ $message->embed(public_path('Impetus-logo.png')) }}" alt="IHS Nursing Logo" style="height: 50px; width: auto; display: block;">
                        </td>
                    </tr>
                    <tr>
                        <td style="background: linear-gradient(135deg, #F36E21 0%, #1D2A57 100%); padding: 24px;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; line-height: 1.3; font-weight: 700;">
                                New Contact Inquiry
                            </h1>
                            <p style="margin: 8px 0 0; color: #f8fafc; font-size: 14px; line-height: 1.6;">
                                Received a new contact inquiry from the website.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px;">
                            <p style="margin: 0 0 20px; font-size: 15px; line-height: 1.7; color: #334155;">
                                Hello Admin,
                            </p>
                            <p style="margin: 0 0 20px; font-size: 15px; line-height: 1.7; color: #334155;">
                                A new query has been submitted via the Contact Us form. Here are the details:
                            </p>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="10" style="border: 1px solid #e2e8f0; border-radius: 12px; background-color: #f8fafc; margin-bottom: 20px; font-size: 14px;">
                                <tr>
                                    <td width="30%" style="font-weight: bold; color: #475569; border-bottom: 1px solid #e2e8f0;">Name:</td>
                                    <td style="color: #1e293b; border-bottom: 1px solid #e2e8f0;">{{ $contactQuery->name }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; color: #475569; border-bottom: 1px solid #e2e8f0;">Email ID:</td>
                                    <td style="color: #1e293b; border-bottom: 1px solid #e2e8f0;">
                                        <a href="mailto:{{ $contactQuery->email }}" style="color: #F36E21; text-decoration: none;">{{ $contactQuery->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; color: #475569; border-bottom: 1px solid #e2e8f0;">Mobile #:</td>
                                    <td style="color: #1e293b; border-bottom: 1px solid #e2e8f0;">{{ $contactQuery->mobile }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; color: #475569; border-bottom: 1px solid #e2e8f0;">IHSID:</td>
                                    <td style="color: #1e293b; border-bottom: 1px solid #e2e8f0;">{{ $contactQuery->ihsid ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; color: #475569; vertical-align: top;">Query for:</td>
                                    <td style="color: #1e293b; white-space: pre-wrap; line-height: 1.6;">{{ $contactQuery->query_for }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 16px 24px 24px; border-top: 1px solid #f1f5f9;">
                            <p style="margin: 0; font-size: 12px; line-height: 1.7; color: #64748b;">
                                &copy; {{ date('Y') }} {{ config('app.name', 'IHS Nursing') }}. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
