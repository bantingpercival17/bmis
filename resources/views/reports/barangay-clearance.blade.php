<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARANGAY CLEARANCE - {{$barangay_clearance->resident->complete_name()}}</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        @page {
            margin: 5px;
            font-family: 'Times New Roman', Times, serif;
        }

        .page-header {
            margin-top: 20px;
            padding: 0px;
            font-size: 12;

            text-align: center;
        }

        .text-barangay {
            font-size: 14;
            font-weight: 900;
        }

        .page-content {
            font-family: "Century Gothic", Arial, sans-serif;
            margin-top: 50px;
        }

        .page-content-body {
            font-family: "Century Gothic", Arial, sans-serif;
            margin-top: 20px;
            margin-bottom: 20px;
            padding-left: 80px;
            padding-right: 80px;
        }

        .page-title {
            font-size: 24px;
            text-align: center;
            letter-spacing: 10px;
            font-weight: 900;
        }



        .intro {
            font-size: 18px;
            font-weight: 900;
        }

        .p-1 {
            margin-top: 20px;
            line-height: 20px;
            /* within paragraph */
        }

        .page-content-footer {
            position: relative;
            padding-left: 80px;
            padding-right: 80px;
        }

        .captian {
            width: 50%;
            position: absolute;
            /* Change position to absolute */
            right: 0;
            /* Align to the right side */
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <p>Republic of the Philippines</p>
        <p class="text-municipality">
            Province of
            {{$barangay_clearance->resident_address->province->province_name}}
        </p>
        <p class="text-municipality">
            Municipality of
            {{$barangay_clearance->resident_address->municipality->municipality_name}}
        </p>
        <p class="text-barangay">
            {{strtoupper('Barangay '.$barangay_clearance->resident_address->barangay->barangay_name)}}
        </p>
    </div>
    <div class="page-content">
        <p class="page-title">BARANGAY CLEARANCE</p>

        <div class="page-content-body">
            <p class="intro">TO WHOM IT MAY CONCERN:</p>
            <p class="p-1">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b><u>{{strtoupper($barangay_clearance->resident->complete_name())}}</u></b> with residence and postal address at
                <u><i>{{($barangay_clearance->resident->complete_address())}}</i></u> has no derogatory record filed in our Barangay Office.
            </p>
            <p class="p-1">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The above-named individual who is a bonafide resident of this barangay is a person of good moral character, peace-loving and civic minded citizen.

            </p>
            <p class="p-1">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification/clearance is hereby issued in connection with the subject's application for <b><u>{{$barangay_clearance->propose}}</u></b> and for whatever legal purpose it may serve him/her best, and is valid for six (6) months form the date issued.
            </p>
            <p class="p-1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NOT VALID WITHOUT OFFICIAL SEAL.</b></p>
            <p class="p-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Given this {{$barangay_clearance->created_at->format('l, F d,Y')}}</p>

        </div>
        <div class="page-content-footer">
            <div class="captian p-1">
                <p><b>{{strtoupper('Perez, Raymond Ramos')}}</b></p>
                <p>PUNONG BARANGAY</p>
            </div>
<br><br><br>
            <div class="p-1">
                <p>Specimen Signature of Applicant:</p>
                <p><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            </div>
        </div>
    </div>
</body>


</html>