<!-- Statistics page -->

<?php

$q1 = $db->prepare("SELECT * FROM applications WHERE installed=:installed");
$q1->execute([
'installed' => "yes"
]);

$q2 = $db->prepare("SELECT * FROM users WHERE 1");
$q2->execute();

echo "<div class='right-container'>
    <div class='content-large'>";

echo "<h2>Statistiques</h2>
<hr class='fs-large'>";

echo "<p>Number of installed applications : ".$q1->rowCount()."</p>";

echo "<p>Number of active users : ".$q2->rowCount()."</p>";

echo "</div>
    </div>";