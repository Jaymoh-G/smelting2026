<div style="background-color: #F2F5F8; padding-bottom: 3em;">
    <div style="background-color: #1DA261; height: 3.2em; text-align: center; margin-bottom: 2em; padding-bottom: 0.5em; padding-top: 0.4em;" class="text-center">
        <h5 class="text-center" style="color: #FFF; font-weight: 700; letter-spacing: 1px; text-align: center; font-size: 1.3em; margin-top: 0.8em;"> Gustovenus Services </h5>
    </div>
    <div style="text-align: center">
        <div style="max-width: 500px; background-color: #FFF; border-radius: 0.5em; margin: 0 auto;">
            <div style="text-align: center">
                {{--<img src="https://easyfund.co.ke/local-logo" class="img-fluid" alt="" style="max-width: 300px">--}}

            </div>
            <div style="text-align: left; padding-left: 1.5em;"> <!-- style="border: 1px solid #CDCDCD"-->
                <p>Hello {{$subscriber->first_name}},</p>
                <p>Thank you for registering with Gustovenus Services. Below are the details you submitted. </p>
                <table>
                    <tr>
                        <td>First Name</td>
                        <td>{{$subscriber->first_name}}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{$subscriber->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{$subscriber->email_address}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{$subscriber->phone_number}}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>{{$subscriber->country}}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{$subscriber->city}}</td>
                    </tr>
                    <tr>
                        <td>Field Of Expertise</td>
                        <td>{{$subscriber->field_of_expertise}}</td>
                    </tr>
                    <tr>
                        <td>Years Of Experience</td>
                        <td>{{$subscriber->years_of_experience}}</td>
                    </tr>
                    <tr>
                        <td>You Message To Us</td>
                        <td>{{$subscriber->message}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="margin-top: 2em;">
        </div>
    </div>
</div>
