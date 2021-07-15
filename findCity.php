<?php
include_once 'dbConfig.php';

$countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);

$query="SELECT id,city FROM city WHERE countryid='$countryId' AND stateid='$stateId'";
$result=$con->query($query);

?>
<select name="city">
    <option>Выберите город</option>
    <?php while($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
        <option value=<?php echo $row['id']?>><?php echo $row['city']?></option>
    <?php } ?>
</select>