<?php
include_once 'dbConfig.php';
$query="SELECT * FROM country";
$result= $con->query($query);
?>
<html>
<head>
    <title>Tutorial-24</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <script language="javascript" type="text/javascript">
        function getXMLHTTP() {
            var xmlhttp=false;
            try{
                xmlhttp=new XMLHttpRequest();
            }
            catch(e)   {
                try{
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e){
                    try{
                        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                    catch(e1){
                        xmlhttp=false;
                    }
                }
            }

            return xmlhttp;
        }

        function getState(countryId) {

            var strURL="findState.php?country="+countryId;
            var req = getXMLHTTP();

            if (req) {

                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
// Только в случае нажатия «ОК»
                        if (req.status == 200) {
                            document.getElementById('statediv').innerHTML=req.responseText;
                            document.getElementById('citydiv').innerHTML='<select name="city">'+
                                '<option>Выберите город</option>'+
                                '</select>';
                        } else {
                            alert("Problem while using XMLHTTP:n" + req.statusText);
                        }
                    }
                }
                req.open("GET", strURL, true);
                req.send(null);
            }
        }
        function getCity(countryId,stateId) {
            var strURL="findCity.php?country="+countryId+"&state="+stateId;
            var req = getXMLHTTP();

            if (req) {

                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
// Только в случае нажатия «ОК»
                        if (req.status == 200) {
                            document.getElementById('citydiv').innerHTML=req.responseText;
                        } else {
                            alert("Problem while using XMLHTTP:n" + req.statusText);
                        }
                    }
                }
                req.open("GET", strURL, true);
                req.send(null);
            }

        }
    </script>
</head>
<body>
<form method="post" action="" name="form1">
    <center>
        <table width="45%"  cellspacing="0" cellpadding="0">
            <tr>
                <td width="75">Страна</td>
                <td width="50">:</td>
                <td  width="150"><select name="country" onChange="getState(this.value)">
                        <option value="">Выберите страну</option>
                        <?php while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                            <option value=<?php echo $row['id']?>><?php echo $row['country']?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr style="">
                <td>State</td>
                <td width="50">:</td>
                <td ><div id="statediv"><select name="state" >
                            <option>Выберите штат</option>
                        </select></div></td>
            </tr>
            <tr style="">
                <td>City</td>
                <td width="50">:</td>
                <td ><div id="citydiv"><select name="city">
                            <option>Выберите город</option>
                        </select></div></td>
            </tr>

        </table>
    </center>
</form>
</body>
</html>