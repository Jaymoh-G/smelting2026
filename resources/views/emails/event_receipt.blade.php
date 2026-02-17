<table style="width: 100%; background-color: #FFF; padding-bottom: 3em;">
    <tr>
        <td style="padding: 1em; background-color: #FFF;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%; text-align: left;">
                        <img src="{{asset('images/email_logo_200.png')}}" alt="Smelting Afrika Logo" style="width: 100px; height: auto;">
                    </td>
                    <td style="text-align: left; padding-right: 2em;">
                        <p style="color: #FFD635; font-size: 20px; margin: 0;"><b>SMELTING AFRIKA CONSULTANTS</b></p>
                        <p style="margin-top: 5px;"><b>L:</b> Thika Town Equity Plaza 4th floor suite 404</p>
                        <p><b>T:</b> +254726717576 / 762636208</p>
                        <p><b>E:</b> smeltingafrika@gmail.com</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <!-- Horizontal line above "CASH RECEIPT" -->
            <hr style="border: 1px solid #000; width: 100%; margin: 5px auto 0 auto;">
            <h2 style="font-weight: bold; margin: 0 auto; font-size: 2em;">CASH RECEIPT</h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <div style="max-width: 600px; background-color: #FFF; border-radius: 0.5em; margin: 0 auto">
                <div style="text-align: left;">
                    <p>Hello {{$mail_data['first_name']??''}},</p>
                    <p>We confirm receipt of your payment for event: {{$mail_data['event_name']??''}} on {{$mail_data['payment_date']??''}}</p>
                    <table style="width: 100%; margin-top: 20px; background-color: #FFF;">
                        <tr>
                            <td style="padding: 5px; font-weight: bold;">Receipt No:</td>
                            <td style="padding: 5px;">{{$mail_data['receipt_number']??''}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px; font-weight: bold;">Date:</td>
                            <td style="padding: 5px;">{{ date('Y/m/d', strtotime($mail_data['payment_date']??'')) }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px; font-weight: bold;">Amount Received:</td>
                            <td style="padding: 5px;">KES {{$mail_data['amount']??''}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px; font-weight: bold;">Confirmed by:</td>
                            <td style="padding: 5px;">Alfred Warui Kimani</td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>

