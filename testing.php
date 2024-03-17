<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <Style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        :root {
            --nav-color: #0652DD;
            --body-color: #397eff;
            --upload-color:red;
            --lbtn-color:red;
        }
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing:border-box;
        }
        body{
            width:100vw;
            height:100vh;
            background-color:#f5f6fa;
        }
        .header{
            width:100%;
            height:80px;
            background-color:var(--nav-color);
            color:white;
            font-size:20px;
            text-align:center;
            line-height:80px;
            margin-bottom:10px;
        }
        .history{
            width:100%;
            height:auto;
            display:grid;
            place-items:center;
        }
        .card{
            width:100%;
            height:auto;
            display:flex;
            gap:10px;
            align-items:center;
            background-color:white;
            border-radius:5px; 
            border-top:20px solid var(--lbtn-color);
        }
        .form-group{
            width:90%;
            height:70px;
            display:flex;
            flex-direction:column;
            padding:5px;
        }

        .form-group input{
            height:35px;
            border:none;
            outline:none;
            border-radius:5px;
            background-color:aliceblue;
            padding:2px;
        }
        .form-group input[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size:20px;
        }
        .form-group:nth-child(4) input[type="button"] {
            background-color: red;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        @media only screen and (max-width: 800px){
            .card{
            width:99%;
            height:auto;
            display:flex;
            flex-direction:column;
            gap:10px;
            align-items:center;
            background-color:white;
            }
        }
    </Style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>Find Upload History Between Two Days</h3>
        </div>
        <div class="history">
           <div class="card">
           <div class="form-group">
                <label for="from">From Date</label>
                <input type="date" name="from" id="from">
            </div>
            <div class="form-group">
                <label for="to">To Date</label>
                <input type="date" name="to" id="to">
            </div>
            <div class="form-group">
                <label for="check">Check</label>
                <input type="button" id="check" value="Filter">
            </div>
            <div class="form-group">
            <label for="reset">Reset</label>
                <input type="button" id="reset" value="Reset">
            </div>
           </div>
        </div>
        <div class="data">

        </div>
    </div>
</body>
</html>