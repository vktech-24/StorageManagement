<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

    *{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    scrollbar-width: none;
    }
    :root {
    --nav-color: #0652DD;
    --body-color: #397eff;
    --upload-color:red;
    --lbtn-color:red;
    }
    body{
        width:100vw;
        height:100vh;
        background-color: aliceblue;
    }
    .navbar{
        width:100%;
        min-height:100px;
        background-color: var(--nav-color);
        display:grid;
        place-items:center;
    }

    .navbar h4{
        font-size:35px;
        color:#fff;
    }

    .container{
        padding:30px;
        margin-top:30px;
    }

    h3{
      color: var(--nav-color);
      font-size:23px;
    }

    .row{
        width:100%;
        height:auto;
        margin-bottom:20px;
    }

    .dev{
        height:auto;
        margin-top:10px;
    }
    p{
        letter-spacing:0.5px;
    }

    p,li{
        margin-top:10px;
    }

    ul li{
        list-style:none;
    }

    .team{
        width:100%;
        height:100%;
        margin-top:10px;
        display:flex;
        justify-content:space-around;
        align-items:center;
        flex-wrap:wrap;
        row-gap:10px;
        padding:10px;
    }

    .developers{
        width:250px;
        height:280px;
        background-color: white;
        border-radius:17px;
        overflow:hidden;
        display:grid;
        justify-items:center;
        border-bottom:5px solid var(--nav-color);
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px; 
    }

    .role{
        width: 250px;
        height: 40px;
        background-color: var(--nav-color);
        text-align:center;
        line-height:40px;
        color:white;
        font-size:19px;
    }

    .profile{
        margin-top:-40px;
        width:170px;
        height:170px;
        border-radius:50%;
        overflow:hidden;
    }

    img{
        width:100%;
        object-fit:cover;
    }

    footer{
        width:100%;
        height:60px;
        background-color: var(--nav-color);
        display:grid;
        place-items:center;
        font-size:17px;
        font-weight:500;
        color:white;
    }
</style>
<body>
    <div class="navbar">
        <h4>About Our Webpage</h4>
    </div>
    <div class="container">

        <div class="row">
           <h3>Project Description</h3>
           <p>This Project Is Designed To Facilitate File Management Between Teachers And Students. It Allows Teachers To Upload Various Types Of Files Such as PDF, Images, And Presentation, Which Students Can Then Download For Their Reference.</p> 
           <p>This Website Made Only For Education Purpose. Future We Deside To Add New Features And Provides All Kinds Of Services.</p>
        </div>

        <div class="row">
           <h3>Key Features</h3>
           <ul>
            <li>1. Separate Logins For Teachers And Students.</li>
            <li>2. Teachers Can Upload Files.</li>
            <li>3. Students Can Download Uploaded Files.</li>
            <li>4. Supports Various File Formats Including PDF, Images, And Presentations.</li>
           </ul>
        </div>

        <div class="row dev">
            <h3>Development Team</h3>
            <div class="team">
                <div class="developers"><h2 class="role">Front-End</h2><div class="profile"><img src="images/vimal.png" alt=""></div></div>
                <div class="developers"><h2 class="role">Back-End</h2><div class="profile"><img src="images/vimal.png" alt=""></div></div>
                <div class="developers"><h2 class="role">Database</h2><div class="profile"><img src="images/vimal.png" alt=""></div></div>
                <div class="developers"><h2 class="role">Ui/Ux Design</h2><div class="profile"><img src="images/vimal.png" alt=""></div></div>
            </div>
        </div>

    </div>
    <footer>
        <p>&copy; 2024 Vk Techno Private Limited. All rights reserved.</p>
    </footer>
</body>
</html>