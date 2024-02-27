<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebudayaan Jawa Timur</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgba(37, 34, 34, 0.336);
            font-family: sans-serif;
            background-image:url("pexels-capung-purnomo-2609952.jpg");
 background-repeat: no-repeat;
 background-size: cover;
        }
        .table-container{
            padding: 0 0%;
            margin: 40px auto 0;
        }
        .heading{
            font-size: 40px;
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }
        .table{
            width: 100%;
            border-collapse: collapse;
        }
        .table thead{
             background-color: rgba(94, 94, 94, 0.493);
        }
        .table thead tr th{
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.35px;
            color: azure;
            opacity: 1;
            padding: 12px;
            vertical-align: top;
            border: 1px solid #dee2e685;
        }
        .table tbody tr td{
            font-size: 14px;
            letter-spacing: 0.35px;
            font-weight: normal;
            color: #f1f1f1;
            background-color: black;
            padding: 8px;
            text-align: center;
            border: 1px solid #dee2e685;
        }
        .table .text_open{
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.35px;
            color: #ff1046;
        }
        .table tbody tr td .btn{
            width: 130px;
            text-decoration: none;
            line-height: 35px;
            display: inline-block;
            background-color: #ff1046;
            font-weight: medium;
            color: #ffffff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            border: 1px xolid transparent;
            font-size:14px ;
            opacity: 1;
        }
        @media (max-width: 768px){
            .table thead{
                display: none;
            }
            .table .table tbody,.table tr,.table td{
                display: block;
                width: 100%;
            }
            .table tr{
                margin-bottom: 15px;
            }
            .table tbody tr td{
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td:before{
                content: attr(data-label);
                position: absolute;
                left: 0;
                width:50% ;
                padding-left: 15%;
                font-weight: 600;
                font-size: 14px;
                text-align: left;
            }
            }
     footer {
    background-color: #ffffff00;
    color: #fff;
    text-align: center;
    padding: 0em;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>
   <div class="table-container">
    <h1 class="heading">Responsive Table</h1>
     <table class="table">
         <thead>
         <tr>
            <th>Start date</th>
            <th>Start / End Time </th>
            <th>Lokasi</th>
            <th>Nama Tari</th>
            <th>Batch Status</th>
            <th>Pembelian Ticket</th>
           </tr>
         </thead>
         <tbody>
            <tr>
                <td data-label="start Date">1 Feb 2024
                </td>
                <td data-label="start / end time">11:00 - 17:00
                </td>
                <td data-label="Lokasi">Ponorogo
                </td>
                <td data-label="Nama Tari">Reog Ponorogo
                </td>
                <td data-label="Batch status"><span class="Text_open">[Close]</span>
                </td>
                <td data-label="#"><a href="#" class="btn">Enroll Now</a>
                </td>
            </tr>
            <tr>
                <td data-label="start Date">7 Feb 2024
                </td>
                <td data-label="start / end time">16:00 - 18:00
                </td>
                <td data-label="Lokasi">Surabaya
                </td>
                <td data-label="Nama Tari">Tari Remo
                </td>
                <td data-label="Batch status"><span class="Text_open">[Close]</span>
                </td>
                <td data-label="#"><a href="#" class="btn">Enroll Now</a>
                </td>
            </tr>
            <tr>
                <td data-label="start Date">17 Feb 2024
                </td>
                <td data-label="start / end time">12:00 - 15:00
                </td>
                <td data-label="Lokasi">Malang
                </td>
                <td data-label="Nama Tari">Tari Topeng Malangan
                </td>
                <td data-label="Batch status"><span class="Text_open">[Close]</span>
                </td>
                <td data-label="#"><a href="#" class="btn">Enroll Now</a>
                </td>
            </tr>
            <tr>
                <td data-label="start Date">2 Mar 2024
                </td>
                <td data-label="start / end time">12:00 - 20:00
                </td>
                <td data-label="Lokasi">Malang
                </td>
                <td data-label="Nama Tari">Reog Ponorogo
                </td>
                <td data-label="Batch status"><span class="Text_open">[Open]</span>
                </td>
                <td data-label="#"><a href="#" class="btn">Enroll Now</a>
                </td>
            </tr> <tr>
                <td data-label="start Date">7 Mar 2024
                </td>
                <td data-label="start / end time">12:00 - 15:00
                </td>
                <td data-label="Lokasi">Ponorogo
                </td>
                <td data-label="Nama Tari">Tari Topeng Malangan
                </td>
                <td data-label="Batch status"><span class="Text_open">[Close]</span>
                </td>
                <td data-label="#"><a href="#" class="btn">Enroll Now</a>
                </td>
            </tr>
         </tbody>
     </table>



   </div>
   
    <a href="tugas-sms-1.php" class="cta-button"><h4>Kembali Ke Halaman Utama</h4></a>  
        
    <br>
    <br>
  <footer>
    <p>&copy;<b> 2023 Landing Page Kebudayaan Indonesia</b> </p>
</body>
</html>