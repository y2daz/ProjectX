<html>
<head>
    <style>

        body {
            background-color:black;


        }

        * {
            font-family:calibri;
        }

        h1 {

            text-align:center;
        }

        .main {
            position:absolute;
            background-color:white;
            height:450px;
            width:800px;
            left:283px;
            top:50px;
            border-radius:20px;
            padding:10px;

        }
        table, th, td {
            border: 1px solid black;


        }

        table{
            text-align: left;
        }
        form{
            text-align: left;
        }


        th{
            width: 1300px;
            text-align: center;
        }

        td {
            width: 150px;
            text-align: left;
        }

        tr{
            height: 10px;
        }

        .insert{
            position:absolute;
            left:80px;
            top:80px;
        }




        th{
            align:center;
            color:black;
            background-color:white;
            height:30px;
            padding:5px;
        }

        td {
            padding:5px;
        }


        input.button {
            position:relative;
            font-weight:bold;
            font-size:20px;
            left:50px;
            top:20px;
        }
        input.button1 {
            position:relative;
            font-weight:bold;
            font-size:20px;
            left:80px;
            top:20px;
        }

        input.button2 {
            position:relative;
            font-weight:bold;
            font-size:20px;
            left:100px;
            top:20px;
        }



    </style>

    <title>Marks and Grading-Insert term details</title>


</head>



<body>
<div class="main">

    <h1>Search By Class Form</h1>

    <form>





                <tr class="alt">
                <tr>
                    <td>Grade/Year</td>
                    <td><input type="text" value="">


                </tr>


                <tr Class="alt">
                <tr>
                    <td>class</td>
                    <td><input type="text" value="">


                </tr>

            </form>
    <table class="insert" cellspacing="0">
    <table   border="1px solid black" >




    <tr>
                    <th>Last Name</th>
                    <th>Name with Initials</th>
                    <th>Admission Number</th>


                </tr>

                <tr>
                    <td >Fernando</td>
                    <td >G.L.Anta</td>
                    <td >00012</td>

                </tr>


                <tr>
                    <td >Liyanage</td>
                    <td >K.L.Manoj</td>
                    <td >01123</td>

                </tr>

                <tr>
                    <td >Perera</td>
                    <td >K.M.Amal</td>
                    <td >11233</td>

                </tr>

                </table>





            <tr>
                <td></td>

                <td><input class="button" type="submit" value="Search"></td>




                <td><input class="button1" type="reset" value="Reset"></td>

                <td><input class="button2" type="submit" value="Cancel"></td>





            </tr>

        </table>













    </form>



</div>
</body>

</html>