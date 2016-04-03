<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Suur täht</title>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <style>
    body {
        font-family: 'Dancing Script', cursive;
    }
span {
    font-size: 3em;
    display: inline-block;
    text-align: center;
    width: 1em; 
    font-weight: bold;
    float:left; /* et oleks teksti kõrval */
    clear: both; /* et iga paragrahv algaks oma realt */
}
#wrap {
    width: 800px;
    margin: auto;
}
    </style>
</head>
<body>
<div id="wrap">
    <h1>Some title</h1>
<?php
$text="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

/*
    SIIN ESITADA TEKST NII; ET IGA PRAGRAHVI ALGUSTÄHT ON SUUR (span vahel)
*/
$l6igud=explode("\n",$text); // teksti tükeldamine lõikudeks
$esimene=$l6igud[0][0]; //esimese lõigu esimene täht
$esimeneYle=substr($l6igud[0],1,strlen($l6igud[0])); // ülejäänud osa esimesest lõigust
$teine=$l6igud[1][0];
$teineYle=substr($l6igud[1],1,strlen($l6igud[1]));
$kolmas=$l6igud[2][0];
$kolmasYle=substr($l6igud[2],1,strlen($l6igud[2]));
echo "<span>".$esimene."</span>"."<p>".$esimeneYle."</p>"; // esitan vastavad osad lõigust vastavate html elementide vahele ja liidan kokku
echo "<span>".$teine."</span>"."<p>".$teineYle."</p>";
echo "<span>".$kolmas."</span>"."<p>".$kolmasYle."</p>";

?>

</div>
</body>
</html>