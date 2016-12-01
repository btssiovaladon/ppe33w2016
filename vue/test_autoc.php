<script>
$(function() {
    $( "#skills" ).autocomplete({
        source: 'test_autoc.php'
    });
});
</script>

<form method="get" action="#">
<div class="ui-widget">
    <label for="skills">Skills: </label>
    <input id="skills" name="term">
</div>
</form>


<?php
    //database configuration
   $source='mysql:host=localhost;dbname=ppeamis';
	$user='root';
	$passwd='';
    
    //connect with the database
	$db = new PDO($source, $user, $passwd,  array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
				));
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM amis WHERE nom_amis LIKE '%".$searchTerm."%' ORDER BY nom_amis ASC");
    while ($row = $query->fetch()) {
        $data[] = $row['nom_amis'];
    }
    
    //return json data
    echo json_encode($data);
?>








